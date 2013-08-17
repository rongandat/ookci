<?php

/*
  This model provides all interfaces for user management
 */

class Transaction_model extends CI_Model {

    public function getTransactionById($id) {
        $this->db->select("*");
        $this->db->from('transactions');
        $this->db->where('transaction_id', $id);
        $result = $this->db->get()->result_array();
        return !empty($result) ? $result[0] : array();
    }

    public function getTransactions($data = array(), $limit = null, $start = null, $sort = array()) {
        $this->db->select("*");
        $this->db->from('transactions');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( batch_number LIKE '%" . $value . "%')";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value, FALSE);
            }
        }
        if ($limit)
            $this->db->limit($limit, $start);

        if (!empty($sort)) {
            foreach ($sort as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    public function totalTransactions($data = array()) {
        $this->db->select("*");
        $this->db->from('transactions');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( batch_number LIKE '%" . $value . "%')";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->num_rows();
    }
    
    public function insert($data){
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }
    
    public function insertHistory($data){
        $this->db->insert('transactions_history', $data);
        return $this->db->insert_id();
    }
    
    public function sci_validate($data){
        $this->db->select("*");
        $this->db->from('transactions');
        $this->db->where('MD5(CONCAT(to_account,from_account,amount,transaction_currency,batch_number,transaction_status))',"'{$data}'",FALSE);
        
        $result = $this->db->get()->num_rows();
        if($result > 0)
            return TRUE;
        return FALSE;
        
    }

}