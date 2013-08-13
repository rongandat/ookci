<?php

/*
  This model provides all interfaces for user management
 */

class Email_model extends CI_Model {

    public function sendmail($key, $user_to, $email_to, $data, $user_from = null) {
        
        $this->load->model('configs_model');
        $site_name = $this->configs_model->getConfig('SITE_NAME');
        $site_contact_email = $this->configs_model->getConfig('SITE_CONTACT_EMAIL');
        
        $this->db->select("*");
        $this->db->from("emailtemplates");
        $this->db->where('emailtemplate_key', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        $email_info = $result[0];

        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = $email_info['emailtemplate_content'];
        foreach ($data as $key => $code) {
            $msg_subject = str_replace('[' . $key . ']', $code, $$msg_subject);
        }
        $msg_content = html_entity_decode($msg_content);
        tep_mail($user_to, $email_to, $msg_subject, $msg_content, $site_name, $site_contact_email);
    }

}

?>
