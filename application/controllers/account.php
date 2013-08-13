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

        $this->data['wallets'] = $totals_info_array;
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

    public function history() {
        $action = $posts['action'];
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


        $smarty->assign('days_array', $days_array);
// search years	
        $smarty->assign('months_array', $months_array);

        $years_array = array();
        $years_array[0] = '----';
        for ($i = $this_year - 3; $i < $this_year + 1; $i++) {
            $years_array[$i] = $i;
        }
        $smarty->assign('years_array', $years_array);

        $smarty->assign('fromdateDay', date('d'));
        $smarty->assign('fromdateMonth', date('m'));
        $smarty->assign('fromdateYear', date('Y'));
        $smarty->assign('todateDay', date('d'));
        $smarty->assign('todateMonth', date('m'));
        $smarty->assign('todateYear', date('Y'));

        $posts = $this->input->post();
        $dataWhere['status'] = 1;
        switch ($action) {
            case 'process_search':
                $batch_number = ($posts['batch_number']);
                $to_account = ($posts['to_account']);
                $from_account = ($posts['from_account']);
                $note = ($posts['transaction_note']);

                $search_date_filter = (int) $posts['search_date_filter'];

                if ($search_date_filter) {
                    $fromdateDay = ($posts['fromdateDay']);
                    $fromdateMonth = ($posts['fromdateMonth']);
                    $fromdateYear = ($posts['fromdateYear']);
                    $todateDay = ($posts['todateDay']);
                    $todateMonth = ($posts['todateMonth']);
                    $todateYear = ($posts['todateYear']);

                    if ($fromdateDay != 0 && $fromdateMonth != 0 && $fromdateYear != 0) {
                        $from_date = date('Y-m-d', strtotime($fromdateDay . '-' . $fromdateMonth . '-' . $fromdateYear));
                        $where_filter .= " AND DATE_FORMAT(transaction_time,'%Y-%m-%d')>='" . $from_date . "' ";
                    }

                    if ($todateDay != 0 && $todateMonth != 0 && $todateYear != 0) {
                        $to_date = date('Y-m-d', strtotime($todateDay . '-' . $todateMonth . '-' . $todateYear));
                        $where_filter .= " AND DATE_FORMAT(transaction_time,'%Y-%m-%d')<='" . $to_date . "' ";
                    }
                }

                if (tep_not_null($batch_number))
                    $where_filter .= " AND batch_number='" . $batch_number . "' ";

                if (tep_not_null($from_account)) {
                    $where_filter .= " AND from_account LIKE '" . $from_account . "%' AND to_account='" . $login_account_number . "'";
                } elseif (tep_not_null($to_account)) {
                    $where_filter .= " AND to_account LIKE '" . $to_account . "%' AND from_account='" . $login_account_number . "' ";
                }

                if (tep_not_null($note))
                    $where_filter .= " AND transaction_memo LIKE '%" . $note . "%' ";

                postAssign($smarty);
                break;
        }
    }

}