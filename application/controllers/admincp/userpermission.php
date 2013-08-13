<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userpermission extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->data['menu_config'] = $this->menu_config_2;


        $msg = $this->session->flashdata('msg');
        if ($msg) {
            $this->data['msg'] = $msg;
        }
        
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        
        $this->load_lang('admincp/userpermission');
        $this->lang = $this->lang->language;
        $this->data['lang'] = $this->lang;
        
        $this->permission();
        
       
    }

    public function index() {
        $this->data['roles'] = $this->role->getRoles();
        $this->load_view('userpermission/index','admincp');
    }

    public function form($id = 0) {
        $posts = $this->input->post();
//        $this->load->view('welcome_message');

        $this->data['permissions'] = array();


        if (!empty($id)) {
            $user_group_info = $this->role->getUserRole($id);
        }
        $files = glob(APPPATH . 'controllers/admincp/*.php');
        $ignore = array(
            'welcome',
        );
        $checkbox_access_input = array();
        $checkbox_modify_input = array();

        $textbox_input = array(
            'name' => 'name',
            'class' => 'st-forminput',
            'value' => !empty($user_group_info['name']) ? $user_group_info['name'] : ''
        );

        $access = !empty($user_group_info['permission']['access']) ? $user_group_info['permission']['access'] : array();
        $modify = !empty($user_group_info['permission']['modify']) ? $user_group_info['permission']['modify'] : array();
        foreach ($files as $file) {
            $data = explode('/', dirname($file));

            $permission = basename($file, '.php');

            if (!in_array($permission, $this->ignore)) {
                $checkbox_access_input[] = array(
                    'input' => array(
                        'class' => 'uniform',
                        'style' => 'opacity: 0;',
                        'name' => 'permission[access][]',
                        'value' => $permission,
                        'checked' => in_array($permission, $access) ? TRUE : FALSE,
                    ),
                    'label' => $permission
                );
                $checkbox_modify_input[] = array(
                    'input' => array(
                        'class' => 'uniform',
                        'style' => 'opacity: 0;',
                        'name' => 'permission[modify][]',
                        'value' => $permission,
                        'checked' => in_array($permission, $modify) ? TRUE : FALSE,
                    ),
                    'label' => $permission
                );
            }
        }

        if ($posts && $this->validate()) {
            $data_post['name'] = $posts['name'];
            $data_post['permission'] = serialize($posts['permission']);

            if (!empty($user_group_info)) {
                $this->role->update($id, $data_post);
            } else {
                $id = $this->role->insert($data_post);
            }

            $this->session->set_flashdata('msg', array('status' => 'succesbox', 'message' => 'Update Permission Success'));
            redirect(admin_url('userpermission/form/' . $id));
        }


        $this->data['checkbox_access_input'] = $checkbox_access_input;
        $this->data['checkbox_modify_input'] = $checkbox_modify_input;
        $this->data['textbox_input'] = $textbox_input;

        $this->data['input_submit'] = array(
            'value' => 'Submit',
            'class' => 'st-button'
        );
        $this->data['input_reset'] = array(
            'value' => 'Reset',
            'class' => 'st-clear'
        );

        $this->load_view('admincp/userpermission/form','admincp');
    }

    private function validate() {
        $error = null;
        if (!$this->hasPermission('modify')) {
            $error = 'You don\'t have permission modify it';
        }
        if ($error) {
            $this->data['msg'] = array(
               'status' => 'errorbox', 'message' => $error
            );
            return FALSE;
        }
        return true;
    }

}
