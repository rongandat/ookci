<?php

/*
  This model provides all interfaces for user management
 */

class User_model extends CI_Model {

    public function checkLogin($account_number, $password) {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("account_number", $account_number);
        
        $query = $this->db->get();
        $results = $query->result_array();
        if(!$results)
            return FALSE;
        
        $user = $results[0];
        
        if($this->validate_password($password, $user['password']))
            return $user;
        return FALSE;
    }
    
    public function getUser($data){
        $this->db->select("*");
        $this->db->from("users");
        foreach ($data as $key => $value){
            $this->db->where($key, $value);
        }
        

        $query = $this->db->get();
        $results = $query->result_array();

        return $results ? $results[0] : array();
    }

    public function getUserById($id) {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("user_id", $id);

        $query = $this->db->get();
        $results = $query->result_array();

        return $results ? $results[0] : array();
    }
    

    public function getUsers($data = array(), $limit = null, $start = null, $sort = array()) {
        $this->db->select("*");
        $this->db->from('users');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( account_name LIKE '%" . $value . "%' OR lastname LIKE '%" . $value . "%' OR email LIKE '%" . $value . "%' OR account_number LIKE '%" . $value . "%' )";
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

    public function totalUsers($data = array()) {
        $this->db->select("*");
        $this->db->from('users');

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( account_name LIKE '%" . $value . "%' OR lastname LIKE '%" . $value . "%' OR email LIKE '%" . $value . "%' OR account_number LIKE '%" . $value . "%' )";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function insert($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }

    // This funstion validates a plain text password with an
    // encrpyted password
    function validate_password($plain, $encrypted) {
        if (!empty($plain) && !empty($encrypted)) {
// split apart the hash / salt
            $stack = explode(':', $encrypted);

            if (sizeof($stack) != 2)
                return false;

            if (md5($stack[1] . $plain) == $stack[0]) {
                return true;
            }
        }

        return false;
    }    

}