<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }

        $this->permission();
        $this->load->model('languages');

    }

    public function index() {
        
    }

}