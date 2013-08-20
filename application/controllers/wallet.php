<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wallet extends MY_Controller {

    private $user_session;

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->user_session = $this->session->userdata('user');


        $this->load->model('balance_model', 'balance');
        $this->load->model('currencies_model', 'currencies');
        $this->load->model('transaction_model', 'transaction');
        $this->load->model('wallet_model', 'wallet');
    }

    public function add() {
        if (!$this->user_session)
            redirect(site_url('login'));

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
            $balance_currency = ($posts['balance_currency']);
            $amount = ($posts['amount']);
            $master_key = ($posts['master_key']);

            if ($balance_currency == '')
                $this->validator->addError('Currency', 'Please select the currency of balance that you want to use for the transaction.');
            if ($amount <= 0) {
                $this->validator->addError('Amount', 'Please input correct Amount .');
            } else { // check if out of balance
                if ($amount > $balances_array[$balance_currency])
                    $this->validator->addError('Balance', 'You have not enough balance to transfer the amount(<strong>' . get_currency_value_format($amount, $currencies_array[$balance_currency]) . '</strong>). Please input difference amount.');
            }


            $check_master_key = getMasterKey();
            // check master KEy
            if ($master_key != $check_master_key) {
                $this->validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
            }

            if (count($this->validator->errors) == 0) {
                $batch_number = tep_create_random_value(11, 'digits');
                $amount_text = get_currency_value_format($amount, $currencies_array[$balance_currency]);
                $amount = get_currency_value($amount, $currencies_array[$balance_currency]);
                $transaction_memo = 'Transfer to wallet';

                $transaction_data_array = array(
                    'from_userid' => $this->user_session['user_id'],
                    'batch_number' => $batch_number,
                    'to_userid' => $this->user_session['user_id'],
                    'amount' => $amount,
                    'transaction_time' => date('YmdHis'),
                    'transaction_memo' => $transaction_memo,
                    'from_account' => $this->user_session['account_number'],
                    'to_account' => $this->user_session['account_number'],
                    'transaction_currency' => $balance_currency,
                    'amount_text' => $amount_text,
                    'transaction_status' => 'completed',
                );

                $this->transaction->insert($transaction_data_array);

                $balanceFrom = array(
                    'user_id' => $this->user_session['user_id'],
                    'currency_code' => $amount,
                );

                $this->balance->updateBalance($balanceFrom, $amount, '-');
                $this->wallet->updateWallet($balanceFrom, $amount, '+');

                $dataEmail = array(
                    'firstname' => $this->user_session['firstname'],
                    'amount_text' => $amount_text,
                    'batch_number' => $batch_number,
                    'balance_currency' => $balance_currency,
                    'from_account' => $this->user_session['account_number'],
                    'fees_text' => 0,
                );

                $this->email_model->sendmail('PAGE_ACCOUNT_TRANSFER_WALLET', $this->user_session['firstname'], $this->user_session['email'], $dataEmail);
            } else {
                $this->data['validerrors'] = $this->validator->errors;
            }
        }

        $this->data['posts'] = $posts;


        $this->view('wallet/add');
    }

    public function transfer() {
        $this->load->model('email_model');
        $login_id = $this->session->userdata('login_id');
        if (!$this->user_session && !$login_id)
            redirect(site_url('login'));

        if ($this->user_session)
            $user_info = $this->user_session;
        else {
            $user_info = $this->user->getUserById($login_id);
        }

        $this->data['success'] = $this->input->get('success');

        $currencies_array = $this->currencies->getCurrencies();
        $balance_currencies[''] = '-- Select Currency --';

        $balances = $this->wallet->getBalanceByUserId($user_info['user_id']);
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
            $balance_currency = ($posts['balance_currency']);
            $amount = ($posts['amount']);

            if ($balance_currency == '')
                $this->validator->addError('Currency', 'Please select the currency of balance that you want to use for the transaction.');
            if ($amount <= 0) {
                $this->validator->addError('Amount', 'Please input correct Amount .');
            } else { // check if out of balance
                if ($amount > $balances_array[$balance_currency])
                    $this->validator->addError('Balance', 'You have not enough balance to transfer the amount(<strong>' . get_currency_value_format($amount, $currencies_array[$balance_currency]) . '</strong>). Please input difference amount.');
            }

            $to_account = ($posts['to_account']);


            $to_user_info = $this->user->getUser(array('account_number' => $posts['to_account']));
            if (!$to_user_info) {
                $this->validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
            } elseif (trim($to_account) == $user_info['account_number']) {
                $this->validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
            }

            if (count($this->validator->errors) == 0) {
                $batch_number = tep_create_random_value(11, 'digits');
                $amount_text = get_currency_value_format($amount, $currencies_array[$balance_currency]);
                $transaction_memo = '';

                $fees = $amount * $this->configs['TRANSFER_FEES'] / 100;
                $fees_text = get_currency_value_format($fees, $currencies_array[$balance_currency]);

                $amount = get_currency_value($amount, $currencies_array[$balance_currency]);
                $fees = get_currency_value($fees, $currencies_array[$balance_currency]);
                $current_amount = $amount - $fees;

                $transaction_data_array = array(
                    'from_userid' => $user_info['user_id'],
                    'batch_number' => $batch_number,
                    'to_userid' => $to_user_info['user_id'],
                    'amount' => $amount,
                    'fee' => $fees,
                    'fee_text' => $fees_text,
                    'transaction_time' => date('YmdHis'),
                    'transaction_memo' => $transaction_memo,
                    'from_account' => $user_info['account_number'],
                    'to_account' => $to_user_info['account_number'],
                    'transaction_currency' => $balance_currency,
                    'amount_text' => $amount_text,
                    'transaction_status' => 'completed',
                );

                $this->data['transaction_data'] = $transaction_data_array;

                $this->transaction->insert($transaction_data_array);


                $balanceFrom = array(
                    'user_id' => $user_info['user_id'],
                    'currency_code' => $balance_currency,
                );
                $this->wallet->updateWallet($balanceFrom, $amount, '-');
                $balanceTo = array(
                    'user_id' => $to_user_info['user_id'],
                    'currency_code' => $balance_currency,
                );
                $this->balance->updateBalance($balanceTo, $current_amount, '+');


                //admin transfer
                $batch_number_admin = tep_create_random_value(11, 'digits');
                $transaction_data_array_admin = array(
                    'from_userid' => $to_user_info['user_id'],
                    'batch_number' => $batch_number_admin,
                    'to_userid' => 1,
                    'amount' => $fees,
                    'fee' => 0,
                    'transaction_time' => date('YmdHis'),
                    'transaction_memo' => 'transaction fees #' . $batch_number,
                    'from_account' => $to_user_info['account_number'],
                    'to_account' => 'OOKCASH',
                    'transaction_currency' => $balance_currency,
                    'amount_text' => $fees_text,
                    'transaction_status' => 'completed',
                    'status' => '0',
                );

                $this->transaction->insert($transaction_data_array_admin);

                $balanceAdmin = array(
                    'user_id' => 1,
                    'currency_code' => $balance_currency,
                );
                $this->balance->updateBalance($balanceAdmin, $fees, '+');
                $dataEmail = array(
                    'firstname' => $to_user_info['firstname'],
                    'amount_text' => $amount_text,
                    'batch_number' => $batch_number,
                    'balance_currency' => $balance_currency,
                    'from_account' => $user_info['account_number'],
                    'fees_text' => $fees_text,
                );
                $this->email_model->sendmail('TRANSFER_EMAIL', $to_user_info['firstname'], $to_user_info['email'], $dataEmail);

                redirect(site_url('wallet/transfer') . '?success=1');
            } else {
                $this->data['validerrors'] = $this->validator->errors;
            }
        }

        $this->data['posts'] = $posts;

        $this->view('wallet/transfer');
    }

}