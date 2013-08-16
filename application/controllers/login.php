<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
    }

    public function index() {
        $error_log_login = $this->session->userdata('error_log_login');
        if (!$error_log_login)
            $error_log_login = 0;

        

        $user_session = $this->session->userdata('user');
        if ($user_session) {
            redirect(site_url('home'));
        }

        $posts = $this->input->post();

        if ($posts) {

            $account_number = $posts['account_number'];
            $login_password = $posts['password'];
            $security_code = !empty($posts['security_code']) ? $posts['security_code'] : false;

            if (!empty($error_log_login) && $error_log_login > 3) {
                $secure_image_hash_string = $this->session->userdata('secure_image_hash_string');
                if ($security_code != $secure_image_hash_string)
                    $this->validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
            }

            $this->validator->validateGeneral('Account Number', $account_number, _ERROR_FIELD_EMPTY);
            $this->validator->validateGeneral('Password', $login_password, _ERROR_FIELD_EMPTY);

            if (count($this->validator->errors) == 0) {
                $user = $this->user->checkLogin($account_number, $login_password);

                if (!$user) {
                    $this->validator->addError('Account Number/Password', ERROR_INVALID_ACCOUNT);
                    $error_log_login++;
                    $this->session->set_userdata('error_log_login', $error_log_login);
                    $this->data['validerrors'] = $this->validator->errors;
                } else {
                    $this->session->set_userdata('login_id', $user['user_id']);

                    $current_ip = get_client_ip();

                    if (($user['verification_status'] == 1) && ($current_ip != $user['verification_ip'])) {
                        $verification_key = tep_create_random_value(10, 'digits');

                        $signup_data_array['verification_key'] = $verification_key;
                        $this->user->update($user['user_id'], $signup_data_array);

                        $this->load->model('email_model');
                        
                        $this->email_model->sendmail('VERIFYCATION_KEY', $user['firstname'], $user['email'], $user);

                    }

                    redirect(site_url('login/comfirm'));
                }
            } else {
                $error_log_login++;
                $this->session->set_userdata('error_log_login', $error_log_login);
                $this->data['validerrors'] = $this->validator->errors;
            }
        }


        $this->data['error_log_login'] = $error_log_login;
        $this->view('login/index');
    }

    public function comfirm() {
        
        $login_id = $this->session->userdata('login_id');
        if (!$login_id) {
            redirect(site_url('login'));
        }

        $user_session = $this->session->userdata('user');
        if ($user_session) {
            redirect(site_url('home'));
        }

        $user = $this->user->getUserById($login_id);
        $this->data['user'] = $user;

        $current_ip = get_client_ip();
        $mss_flag = FALSE;
        $account_info = (array) $user;
        if (($account_info['verification_status'] == 1) && ($current_ip != $account_info['verification_ip'])) {
            $mss_flag = true;
        }
        $posts = $this->input->post();
        if ($posts) {
            if ($mss_flag && ($account_info['verification_key'] != $posts['verification_key'])) {
                $this->validator->addError('Verification code', 'Invalid verification code. Please try again.');
            }
            if (count($this->validator->errors) == 0) {
                if ($posts['confirm_message'] == 1) { //make sure correct personal welcome message 
                    redirect('login/balance');
                }
            }
            else
                $this->data['validerrors'] = $this->validator->errors;
        }

        $this->data['mss_flag'] = $mss_flag;


        $this->view('login/confirm');
    }

    public function balance() {
        $login_id = $this->session->userdata('login_id');
        if (!$login_id) {
            redirect(site_url('login'));
        }
        $user_session = $this->session->userdata('user');
        if ($user_session) {
            redirect(site_url('home'));
        }

        $this->load->model('balance_model', 'balance');
        $this->load->model('currencies_model', 'currencies');
        $balances = $this->balance->getBalanceByUserId($login_id);
        $balances_array = array();
        foreach ($balances as $balance) {
            $balance = $balance;
            $balances_array[$balance['currency_code']] = $balance['balance'];
        }
        // get all currencies_list
        $currencies_array = $this->currencies->getCurrencies();
        foreach ($currencies_array as $currency_code => $currency_info) {
            if (!empty($balances_array[$currency_info['code']]))
                $balance_info_array[] = array('balance_name' => $currency_info['title'],
                    'balance_text' => get_currency_value_format($balances_array[$currency_info['code']], $currency_info)
                );
        }
        $this->data['balances'] = $balance_info_array;
        $this->view('login/balance');
    }

    public function pin() {
        $login_id = $this->session->userdata('login_id');
        if (!$login_id) {
            redirect(site_url('login'));
        }
        $user_session = $this->session->userdata('user');
        if ($user_session) {
            redirect(site_url('home'));
        }
        $user = $this->user->getUserById($login_id);
        $this->data['user'] = $user;
        $posts = $this->input->post();
        if ($posts) {
            $login_pin = $posts['login_pin'];
            if ($login_pin == $user['login_pin']) {
                unset($user['password']);
                $this->session->set_userdata('user', $user);
                redirect(site_url('account'));
                $this->session->unset_userdata('login_id');
            } else {
                $this->validator->addError('Login PIN', 'Invalid Login Pin.');
                $this->data['validerrors'] = $this->validator->errors;
            }
        }

        $this->view('login/pin');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */