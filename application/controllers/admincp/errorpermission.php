<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Errorpermission extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['menu_config'] = $this->menu_config_0;
        
        
    }

    public function index() {

        $this->load_view('error_permission','admincp');
    }
}