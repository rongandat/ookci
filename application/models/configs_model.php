<?php

/*
  This model provides all interfaces for user management
 */

class Configs_model extends CI_Model {


    public function getConfig($code) {
        $this->db->select("*");
        $this->db->from("configuration");
        $this->db->where('configuration_key', $code);

        $query = $this->db->get();
        $result = $query->result();
        return (array) $result[0];
    }

    public function getConfigs() {
        $this->db->select("*");
        $this->db->from("configuration");

        $query = $this->db->get();
        $results = $query->result();
        $data = array();
        if ($results)
            foreach ($results as $result) {
                $data[$result->configuration_key] = $result->configuration_value;
            }

        return $data;
    }

    public function editConfigs($data) {
        $this->db->empty_table('configuration');
        foreach ($data as $key => $value) {
            $dataConfig['key'] = $key;
            if (!is_array($value)) {
                $dataConfig['value'] = $value;
            } else {
                $dataConfig['value'] = serialize($value);
                $dataConfig['serialized'] = 1;
            }

            $this->db->insert('config', $dataConfig);
        }
    }

}