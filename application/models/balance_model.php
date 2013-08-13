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

}