<?php

/*
  This model provides all interfaces for user management
 */

class Countries_model extends CI_Model {
    
    public function getCountries(){
        $this->db->select("*");
        $this->db->from('countries');
        $query = $this->db->get();
        return $query->result_array();
    }
}