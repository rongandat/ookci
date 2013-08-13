<?php

/*
  This model provides all interfaces for user management
 */

class Transaction_model extends CI_Model {

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
                    $this->db->where($key, $value);
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

}