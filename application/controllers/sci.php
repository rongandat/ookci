<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sci extends MY_Controller {

    private $user_session;

    public function __construct() {
        parent::__construct();
        $this->lang->load('english', 'english');
        $this->user_session = $this->session->userdata('user');
        if (!$this->user_session)
            redirect(site_url('login'));
    }
    
    
}