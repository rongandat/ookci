<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Adminconfig
 *
 * @author ngoalongkt
 */
class Configs extends MY_Controller {

    public function __construct() {

        parent::__construct();


        $this->data['menu_config'] = $this->menu_config_3;

        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }

        $this->permission();
    }

    public function index() {

        $this->data['title'] = 'Referral Default Config';
        $this->data['breadcrumbs'] = array();

        $this->data['data_configs'] = $this->configs;
        $msg = $this->session->flashdata('usermessage');
        if ($msg) {
            $this->data['usermessage'] = $msg;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $posts = $this->input->post();
            unset($posts['save-btn']);
            $this->config_model->editConfigs($posts);
            $data['usermessage'] = array('success', 'green', 'Successfully saved ', '');
            $this->session->set_flashdata(array('usermessage' => $data['usermessage']));
            redirect(admin_url('configs'));
        }

        $ssl_config = array(0, 1);

        
        $languages = $this->languages->getLanguages();

        $langList = array();
        foreach ($languages as $language) {
            $langList[$language->language_id] = $language->name;
        }

        $this->data['tab_general'] = array(
            array(
                'type' => 'input',
                'label' => 'Page title',
                'value' => array(
                    'name' => 'page_title',
                    'id' => 'page_title',
                    'class' => 'st-forminput',
                    'value' => !empty($this->configs['page_title']) ? $this->configs['page_title'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Record Per Page',
                'value' => array(
                    'name' => 'record_per_page',
                    'id' => 'record_per_page',
                    'class' => 'st-forminput',
                    'value' => !empty($this->configs['record_per_page']) ? $this->configs['record_per_page'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Email Configs',
                'value' => array(
                    'name' => 'email_config',
                    'id' => 'email_config',
                    'class' => 'st-forminput',
                    'value' => !empty($this->configs['email_config']) ? $this->configs['email_config'] : ''
                )
            ),
            array(
                'type' => 'radio',
                'label' => 'SSL',
                'value' => array(
                    array(
                        'name' => 'ssl_config',
                        'label' => 'Yes',
                        'class' => 'st-forminput',
                        'value' => '1',
                        'checked' => (!empty($this->configs['ssl_config']) && $this->configs['ssl_config'] == 1) ? TRUE : FALSE,
                    ),
                    array(
                        'name' => 'ssl_config',
                        'label' => 'No',
                        'class' => 'st-forminput',
                        'value' => '0',
                        'checked' => (isset($this->configs['ssl_config']) && $this->configs['ssl_config'] == 0) ? TRUE : FALSE,
                    ),
                )
            ),
        );

        $this->data['tab_local'] = array(
            array(
                'type' => 'dropdown',
                'label' => 'Default Language',
                'value' => array(
                    array(
                        'name' => 'language',
                        'options' => $langList,
                        'selected' => !empty($this->configs['language']) ? $this->configs['language'] : '',
                        'extra' => 'class="uniform"'
                    ),
                )
            )
        );
        $this->data['tab_option'] = array(
        );
        $this->data['tab_image'] = array(
        );
        $this->data['tab_ftp'] = array(
        );

        $this->data['input_submit'] = array(
            'value' => 'Submit',
            'class' => 'button-blue'
        );
        $this->data['main_content'] = 'adminconfig/referraldefault';
        $this->load_view('config', 'admincp');
    }

}

?>
