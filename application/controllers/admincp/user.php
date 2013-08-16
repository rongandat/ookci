<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();


        $this->data['menu_config'] = $this->menu_config_4;

        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->load_lang('admincp/user');
        $this->lang = $this->lang->language;
        $this->data['lang'] = $this->lang;
        $this->permission();
    }

    public function index() {
        $this->load_view('user/index', 'admincp');
    }

    public function form($id = 0) {
        $user = $this->user->getUserById($id);
        if ($user) {
            $this->data['user'] = $user;
        }

        $posts = $this->input->post();

        if ($posts) {
             
            foreach ($posts as $key => $post) {
                $user->$key = $post;
            }
            $this->data['user'] = $user;

            if ($this->validate($user)) {
                unset($posts['repassword']);
                if (empty($user->id)) {
                    $user_id = $this->user->insert($posts);
                    redirect(admin_url('user'));
                    $this->session->set_flashdata('success', $this->lang['add_success']);
                } else {
                    if (strlen($posts['password']) == 0) {
                        unset($posts['password']);
                    }
                    $this->user->update($user->id, $posts);
                    redirect(admin_url('user'));
                    $this->session->set_flashdata('success', $this->lang['edit_success']);
                }
            }
        }
        $this->html_form($user);
        $this->load_view('user/form', 'admincp');
    }

    public function lists($start = 0) {
        $posts = $this->input->post();

        $dataWhere = array();
        if ($posts['status'] != 'all')
            $dataWhere['status'] = $posts['status'];
        if (!empty($posts['search']))
            $dataWhere['search'] = $posts['search'];
        $limit = $this->configs['record_per_page'];
        if (!empty($posts['asc'])) {
            $sort[$posts['sort']] = 'ASC';
        } else {
            $sort[$posts['sort']] = 'DESC';
        }
//       Begin pagination
        $this->load->library("pagination");
        $config = array();
        $config["total_rows"] = $this->user->totalUsers($dataWhere);
        $config["base_url"] = admin_url('user/list');
        $config["per_page"] = $limit;
        $page = $start;
        $config["uri_segment"] = 3;
        $config['num_links'] = 2;

        $config['first_link'] = $this->lang['first_link'];
        $config['first_tag_open'] = '<div class="nav-button">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = $this->lang['last_link'];
        $config['last_tag_open'] = '<div class="nav-button">';
        $config['last_tag_close'] = '</div>';
        $config['cur_tag_open'] = "<div class='nav-button'><div class='nav-page nav-page-selected'>";
        $config['cur_tag_close'] = '</div></div>';
        $config['num_tag_open'] = "<div class='nav-button'><div class='nav-page'>";
        $config['num_tag_close'] = '</div></div>';
        $config['prev_tag_open'] = "<div class='nav-button'>";
        $config['prev_link'] = $this->lang['prev_link'];
        $config['prev_tag_close'] = '</div>';
        $config['next_link'] = $this->lang['next_link'];
        $config['next_tag_open'] = "<div class='nav-button'>";
        $config['next_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $json["links"] = $this->pagination->create_links();
//       End pagination

        $this->data['users'] = $this->user->getUsers($dataWhere, $limit, $start, $sort);
        $json['users'] = $this->load->view('admincp/user/list', $this->data, true);
        echo json_encode($json);
    }

    private function validate($user) {
        $posts = $this->input->post();

        $flag = true;
        
        if (!$this->hasPermission('modify')) {
            $this->data['error'][] = $this->lang['error_permission_modify'];
            $flag = false;
        }

        if (strlen($posts['username']) <= 3 || strlen($posts['username']) > 255) {
            $this->data['error'][] = $this->lang['error_username'];
            $flag = false;
        }

        $dataUserCheck = array(
            'username' => $posts['username']
        );
        if (!empty($user->id)) {
            $dataUserCheck['username !='] = $user->username;
        }
        $checkUser = $this->user->totalUsers($dataUserCheck);
        if ($checkUser > 0) {
            $this->data['error'][] = $this->lang['error_exists_username'];
            $flag = false;
        }


        if (!valid_email($posts['email'])) {
            $this->data['error'][] = $this->lang['error_email'];
            $flag = false;
        }

        $dataEmailCheck = array(
            'email' => $posts['email']
        );
        if (!empty($user->id)) {
            $dataEmailCheck['email !='] = $user->email;
        }
        

        $checkEmail = $this->user->totalUsers($dataEmailCheck);

        if (empty($user->id) || (!empty($user->id) && strlen($posts['password']) > 0)) {
            if (strlen($posts['password']) <= 6 || strlen($posts['password']) > 255) {
                $this->data['error'][] = $this->lang['error_pass_length'];
                $flag = false;
            }
            if ($posts['password'] != $posts['repassword']) {
                $this->data['error'][] = $this->lang['error_repass'];
                $flag = false;
            }
        }

        if ($checkEmail > 0) {
            $this->data['error'][] = $this->lang['error_exists_email'];
            $flag = false;
        }
        return $flag;
    }

    public function active($id = 0) {
        $this->user->update($id, array('status' => 1));
    }

    public function deactive($id = 0) {
        $this->user->update($id, array('status' => 0));
    }

    private function html_form($user) {
        $roles = $this->role->getRoles();
        $roleList = array();
        foreach ($roles as $role) {
            $roleList[$role->id] = $role->name;
        }
        $this->data['form'] = array(
            array(
                'type' => 'input',
                'label' => $this->lang['entry_username'],
                'value' => array(
                    'name' => 'username',
                    'id' => 'username',
                    'class' => 'st-forminput',
                    'value' => !empty($user->username) ? $user->username : ''
                )
            ),
            array(
                'type' => 'password',
                'label' => $this->lang['entry_password'],
                'value' => array(
                    'name' => 'password',
                    'id' => 'password',
                    'class' => 'st-forminput',
                    'value' => ''
                )
            ),
            array(
                'type' => 'password',
                'label' => $this->lang['entry_repassword'],
                'value' => array(
                    'name' => 'repassword',
                    'id' => 'repassword',
                    'class' => 'st-forminput',
                    'value' => ''
                )
            ),
            array(
                'type' => 'input',
                'label' => $this->lang['entry_firstname'],
                'value' => array(
                    'name' => 'firstname',
                    'id' => 'firstname',
                    'class' => 'st-forminput',
                    'value' => !empty($user->firstname) ? $user->firstname : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => $this->lang['entry_lastname'],
                'value' => array(
                    'name' => 'lastname',
                    'id' => 'lastname',
                    'class' => 'st-forminput',
                    'value' => !empty($user->lastname) ? $user->lastname : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => $this->lang['entry_mobile'],
                'value' => array(
                    'name' => 'mobile',
                    'id' => 'mobile',
                    'class' => 'st-forminput',
                    'value' => !empty($user->mobile) ? $user->mobile : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => $this->lang['entry_phone'],
                'value' => array(
                    'name' => 'phone',
                    'id' => 'phone',
                    'class' => 'st-forminput',
                    'value' => !empty($user->phone) ? $user->phone : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => $this->lang['entry_email'],
                'value' => array(
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'st-forminput',
                    'value' => !empty($user->email) ? $user->email : ''
                )
            ),
            array(
                'type' => 'dropdown',
                'label' => $this->lang['entry_role'],
                'value' => array(
                    array(
                        'name' => 'role',
                        'options' => $roleList,
                        'selected' => !empty($user->role) ? $user->role : '',
                        'extra' => 'class="uniform"'
                    ),
                )
            ),
            array(
                'type' => 'dropdown',
                'label' => $this->lang['entry_status'],
                'value' => array(
                    array(
                        'name' => 'status',
                        'options' => array( '1' => 'active', '0' => 'de-active'),
                        'selected' => !empty($user->status) ? $user->status : '',
                        'extra' => 'class="uniform"'
                    ),
                )
            )
        );

        $this->data['input_submit'] = array(
            'value' => $this->lang['btn_save'],
            'class' => 'button-blue'
        );
    }

}