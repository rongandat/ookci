<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    @$pfw_ip = $_SERVER['REMOTE_ADDR'];
    @$Name = addslashes($_POST['Name']);
    @$email = addslashes($_POST['email']);
    @$ctl00cp1dlCateg = addslashes($_POST['ctl00$cp1$dlCateg']);
    @$Account = addslashes($_POST['Account']);
    @$Subject = addslashes($_POST['Subject']);
    @$Comment = addslashes($_POST['Comment']);

    $validator->validateGeneral('Your Name', $Name, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('E-mail Address', $email, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Select Department', $ctl00cp1dlCateg, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Subject', $Subject, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral(' Question/Comment', $Comment, _ERROR_FIELD_EMPTY);
    if (count($validator->errors) == 0) {
        //Sending Email to form owner
        $pfw_header = "From: $email\n"
                . "Reply-To: $email\n";
        $pfw_subject = "Contact Form";
//    $pfw_email_to = SITE_CONTACT_EMAIL;
        $pfw_email_to = "rongandat@gmail.com";
        $pfw_message = "Visitor's IP: $pfw_ip\n"
                . "Name: $Name\n"
                . "email: $email\n"
                . "ctl00cp1dlCateg: $ctl00cp1dlCateg\n"
                . "Account: $Account\n"
                . "Subject: $Subject\n"
                . "Comment: $Comment\n";
        if (mail($pfw_email_to, $pfw_subject, $pfw_message, $pfw_header)) {
            $smarty->assign('success', true);
        } else {
            $validator->addError('Email', "Sent mail error");
            $smarty->assign('validerrors', $validator->errors);
            postAssign($smarty);
        }
    } else {
        $smarty->assign('validerrors', $validator->errors);
        postAssign($smarty);
    }
}

$_html_main_content = $smarty->fetch('home/contact.html');
?>