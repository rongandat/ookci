<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * A base controller for all controllers. here we set various variables and tasks to avoid redundantly doing it throughout codebase
 *
 * @author 		Khiem Pham <khiemktqd@gmail.com>
 * @date 		14/12/2012
 */
class MY_Controller extends CI_Controller {

    var $menu_config_0 = array('', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_1 = array('', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_2 = array('', '', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_3 = array('', '', '', 'active', '', '', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_4 = array('', '', '', '', 'active', '', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_5 = array('', '', '', '', '', 'active', '', '', '', '', '', '', '', '', '', '');
    var $menu_config_6 = array('', '', '', '', '', '', 'active', '', '', '', '', '', '', '', '', '');
    var $menu_config_7 = array('', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', '');
    var $menu_config_8 = array('', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '');
    var $menu_config_9 = array('', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '');
    var $menu_config_10 = array('', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '');
    var $menu_config_11 = array('', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '');
    var $menu_config_12 = array('', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '');
    var $menu_config_13 = array('', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '');
    var $menu_config_14 = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '');
    var $menu_config_15 = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active');
    protected $data;
    protected $permission;
    protected $configs;
    protected $language;
    var $ignore = array(
        'authenticate', 'home', 'errorpermission'
    );

    public function __construct() {

        parent::__construct();

        $this->load->model('user_model', 'user');
        $this->load->model('configs_model');

        $this->configs = $this->configs_model->getConfigs();
        $this->data['configs'] = $this->configs;

        $this->data['class'] = $this->router->fetch_class();
        $this->data['action'] = $this->router->fetch_method();


        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        

        $this->data['page_title'] = $this->configs['SITE_NAME'];

        $this->data['app_path'] = APPPATH;
        $this->data['system_path'] = SYSDIR;
        $languages_id = 1; // EN by default
        $this->session->set_userdata('languages_id', $languages_id);
        
    }
    
    public function assign($key,$value){
        $this->data[$key] = $value;
    }

    

    public function view($view, $template = 'common/default') {
        $this->data['body_html'] = $this->mysmarty->fetch($view . '.html', $this->data);
        $this->mysmarty->view($template . '.html', $this->data);
    }
    
    public function view_ajax($view){
       return $this->mysmarty->fetch($view . '.html', $this->data);
    }


}