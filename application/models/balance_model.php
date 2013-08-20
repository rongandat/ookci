<?php

/*
  This model provides all interfaces for user management
 */

class Balance_model extends CI_Model {

    public function getBalanceByUserId($id) {
        $this->db->select("*");
        $this->db->from("user_balance");
        $this->db->where("user_id", $id);

        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function getBalance($data) {
        $this->db->select("*");
        $this->db->from("user_balance");
        $this->db->where("user_id", $data['user_id']);
        $this->db->where("currency_code", $data['currency_code']);
        $query = $this->db->get();
        $results = $query->result_array();
        return !empty($results) ? $results[0] : array();
    }
    


    public function updateBalance($data, $balance, $status = '+') {
        $balance_current = $this->getBalance($data);
        if ($balance_current) {
            if ($status == '+') {
                $dataBalance['balance'] = $balance_current['balance'] + $balance;
            } else {
                $dataBalance['balance'] = $balance_current['balance'] - $balance;
            }
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('currency_code', $data['currency_code']);
            $this->db->update('user_balance', $dataBalance);
        }else{
            if ($status == '+') {
                $dataBalance['balance'] = $balance;
            } else {
                $dataBalance['balance'] = -$balance;
            }
            $dataBalance['user_id'] = $data['user_id'];
            $dataBalance['currency_code'] = $data['currency_code'];
            $this->db->insert('user_balance', $dataBalance);
        }
    }

    

}