<?php

$account_sent = false;
if ($_POST['action'] == 'process') {

    $security_code = db_prepare_input($_POST['security_code']);
    if ($security_code == $secure_image_hash_string) {
        $email = db_prepare_input($_POST['email']);

        if ($validator->validateEmail('Email', $email, ERROR_EMAIL_ADDRESS)) {
            $sql_check_email = "SELECT user_id, firstname,  account_number	FROM " . _TABLE_USERS . " WHERE email='" . $email . "'";
            $check_email_query = db_query($sql_check_email);
            if (db_num_rows($check_email_query) == 0) { // email existed
                $validator->addError('Email', "Invalid e-mail. Email doesn't exist. ");
            }
        }
    } else {
        $validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
    }

    if (count($validator->errors) == 0) {   // found email => send account number to the email
        $account_info = db_fetch_array($check_email_query);
        $email_info = get_email_template('ACCOUNT_REMINDER');
        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = str_replace(array('[firstname]', '[account_number]'), array($account_info['firstname'], $account_info['account_number']), $email_info['emailtemplate_content']);

        tep_mail($account_info['firstname'], $email, $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);
        $account_sent = true;
    } else {
        postAssign($smarty);
    }
}

if (!$account_sent) {
    $smarty->assign('validerrors', $validator->errors);
    $_html_main_content = $smarty->fetch('home/account_remind.html');
} else {
    $smarty->assign('email', $email);
    $_html_main_content = $smarty->fetch('home/account_remind_sent.html');
}
?>