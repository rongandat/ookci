<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['menu_config'] = $this->menu_config_1;
    }
    
    public function transaction_detail($id = 0){
        $this->load->model('transaction_model', 'transaction');
        $this->data['transaction_data'] = $this->transaction->getTransactionById($id);
        echo $this->view_ajax('ajax/transaction');
    }
}