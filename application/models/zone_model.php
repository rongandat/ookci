<?php

/*
  This model provides all interfaces for user management
 */

class Zone_model extends CI_Model {

    public function getZones($country_id) {
        $this->db->select("*");
        $this->db->from('zones');
        $this->db->where('zone_country_id', $country_id);
        $query = $this->db->get();
        return $query->result_array();
    }

}