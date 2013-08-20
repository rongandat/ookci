<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $user_session = $this->session->userdata('user');
        if ($user_session) {
            redirect(site_url('home'));
        }
        $this->load->model('question_model', 'question');
    }

    public function index() {

        // get security questions
        $security_questions = $this->question->getQuestions();
        foreach ($security_questions as $security_question) {
            $security_questions_array[$security_question['question']] = $security_question['question'];
        }
// Customer Question 
        $security_questions_array[-1] = 'Custom Question';

        $this->assign('security_questions_array', $security_questions_array);
        $posts = $this->input->post();
        if ($posts) {
            $security_code = ($posts['security_code']);
            $secure_image_hash_string = $this->session->userdata('secure_image_hash_string');
            if ($security_code == $secure_image_hash_string) {
                $security_question = $posts['security_question'];
                $firstname = ($posts['firstname']);
                $lastname = ($posts['lastname']);
                $email = ($posts['email']);
                $confirm_email = ($posts['confirm_email']);
                $welcome_message = ($posts['welcome_message']);
                $security_answer = ($posts['security_answer']);
                $custom_question = ($posts['custom_question']);

                $this->validator->validateGeneral('First Name', $firstname, _ERROR_FIELD_EMPTY);
                $this->validator->validateGeneral('Last Name', $lastname, _ERROR_FIELD_EMPTY);

                if ($this->validator->validateEmail('Email', $email, ERROR_EMAIL_ADDRESS)) {
                    if ($email != $confirm_email) {
                        $this->validator->addError('Email/Confirm Email', ERROR_EMAIL_CONFIRM_EMAIL_MATCH);
                    } else {
                        // check if the email avaible
                        $emailCheck = $this->user->getUser(array('email' => $email));
                        if ($emailCheck) { // email existed
                            $this->validator->addError('Email', 'This e-mail already exists in our database. Please use a different e-mail address or login if you already have an OOKCASH account. ');
                        }
                    }
                }
                if ($security_question == -1) {
                    $this->validator->validateGeneral('Custom Question', $custom_question, _ERROR_FIELD_EMPTY);
                }
                $this->validator->validateGeneral('Security Answer', $security_answer, _ERROR_FIELD_EMPTY);
                $this->validator->validateGeneral('Welcome Mesasge', $welcome_message, _ERROR_FIELD_EMPTY);
            } else {
                $this->validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
            }

            if (count($this->validator->errors) == 0) { // create new user					
                $signup_info = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'welcome_message' => $welcome_message,
                    'security_question' => ($security_question == -1) ? $custom_question : $security_question,
                    'security_answer' => $security_answer
                );

                $this->session->set_userdata('signup_info', $signup_info);

                redirect('register/personal');
            } else {
                $this->data['validerrors'] = $this->validator->errors;
            }
        }
        $this->data['posts'] = $posts;
        $this->view('register/index');
    }

    public function personal() {
        $this->load->model('countries_model', 'country');
        $this->load->model('email_model');
        $this->load->model('zone_model', 'zone');
        $signup_info = $this->session->userdata('signup_info');
        $posts = $this->input->post();
        if (!$signup_info)
            redirect('register');

        //bof: DOB
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

        $this->assign('days_array', $days_array);
        // search years	
        $this->assign('months_array', $months_array);

        $years_array = array();
        $years_array[0] = '----';
        for ($i = $this_year - 90; $i < $this_year - 14; $i++) {
            $years_array[$i] = $i;
        }

        //eof: DOB
        //BOF: get countries list
        $countries = $this->country->getCountries();
        $countries_array[''] = '-- Select Country --';
        foreach ($countries as $country) {
            $countries_array[$country['countries_id']] = $country['countries_name'];
        }
        $this->assign('countries_array', $countries_array);
        //EOF: get countries list
        //BOF: get zones list

        $cId = !empty($posts['country_id']) ? $posts['country_id'] : 0;
        $zones = $this->zone->getZones($cId);
        $zones_array = array();
        $zones_array[''] = '-- Select State/Region --';
        foreach ($zones as $zone) {
            $zones_array[$zone['zone_id']] = $zone['zone_name'];
        }
        $this->assign('zones_array', $zones_array);
        //EOF: get zones list

        $this->assign('years_array', $years_array);

        if ($posts) {

            $account_name = ($posts['account_name']);
            $company_name = ($posts['company_name']);
            $address = ($posts['address']);
            $city = ($posts['city']);
            $country_id = (int) $posts['country_id'];
            $state = 0;
            $postcode = ($posts['postcode']);
            $phone = ($posts['phone']);
            $mobile = ($posts['mobile']);

            if ($this->validator->validateGeneral('Account Name', $account_name, _ERROR_FIELD_EMPTY)) {
                // check if the email avaible
                $userCheck = $this->user->getUser(array('account_name' => $account_name));
                if ($userCheck) { // email existed
                    $this->validator->addError('Account Name', 'This account name already exists in our database. Please use a different account name or login if you already have an OOKCASH account. ');
                }
            }
            $this->validator->validateGeneral('Address', $address, _ERROR_FIELD_EMPTY);
            if ($country_id == 0) {
                $this->validator->addError('Country', 'Please select country.');
            }
            $this->validator->validateGeneral('City', $city, _ERROR_FIELD_EMPTY);

            if (strlen($phone) < 7)
                $this->validator->addError('Phone', 'Please input correct phone number.');
            if (strlen($postcode) < 4)
                $this->validator->addError('Zip/Post Code', 'Please input correct Zip/Post Code.');

            $dobYear = ($posts['dobYear']);
            $dobMonth = ($posts['dobMonth']);
            $dobDay = ($posts['dobDay']);


            if ($dobYear == 0 || $dobMonth == 0 || $dobDay == 0) {
                $this->validator->addError('Date of Birth', 'Please select your DOB.');
            }

            if (count($this->validator->errors) == 0) { // create new user					
                // generate account secure informations
                $password = tep_create_random_value(7);
                $login_pin = tep_create_random_value(5, 'digits');
                $master_key = tep_create_random_value(3, 'digits');
                $account_number = 'U' . generate_account_number();

                // create user data
                $signup_data_array = array(
                    'firstname' => $signup_info['firstname'],
                    'lastname' => $signup_info['lastname'],
                    'email' => $signup_info['email'],
                    'security_question' => $signup_info['security_question'],
                    'security_answer' => $signup_info['security_answer'],
                    'welcome_message' => $signup_info['welcome_message'],
                    'account_name' => $account_name,
                    'company' => $company_name,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country_id,
                    'dob' => $dobYear . '-' . $dobMonth . '-' . $dobDay,
                    'phone' => $phone,
                    'mobile' => $mobile,
                    'language' => 'en',
                    'status' => 1, // inactive by default	,
                    'account_number' => $account_number,
                    'login_pin' => $login_pin,
                    'master_key' => $master_key,
                    'password' => encrypt_password($password),
                    'account_type' => 'user', // user by default,
                    'signup_date' => date('YmdHis')
                );
                $user_id = $this->user->insert($signup_data_array);

                $dataMail = array(
                    'firstname' => $signup_info['firstname'],
                    'account_number' => $account_number
                );

                $this->email_model->sendmail('SIGNUP_EMAIL', $signup_info['firstname'], $signup_info['email'], $dataMail);
                $this->session->unset_userdata('signup_info');

                $info_user = array(
                    'password' => $password,
                    'login_pin' => $login_pin,
                    'master_key' => $master_key,
                    'account_number' => $account_number,
                    'security_question' => $signup_info['security_question'],
                    'security_answer' => $signup_info['security_answer'],
                );
                $this->session->set_userdata('info_user',$info_user);
                redirect(site_url('register/complete/' . $user_id));
            } else {
                $this->data['validerrors'] = $this->validator->errors;
            }
        }

        $this->data['posts'] = $posts;

        $this->view('register/personal');
    }

    public function complete() {
        $secure_info = $this->session->userdata('info_user');
        if (!$secure_info)
            redirect('home');
        $this->data['secure_info'] = $secure_info;
        $this->session->unset_userdata('info_user');
        $this->view('register/complete');
    }

}