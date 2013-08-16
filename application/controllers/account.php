<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends MY_Controller {

    private $user_session;

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->lang->load('acount', 'english');
        $this->user_session = $this->session->userdata('user');
        if (!$this->user_session)
            redirect(site_url('login'));
    }

    public function index() {
        $this->load->model('balance_model', 'balance');
        $this->load->model('currencies_model', 'currencies');
        $this->load->model('wallet_model', 'wallet');
        $balances = $this->balance->getBalanceByUserId($this->user_session['user_id']);
        $this->data['sci_info'] =  $this->session->userdata('sci');

        $currencies_array = $this->currencies->getCurrencies();
        $balances_array = array();
        foreach ($balances as $balance) {
            $balances_array[$balance['currency_code']] = $balance['balance'];
        }

        $balance_info_array = array();
        foreach ($currencies_array as $currency_code => $currency_info) {
            $balance_info_array[] = array(
                'balance_code' => $currency_info['code'],
                'balance_name' => $currency_info['title'],
                'balance_text' => get_currency_value_format(!empty($balances_array[$currency_info['code']]) ? $balances_array[$currency_info['code']] : 0, $currency_info)
            );
        }

        $this->data['balances'] = $balance_info_array;

        $wallets = $this->wallet->getBalanceByUserId($this->user_session['user_id']);
        $wallets_array = array();
        foreach ($wallets as $balance) {
            $wallets_array[$balance['currency_code']] = $balance['balance'];
        }
        $totals_info_array = array();
        $wallet_info_array = array();
        foreach ($currencies_array as $currency_code => $currency_info) {
            $wallet_info_array[] = array(
                'balance_code' => $currency_info['code'],
                'balance_name' => $currency_info['title'],
                'balance_text' => get_currency_value_format(!empty($wallets_array[$currency_info['code']]) ? $wallets_array[$currency_info['code']] : 0, $currency_info)
            );
            $totals_info_array[] = array('balance_text' => get_currency_value_format(!empty($wallets_array[$currency_info['code']]) ? $wallets_array[$currency_info['code']] : 0 + !empty($balances_array[$currency_info['code']]) ? $balances_array[$currency_info['code']] : 0, $currency_info));
        }

        $this->data['wallets'] = $wallet_info_array;
        $this->data['totals'] = $totals_info_array;


        $this->view('account/index');
    }

    public function personal() {
        $posts = $this->input->post();
        $this->load->model('countries_model', 'countries');
        $this->load->model('zone_model', 'zone');
        $this->data['heading_title'] = HEADING_TITLE;
        if (!$posts) {
            $this->view('master_key');
        } else {
            if (($posts['master_key'] != $this->user_session['master_key']) && empty($posts['action'])) {
                $this->validator->addError('Master Key', 'Invalid master key. Please try again.');
                $this->data['validerrors'] = $this->validator->errors;
                $this->view('master_key');
            } else {
                $user_info = $this->user_session;

                $countries = $this->countries->getCountries();
                $countries_array = array();
                $countries_array[''] = '-- Select Country --';
                foreach ($countries as $country_info) {
                    $countries_array[$country_info['countries_id']] = $country_info['countries_name'];
                }
                $this->data['countries_array'] = $countries_array;

                $zones = $this->zone->getZones($this->user_session['country']);
                $zones_array[''] = '-- Select State/Region --';
                foreach ($zones as $zone) {
                    $zones_array[$zone['zone_id']] = $zone['zone_name'];
                }
                $this->data['zones_array'] = $zones_array;
                if (!empty($posts['action'])) {
                    $master_key_pass = true;
                    $account_name = ($posts['account_name']);
                    $company = ($posts['company']);
                    $address = ($posts['address']);
                    $city = ($posts['city']);
                    $country = (int) $posts['country'];
                    $state = ($posts['state']);
                    $postcode = ($posts['postcode']);
                    $phone = ($posts['phone']);
                    $mobile = ($posts['mobile']);
                    $firstname = ($posts['firstname']);
                    $lastname = ($posts['lastname']);
                    $additional_information = ($posts['additional_information']);
                    $welcome_message = ($posts['welcome_message']);


                    $this->validator->validateGeneral('Account Name', $account_name, _ERROR_FIELD_EMPTY);
                    $this->validator->validateGeneral('Company Name', $account_name, _ERROR_FIELD_EMPTY);
                    $this->validator->validateGeneral('Address', $address, _ERROR_FIELD_EMPTY);
                    $this->validator->validateGeneral('Personal welcome message', $welcome_message, _ERROR_FIELD_EMPTY);
                    if ($country == 0) {
                        $this->validator->addError('Country', 'Please select country.');
                    }
                    $this->validator->validateGeneral('City', $city, _ERROR_FIELD_EMPTY);

                    if ($state == 0) {
                        $this->validator->addError('State', 'Please select state.');
                    }

                    if (strlen($phone) < 7)
                        $this->validator->addError('Phone', 'Please input correct phone number.');
                    if (strlen($postcode) < 4)
                        $this->validator->addError('Zip/Post Code', 'Please input correct Zip/Post Code.');

                    if ($posts['master_key'] != $this->user_session['master_key']) {
                        $this->validator->addError('Master Key', 'Invalid master key. Please try again.');
                    }
                    if (count($this->validator->errors) == 0) {
                        $signup_data_array = array(
                            'firstname' => $posts['firstname'],
                            'lastname' => $posts['lastname'],
                            'account_name' => $posts['account_name'],
                            'company' => $posts['company'],
                            'address' => $posts['address'],
                            'city' => $posts['city'],
                            'state' => $posts['state'],
                            'country' => $posts['country'],
                            'phone' => $posts['phone'],
                            'mobile' => $posts['mobile'],
                            'postcode' => $posts['postcode'],
                            'additional_information' => $posts['additional_information'],
                            'welcome_message' => $posts['welcome_message']
                        );
                        $user_info = $this->user_session;
                        $this->user->update($this->user_session['user_id'], $signup_data_array);
                        $user = $this->user->getUserById($this->user_session['user_id']);
                        unset($user['password']);
                        $this->session->set_userdata('user', $user);
                        $this->data['success'] = true;
                    } else {
                        $this->data['validerrors'] = $this->validator->errors;
                        $this->data['user_info'] = $posts;
                    }
                }
                $this->data['user_info'] = $user_info;
                $this->view('account/personal');
            }
        }
    }

    public function history($start = 0) {
        $this->load->model('transaction_model', 'transaction');
//bof: date
        $this_year = date('Y');
        $months_array[0] = '--';
        for ($i = 1; $i < 13; $i++) {
            $months_array[$i] = $i;
        }
// day of month array
        $days_array[0] = '--';
        for ($i = 1; $i < 32; $i++) {
            $days_array[$i] = $i;
        }


        $this->data['days_array'] = $days_array;
// search years	
        $this->data['months_array'] = $months_array;

        $years_array = array();
        $years_array[0] = '----';
        for ($i = $this_year - 3; $i < $this_year + 1; $i++) {
            $years_array[$i] = $i;
        }
        $this->assign('years_array', $years_array);

        $this->assign('fromdateDay', (int)date('d'));
        $this->assign('fromdateMonth',(int) date('m'));
        $this->assign('fromdateYear', date('Y'));
        $this->assign('todateDay', (int)date('d'));
        $this->assign('todateMonth', (int)date('m'));
        $this->assign('todateYear', date('Y'));

        $posts = $this->input->post();
        $dataWhere['status'] = 1;
        $dataWhere['(from_userid = ' . $this->user_session['user_id'] . ' OR to_userid = ' . $this->user_session['user_id'] . ')'] = NULL;
        if ($posts) {
            $action = $posts['action'];
            switch ($action) {
                case 'process_search':
                    $batch_number = ($posts['batch_number']);
                    $to_account = ($posts['to_account']);
                    $from_account = ($posts['from_account']);
                    $note = ($posts['transaction_note']);

                    $search_date_filter = !empty($posts['search_date_filter']) ? $posts['search_date_filter'] : FALSE;

                    if ($search_date_filter) {
                        $fromdateDay = ($posts['fromdateDay']);
                        $fromdateMonth = ($posts['fromdateMonth']);
                        $fromdateYear = ($posts['fromdateYear']);
                        $todateDay = ($posts['todateDay']);
                        $todateMonth = ($posts['todateMonth']);
                        $todateYear = ($posts['todateYear']);

                        if ($fromdateDay != 0 && $fromdateMonth != 0 && $fromdateYear != 0) {
                            $from_date = date('Y-m-d', strtotime($fromdateDay . '-' . $fromdateMonth . '-' . $fromdateYear));
                            $dataWhere['DATE_FORMAT(transaction_time,"%Y-%m-%d")>='] = $from_date;
                        }

                        if ($todateDay != 0 && $todateMonth != 0 && $todateYear != 0) {
                            $to_date = date('Y-m-d', strtotime($todateDay . '-' . $todateMonth . '-' . $todateYear));
                            $dataWhere['DATE_FORMAT(transaction_time,"%Y-%m-%d")<='] = $to_date;
                        }
                    }

                    if (!empty($batch_number))
                        $dataWhere['batch_number'] = $batch_number;

                    if (!empty($from_account)) {
                        $dataWhere['from_account LIKE'] = $from_account . '%';
                        $dataWhere['to_account'] = $login_account_number;
                    } elseif (!empty($to_account)) {
                        $dataWhere['to_account LIKE'] = $to_account . "%";
                        $dataWhere['from_account'] = $login_account_number;
                    }

                    if (!empty($note))
                        $dataWhere['transaction_memo LIKE'] = "%" . $note . "%";

                    $this->data['posts'] = $posts;
                    break;
            }
        }


        //       Begin pagination
        $limit = 25;
        $this->load->library("pagination");
        $config = array();
        $config["total_rows"] = $this->transaction->totalTransactions($dataWhere);
        $config["base_url"] = site_url('account/history');
        $config["per_page"] = $limit;
        $page = $start;
        $config["uri_segment"] = 3;
        $config['num_links'] = 2;

        $config['first_link'] = $this->lang->line('first_link');
        $config['first_tag_open'] = '<div class="nav-button">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = $this->lang->line('last_link');
        $config['last_tag_open'] = '<div class="nav-button">';
        $config['last_tag_close'] = '</div>';
        $config['cur_tag_open'] = "<div class='nav-button'><div class='nav-page nav-page-selected'>";
        $config['cur_tag_close'] = '</div></div>';
        $config['num_tag_open'] = "<div class='nav-button'><div class='nav-page'>";
        $config['num_tag_close'] = '</div></div>';
        $config['prev_tag_open'] = "<div class='nav-button'>";
        $config['prev_link'] = $this->lang->line('prev_link');
        $config['prev_tag_close'] = '</div>';
        $config['next_link'] = $this->lang->line('next_link');
        $config['next_tag_open'] = "<div class='nav-button'>";
        $config['next_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $this->data["links"] = $this->pagination->create_links();
//       End pagination

        $transactions = $this->transaction->getTransactions($dataWhere, $limit, $start);
        $this->data['transactions'] = $transactions;
        $this->view('account/history');
    }

}