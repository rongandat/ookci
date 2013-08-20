<?php

/*
  This model provides all interfaces for user management
 */

class Wallet_model extends CI_Model {

    public function getBalanceByUserId($id) {
        $this->db->select("*");
        $this->db->from("user_wallet");
        $this->db->where("user_id", $id);

        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function getWallet($data) {
        $this->db->select("*");
        $this->db->from("user_wallet");
        $this->db->where("user_id", $data['user_id']);
        $this->db->where("currency_code", $data['currency_code']);
        $query = $this->db->get();
        $results = $query->result_array();
        return !empty($results) ? $results[0] : array();
    }

    public function updateWallet($data, $balance, $status = '+') {
        $balance_current = $this->getWallet($data);
        if ($balance_current) {
            if ($status == '+') {
                $dataBalance['balance'] = $balance_current['balance'] + $balance;
            } else {
                $dataBalance['balance'] = $balance_current['balance'] - $balance;
            }
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('currency_code', $data['currency_code']);
            $this->db->update('user_wallet', $dataBalance);
        } else {
            if ($status == '+') {
                $dataBalance['balance'] = $balance;
            } else {
                $dataBalance['balance'] = -$balance;
            }
            $dataBalance['user_id'] = $data['user_id'];
            $dataBalance['currency_code'] = $data['currency_code'];
            $this->db->insert('user_wallet', $dataBalance);
        }
    }

}