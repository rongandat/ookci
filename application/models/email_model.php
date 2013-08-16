<?php

/*
  This model provides all interfaces for user management
 */

class Email_model extends CI_Model {

//    public function sendmail($key, $user_to, $email_to, $data, $user_from = null) {
//
//        $this->load->model('configs_model');
//        $site_name = $this->configs_model->getConfig('SITE_NAME');
//        $site_contact_email = $this->configs_model->getConfig('SITE_CONTACT_EMAIL');
//
//        $this->db->select("*");
//        $this->db->from("emailtemplates");
//
//        $this->db->join('emailtemplates_description', 'emailtemplates.emailtemplates_id = emailtemplates_description.emailtemplates_id');
//        $this->db->where('emailtemplates.emailtemplate_key', $key);
//        $this->db->where('emailtemplates_description.language_id', $this->session->userdata('languages_id'));
//
//
//        $query = $this->db->get();
//        $result = $query->result_array();
//        $email_info = $result[0];
//        var_dump($email_info);
//        $msg_subject = $email_info['emailtemplate_subject'];
//        $msg_content = $email_info['emailtemplate_content'];
//        foreach ($data as $key => $code) {
//            $msg_subject = str_replace('[' . $key . ']', $code, $msg_subject);
//            $msg_content = str_replace('[' . $key . ']', $code, $msg_content);
//        }
//
//        $msg_content = html_entity_decode($msg_content);
//        tep_mail($user_to, $email_to, $msg_subject, $msg_content, $site_name, $site_contact_email);
//    }

    public function sendmail($key, $user_to, $email_to, $data, $user_from = null) {
        $this->load->model('configs_model');
        $site_name = $this->configs_model->getConfig('SITE_NAME');
        $site_contact_email = $this->configs_model->getConfig('SITE_CONTACT_EMAIL');

        $this->db->select("*");
        $this->db->from("emailtemplates");

        $this->db->join('emailtemplates_description', 'emailtemplates.emailtemplates_id = emailtemplates_description.emailtemplates_id');
        $this->db->where('emailtemplates.emailtemplate_key', $key);
        $this->db->where('emailtemplates_description.language_id', $this->session->userdata('languages_id'));


        $query = $this->db->get();
        $result = $query->result_array();
        $email_info = $result[0];

        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = $email_info['emailtemplate_content'];
        foreach ($data as $key => $code) {
            $msg_subject = str_replace('[' . $key . ']', $code, $msg_subject);
            $msg_content = str_replace('[' . $key . ']', $code, $msg_content);
        }

        $msg_content = html_entity_decode($msg_content);
        

        $mailtype = empty($email_info['is_html_email']) ? 'text' : 'html';
        $to = "mymail@yahoo.com";
        $subject = "My Sublect";
        $messagetext = "stop distubbing me and work!";
        $config = array(
            'protocol' => 'mail',
            'smtp_host' => '',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'starttls' => true,
            'newline' => '\r\n',
            'charset' => 'utf-8',
            'mailtype' => 'html',
        );
        $this->load->library("email", $config);
        $this->email->from($site_contact_email, $site_name);
        $this->email->to($email_to);
        $this->email->subject($msg_subject);
        $this->email->message($msg_content);
        if ($this->email->send()) {
            return true;
        } else {
            return FALSE;
        }
    }

}

?>
