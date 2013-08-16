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

}