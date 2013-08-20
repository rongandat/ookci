<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forgot extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->load->model('email_model');
    }

    public function index() {

        $posts = $this->input->post();
        if ($posts) {
            $security_code = ($posts['security_code']);
            $secure_image_hash_string = $this->session->userdata('secure_image_hash_string');
            if ($security_code == $secure_image_hash_string) {
                $account_number = ($posts['account_number']);
                $email = ($posts['email']);

                if ($this->validator->validateEmail('E-mail', $email, ERROR_EMAIL_ADDRESS)) {
                    $account_info = $this->user->getUser(array('email' => $email, 'account_number' => $account_number));
                    if (!$account_info) { // email existed
                        $this->validator->addError('Account Number/E-mail', "Invalid account number/e-mail.");
                    }
                }
            } else {
                $this->validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
            }

            if (count($this->validator->errors) == 0) {   // found email => send account number to the email
                $forgot_info = array(
                    'account_number' => $account_number,
                    'email' => $email,
                );

                $this->session->set_userdata('forgot_info', $forgot_info);

                $reset_code = tep_create_random_value(10, 'digits');

                $dataEmail = array(
                    'firstname' => $account_info['firstname'],
                    'reset_code' => $reset_code,
                );


                $this->email_model->sendmail('RESET_PASSWORD_CODE', $account_info['firstname'], $account_info['email'], $dataEmail);
                $dataUpdate['reset_code'] = $reset_code;
                $this->user->update($account_info['user_id'], $dataUpdate);
                redirect('forgot/step2');
            } else {
                $this->data['validerrors'] = $this->validator->errors;
            }
        }
        $this->data['posts'] = $posts;
        $this->view('forgot/index');
    }

    public function step2() {
        $forgot_info = $this->session->userdata('forgot_info');
        if (!$forgot_info)
            redirect('forgot');

        $account_info = $this->user->getUser(array('email' => $forgot_info['email'], 'account_number' => $forgot_info['account_number']));
        if (!$account_info) { // email existed
            redirect('forgot');
        }

        $this->data['forgot_info'] = $forgot_info;
        $this->data['account_info'] = $account_info;

        $posts = $this->input->post();
        if ($posts) {
            $reset_code = ($posts['reset_code']);
            $security_question = ($posts['security_question']);
            if ($reset_code == $account_info['reset_code'] && $security_question == $account_info['security_answer']) {
                $forgot_info['reset_code'] = $reset_code;
                $forgot_info['security_answer'] = $security_question;
                $this->session->set_userdata('forgot_info', $forgot_info);
                redirect(site_url('forgot/step3'));
            } else {
                $this->validator->addError('Reset Code/Security Question', "The reset code or security answer doesn't match one sent to you or the security question is incorrect. Please check your information and try again.");
                $this->data['validerrors'] = $this->validator->errors;
            }
        }

        $this->view('forgot/step2');
    }

    public function step3() {
        $forgot_info = $this->session->userdata('forgot_info');
        if (!$forgot_info)
            redirect('forgot');
        $account_info = $this->user->getUser(array('email' => $forgot_info['email'], 'account_number' => $forgot_info['account_number'], 'reset_code' => $forgot_info['reset_code'], 'security_answer' => $forgot_info['security_answer']));
        if (!$account_info) { // email existed
            redirect('forgot/step2');
        }

        $posts = $this->input->post();
        if ($posts) {
            $password = ($posts['Password']);
            $password2 = ($posts['Password2']);

            $this->validator->validateEqual('Password', $password, $password2, _ERROR_PASSWORD);
            $this->validator->validateMinLength('Password Length', $password, 6, _ERROR_PASSWORD_MIN_LENGTH);

            if (count($this->validator->errors) == 0) {
                $this->user->update($account_info['user_id'],array('password' => encrypt_password($password)));
                redirect('forgot/success');
            }
        }

        $this->view('forgot/step3');
    }
    
    public function success(){
        $this->view('forgot/success');
    }

}