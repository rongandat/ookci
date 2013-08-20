<?php

/*
  This model provides all interfaces for user management
 */

class Question_model extends CI_Model {

    public function getQuestion($data) {
        $this->db->select("*");
        $this->db->from("security_questions");
        $this->db->join("security_questions_description", "security_questions.security_questions_id = security_questions_description.security_questions_id");
        $this->db->where("security_questions_description.language_id", $this->session->userdata('languages_id'));
        foreach ($data as $key => $value) {
            $this->db->where($key, $value);
        }


        $query = $this->db->get();
        $results = $query->result_array();

        return $results ? $results[0] : array();
    }

    public function getQuestionById($id) {
        $this->db->select("*");
        $this->db->from("security_questions");
        $this->db->join("security_questions_description", "security_questions.security_questions_id = security_questions_description.security_questions_id");
        $this->db->where("security_questions_description.language_id", $this->session->userdata('languages_id'));
        $this->db->where("security_questions.security_questions_id", $id);

        $query = $this->db->get();
        $results = $query->result_array();

        return $results ? $results[0] : array();
    }

    public function getQuestions($data = array(), $limit = null, $start = null, $sort = array()) {
        $this->db->select("*");
        $this->db->from('security_questions');
        $this->db->join("security_questions_description", "security_questions.security_questions_id = security_questions_description.security_questions_id");
        $this->db->where("security_questions_description.language_id", $this->session->userdata('languages_id'));
        if (!empty($data)) {
            foreach ($data as $key => $value) {
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

    public function totalQuestions($data = array()) {
        $this->db->select("*");
        $this->db->from('security_questions');
        $this->db->join("security_questions_description", "security_questions.security_questions_id = security_questions_description.security_questions_id");
        $this->db->where("security_questions_description.language_id", $this->session->userdata('languages_id'));

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function insert($data) {
        $this->db->insert('security_questions', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('security_questions', $data);
    }

}