<?php

/*
  This model provides all interfaces for user management
 */

class Currencies_model extends CI_Model {

    public function getCurrencies() {
        $this->db->select("*");
        $this->db->from("currencies");

        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    function getCurrencyByCode($code) {
        $this->db->select("*");
        $this->db->from("currencies");
        $this->db->where("code", $code);

        $query = $this->db->get();
        $results = $query->result_array();
        return $results ? $results[0] : array();
    }

}