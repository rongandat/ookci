<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sci extends MY_Controller {

    private $user_session;

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->lang->load('errcode', 'english');
        $this->user_session = $this->session->userdata('user');

//        
        $this->load->model('balance_model', 'balance');
        $this->load->model('currencies_model', 'currencies');
        $this->load->model('transaction_model', 'transaction');
    }

    public function generate() {


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

        $this->assign('fields_extra', $this->configs['FIELDS_EXTRA_SCI_LIMIT']);

        $posts = $this->input->post();


        if ($posts) {
            $string_input = '';
            foreach ($posts as $key => $post) {
                if ($key == 'cancel_url' || $key == 'fail_url' || $key == 'success_url' || $key == 'status_url') {
                    $post = base64_encode($post);
                }
                if ($key != 'extra_field' && $key != 'extra_value') {
                    $posts_value[$key] = $post;
                    $string_input .= '&' . $key . '=' . $post;
                } elseif ($key == 'extra_field') {
                    foreach ($post as $number => $field) {
                        if (!empty($field)) {
                            $posts_value[$field] = $posts['extra_value'][$number];
                            $string_input .= '&' . $field . '=' . $posts['extra_value'][$number];
                        }
                    }
                }
            }
            $string_input = substr($string_input, 1);

            if ($this->validator->validateGeneral('Account Number', $posts['payee_account'], _ERROR_FIELD_EMPTY)) {
                $user = $this->user->getUser(array('account_number' => $posts['payee_account']));
                if (!$user) {
                    $this->validator->addError('Acount Number', ERROR_ACCOUNT_NUMBER_WRONG);
                }
            }

            if (empty($posts['checkout_currency'])) {
                $this->validator->addError('Currency', ERROR_CURENCY_EMPTY);
            }

            if (!empty($posts['checkout_amount'])) {
                if (!is_numeric($posts['checkout_amount']) || $posts['checkout_amount'] < 0) {
                    $this->validator->addError('Amount', ERROR_AMOUNT);
                }
            }

            if (count($this->validator->errors) == 0) {

                $site_root = base_url();

                $zend_code_link = site_url('sci/process') . '?' . $string_input;

                $zend_code_html = '<a href="' . $zend_code_link . '">Pay With OOKCASH Reserve!</a>';

                $zend_code_buton = '<a href="' . $zend_code_link . '"><img src="' . $site_root . '/images/ookcash-button.png"/></a>';
                $this->assign('posts_value', $posts_value);
                $this->assign('posts', $posts);
                $this->assign('post_link', site_url('sci/process'));
                $this->assign('zend_code_link', $zend_code_link);
                $this->assign('zend_code_html', $zend_code_html);
                $this->assign('zend_code_buton', $zend_code_buton);
                $zend_code_form = $this->view_ajax('sci/zend_form');
                $this->assign('zend_code_form', $zend_code_form);
            } else {

                $this->assign('validerrors', $this->validator->errors);
            }
        }

        $this->data['posts'] = $posts;
        $this->view('sci/generate');
    }

    public function process() {


        $this->session->unset_userdata('user');

        $requests = $this->input->request();

        if (empty($requests['payee_account'])) {
            $error_code[] = $this->lang->line('ERR_002');
        } else {
            $user = $this->user->getUser(array('account_number' => $requests['payee_account']));
            if (!$user)
                $error_code[] = $this->lang->line('ERR_002');
        }

        if (empty($requests['checkout_currency'])) {
            $error_code[] = $this->lang->line('ERR_006');
        } else {
            $curency = $this->currencies->getCurrencyByCode($requests['checkout_currency']);
            if (!$curency) {
                $error_code[] = $this->lang->line('ERR_010');
            }
        }

        $custom_fields = array('payee_account', 'payer_account', 'checkout_amount', 'checkout_currency', 'cancel_url', 'fail_url', 'success_url', 'status_url', 'status_method');
        $i = 0;
        foreach ($requests as $field => $value) {
            if (!in_array($field, $custom_fields)) {
                $i++;
            }
        }
        if ($i > $this->configs['FIELDS_EXTRA_SCI_LIMIT']) {
            $error_code[] = sprintf($this->lang->line('ERR_005'), $this->configs['FIELDS_EXTRA_SCI_LIMIT']);
        }

        if (empty($error_code)) {
            $this->session->set_userdata('sci', $requests);
            $this->data['sci_info'] = $requests;
            $this->data['user_info'] = $user;
        } else {
            $this->assign('errors', $error_code);
        }

        $this->view('sci/process');
    }

    public function transfer() {
        if (!$this->user_session)
            redirect(site_url('login'));
        $sci_info = $this->session->userdata('sci');
        if (!$sci_info || empty($sci_info['checkout_currency'])) {
            $this->validator->addError('SCI Information', 'You haven\'t yet input sci info');
            $this->assign('validerrors', $this->validator->errors);
        } else {
            $checkout_amount = $sci_info['checkout_amount'];
            $currency = $this->currencies->getCurrencyByCode($sci_info['checkout_currency']);
            $balance = get_currency_value_format($checkout_amount, $currency);

            $fees = $checkout_amount * $this->configs['TRANSFER_FEES'] / 100;
            $fees_text = get_currency_value_format($fees, $currency);
            $checkout_amount = get_currency_value($checkout_amount, $currency);
            $fees = get_currency_value($fees, $currency);
            
            $balance_current = $this->balance->


            $this->data['sci_info'] = $sci_info;
            $sci_user = $this->user->getUser(array('account_number' => $sci_info['payee_account']));
            if (!$sci_user) {
                redirect(site_url('transfer'));
            }
            $this->data['sci_user'] = $sci_user;

            $posts = $this->input->post();
            if ($posts) {
                $master_key = $posts['master_key'];
                if ($master_key != $this->user_session['master_key']) {
                    $this->validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
                }
                
                if ($checkout_amount <= 0) {
                    if (empty($posts['checkout_amount'])) {
                        $this->validator->addError('Amount', 'Amount greater than 0');
                    } else {
                        $amount = $posts['checkout_amount'];
                        if ($validator->validateNumber('Amount', $amount, 'Amount greater than 0')) {
                            $checkout_amount = $amount;
                            $balance = get_currency_value_format($checkout_amount, $currency);
                            $fees = $checkout_amount * TRANSFER_FEES / 100;
                            $fees_text = get_currency_value_format($fees, $currency);
                            $checkout_amount = get_currency_value($checkout_amount, $currency);
                            $fees = get_currency_value($fees, $currency);
                        }
                    }
                }
                if (count($this->validator->errors) == 0) {
                    $sci_info['checkout_amount'] = $checkout_amount;
                    $sci_info['transaction_memo'] = $posts['transaction_memo'];
                    $sci_info['balance'] = $balance;
                    $sci_info['fees'] = $fees;
                    $sci_info['fees_text'] = $fees_text;
                    $sci_info['master_key'] = $master_key;
                    $this->session->set_userdata('sci', $sci_info);
                    redirect('sci/preview');
                } else {
                    $this->assign('validerrors', $this->validator->errors);
                }
            }
        }

        $this->view('sci/transfer');
    }

    public function preview() {
        if (!$this->user_session)
            redirect(site_url('login'));
        $sci_info = $this->session->userdata('sci');
        if ($sci_info['master_key'] != $this->user_session['master_key']) {
            redirect('sci/transfer');
        }
        
        var_dump($sci_info);die;

        if (empty($sci_info)) {
            $this->validator->addError('SCI Information', 'You haven\'t yet input sci info');
            $this->assign('validerrors', $this->validator->errors);
        } else {
            $this->data['sci_info'] = $sci_info;

            $sci_user = $this->user->getUser(array('account_number' => $sci_info['payee_account']));
            if (!$sci_user) {
                redirect(site_url('transfer'));
            }
            $this->data['sci_user'] = $sci_user;
        }

        $posts = $this->input->post();
        if ($posts) {
            if (empty($sci_info['checkout_amount'])) {
                $this->validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
            } else {
                $amount = $posts['checkout_amount'];
                if ($validator->validateNumber('Amount', $amount, 'Amount greater than 0')) {
                    $checkout_amount = $amount;
                    $balance = get_currency_value_format($checkout_amount, $currency);
                    $fees = $checkout_amount * TRANSFER_FEES / 100;
                    $fees_text = get_currency_value_format($fees, $currency);
                    $checkout_amount = get_currency_value($checkout_amount, $currency);
                    $fees = get_currency_value($fees, $currency);
                }
            }
        }
        $this->view('sci/preview');
    }

}