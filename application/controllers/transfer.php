<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transfer extends MY_Controller {

    private $user_session;

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->user_session = $this->session->userdata('user');
        if (!$this->user_session)
            redirect(site_url('login'));

        $this->load->model('balance_model', 'balance');
        $this->load->model('currencies_model', 'currencies');
        $this->load->model('transaction_model', 'transaction');
    }

    public function index() {
        $currencies_array = $this->currencies->getCurrencies();
        $balance_currencies[''] = '-- Select Currency --';

        $balances = $this->balance->getBalanceByUserId($this->user_session['user_id']);
        $balances_array = array();
        foreach ($balances as $balance) {
            $balances_array[$balance['currency_code']] = $balance['balance'];
        }
        
        $balance_currencies = array();
        foreach ($currencies_array as $currency_code => $currency_info) {
            $balance_currencies[$currency_info['code']] = $currency_info['title'] . ' (' . get_currency_value_format(!empty($balances_array[$currency_info['code']]) ? $balances_array[$currency_info['code']] : 0, $currency_info) . ')';
        }
        $this->assign('balance_currencies', $balance_currencies);

        $posts = $this->input->post();
        if ($posts) {
            $to_account = $posts['to_account'];
            $amount = (float) $posts['amount'];

            $balance_currency = $posts['balance_currency'];

            $fees = $amount * $this->configs['TRANSFER_FEES'] / 100;

            $transaction_memo = ($posts['transaction_memo']);

            $master_key = ($posts['master_key']);

            if ($balance_currency == '')
                $this->validator->addError('Currency', 'Please select the currency of balance that you want to use for the transaction.');
            if ($amount <= 0) {
                $this->validator->addError('Amount', 'Please input correct Amount .');
            } else { // check if out of balance
                if ($amount > $balances_array[$balance_currency])
                    $this->validator->addError('Balance', 'You have not enough balance to transfer the amount(<strong>' . get_currency_value_format($amount, $currencies_array[$balance_currency]) . '</strong>). Please input difference amount.');
            }


            $user_to = $this->user->getUser(array('account_number' => $to_account));
            if (!$user_to) {
                $this->validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
            } elseif ($to_account == $this->user_session['account_number']) {
                $this->validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
            }

            // check master KEy
            if ($master_key != $this->user_session['master_key']) {
                $this->validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
            }
            if (count($this->validator->errors) == 0) {
                unset($user_to['password']);
                $transfer_info = $user_to;
                $transfer_info['amount'] = $amount;
                $transfer_info['fees'] = $fees;
                $transfer_info['balance_currency'] = $balance_currency;
                $transfer_info['amount_text'] = get_currency_value_format($amount, $currencies_array[$balance_currency]);
                $transfer_info['fees_text'] = get_currency_value_format($fees, $currencies_array[$balance_currency]);
                $transfer_info['transaction_memo'] = $transaction_memo;
                $this->session->set_userdata('transfer_info', $transfer_info);
                redirect(site_url('transfer/confirmation'));
                $step = 'confirm';
            } else {
                $this->data['posts'] = $posts;
                $this->data['validerrors'] = $this->validator->errors;
            }
        }
        $this->view('transfer/index');
    }

    public function confirmation() {
        $transfer_info = $this->session->userdata('transfer_info');
        if (!$transfer_info)
            redirect(site_url('transfer'));

        $this->assign('transfer_info', $transfer_info);
        $this->view('transfer/confirmation');
    }

    public function success() {
        $transfer_info = $this->session->userdata('transfer_info');
        if (!$transfer_info)
            redirect(site_url('transfer'));

        $batch_number = tep_create_random_value(11, 'digits');
        $transaction_data_array = array(
            'from_userid' => $this->user_session['user_id'],
            'batch_number' => $batch_number,
            'to_userid' => $transfer_info['user_id'],
            'amount' => $transfer_info['amount'],
            'fee' => $transfer_info['fees'],
            'fee_text' => $transfer_info['fees_text'],
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => $transfer_info['transaction_memo'],
            'from_account' => $this->user_session['account_number'],
            'to_account' => $transfer_info['account_number'],
            'transaction_currency' => $transfer_info['balance_currency'],
            'amount_text' => $transfer_info['amount_text'],
            'transaction_status' => 'completed',
        );

        $this->transaction->insert($transaction_data_array);
        $current_amount = $transfer_info['amount'] - $transfer_info['fees'];
        $balanceFrom = array(
            'user_id' => $this->user_session['user_id'],
            'currency_code' => $transfer_info['balance_currency'],
        );
        $this->balance->updateBalance($balanceFrom, $transfer_info['amount'], '-');
        $balanceTo = array(
            'user_id' => $transfer_info['user_id'],
            'currency_code' => $transfer_info['balance_currency'],
        );
        $this->balance->updateBalance($balanceTo, $current_amount, '+');

        //admin transfer
        $batch_number_admin = tep_create_random_value(11, 'digits');
        $transaction_data_array_admin = array(
            'from_userid' => $transfer_info['user_id'],
            'batch_number' => $batch_number_admin,
            'to_userid' => 1,
            'amount' => $transfer_info['fees'],
            'fee' => 0,
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => 'transaction fees #' . $batch_number,
            'from_account' => $transfer_info['account_number'],
            'to_account' => 'OOKCASH',
            'transaction_currency' => $transfer_info['balance_currency'],
            'amount_text' => $transfer_info['fees_text'],
            'transaction_status' => 'completed',
            'status' => '0',
        );
        $this->transaction->insert($transaction_data_array_admin);
        
        $balanceAdmin = array(
            'user_id' => 1,
            'currency_code' => $transfer_info['balance_currency'],
        );
        $this->balance->updateBalance($balanceAdmin, $transfer_info['fees'], '+');
        
        $this->load->model('email_model');
        $dataEmail = array(
            'firstname' => $transfer_info['firstname'],
            'amount_text' => $transfer_info['fees_text'],
            'batch_number' => $batch_number,
            'balance_currency' => $transfer_info['balance_currency'],
            'from_account' => $this->user_session['account_number'],
            'fees_text' => $transfer_info['fees_text'],
        );
        $this->email_model->sendmail('TRANSFER_EMAIL', $transfer_info['firstname'], $transfer_info['email'], $dataEmail);
        
    }

}

?>
