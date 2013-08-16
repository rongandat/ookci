<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

   public function __construct() {

        parent::__construct();


        $this->data['menu_config'] = $this->menu_config_1;

        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->load_lang('admincp/home');
        $this->lang = $this->lang->language;
        $this->data['lang'] = $this->lang;
        $this->permission();
    }

    public function index() {
        
        $this->load_view('home', 'admincp');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */