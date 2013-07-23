<?php

$resetcode_sent = false;

$email = db_prepare_input($_POST['email']); //Edit By DongHP

if ($_POST['action'] == 'process') {

    $security_code = db_prepare_input($_POST['security_code']);

    if ($security_code == $secure_image_hash_string) {


        $account_number = db_prepare_input($_POST['account_number']); //edit by donghp			

        if ($validator->validateEmail('E-mail', $email, ERROR_EMAIL_ADDRESS)) {
            $sql_check_info = "SELECT user_id, firstname, lastname,security_question,security_answer FROM " . _TABLE_USERS . " WHERE (email='" . $email . "') and (account_number='" . $account_number . "')";
            $check_info_query = db_query($sql_check_info);
            if (db_num_rows($check_info_query) == 0) { // email existed
                $validator->addError('Account Number/E-mail', "Invalid account number/e-mail.");
            }
        }
    } else {
        $validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
    }

    if (count($validator->errors) == 0) {   // found email => send account number to the email
        $account_info = db_fetch_array(db_query($sql_check_info));
        $session_account_number = $account_number;
        $session_email = $email;
        tep_session_register('session_account_number');
        tep_session_register('session_email');

        $email_info = get_email_template('RESET_PASSWORD_CODE');

        $security_question = $account_info['account_info'];
        //$firstname	=	$user_info['firstname'];

        $msg_subject = $email_info['emailtemplate_subject'];
        $reset_code = tep_create_random_value(10, 'digits');

        //-----------------add by donghp 27/03/2012----------------------
        $user_id = $account_info['user_id'];

        $q = db_query("UPDATE  users SET  reset_code =  '" . $reset_code . "' WHERE user_id = $user_id");

        //----------------------------------------------------------------
        $msg_content = str_replace(array('[firstname]', '[reset_code]'), array($account_info['firstname'], $reset_code), $email_info['emailtemplate_content']);

        $msg_content = html_entity_decode($msg_content); //add by donghp 26/03/2012

        tep_mail($account_info['firstname'] . ' ' . $account_info['lastname'], $email, $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);
        $resetcode_sent = true;
    } else {
        postAssign($smarty);
    }

    if ($resetcode_sent) {
        $sql = "SELECT user_id, firstname, lastname,security_question,account_number FROM " . _TABLE_USERS . " WHERE (email='" . $email . "') and (account_number='" . $account_number . "')";
        $account = db_fetch_array(db_query($sql));
        //--------Add by donghp 27/03/2012- ----------------------------------
        $smarty->assign('email', $email);
        $smarty->assign('account_number', $account['account_number']);
        $smarty->assign('security_question', $account['security_question']);
        //--------------------------------------------------------------------
        $_html_main_content = $smarty->fetch('home/reset_password_sent.html');
    }
} else
if ($_POST['action'] == 'process2') { //step 2/3
    $resetcode_sent = true;

    $reset_code = db_prepare_input($_POST['reset_code']);
    $security_question = db_prepare_input($_POST['security_question']);

    $sql_check_info = "SELECT reset_code FROM " . _TABLE_USERS . " WHERE (reset_code='" . $reset_code . "') and (security_answer='" . $security_question . "')";
    //The reset code doesn't match one sent to you. Please check your information and try again.
    $check_query = db_query($sql_check_info);

    if (db_num_rows($check_query) > 0) {
        //--------Add by donghp 27/03/2012- ----------------------------------
        $sql = "SELECT user_id, firstname, lastname,security_question,account_number FROM " . _TABLE_USERS . " WHERE (email='" . $email . "')";
        $account = db_fetch_array(db_query($sql));
        $smarty->assign('email', $email);
        $smarty->assign('account_number', $account['account_number']);
        
        /* $smarty->assign('security_question',$account['security_question']); */
        //--------------------------------------------------------------------
        $_html_main_content = $smarty->fetch('home/reset_password03.html');
    } else {

        $message_err = "The reset code doesn't match one sent to you or the security question is incorrect. Please check your information and try again.";

        $sql = "SELECT user_id, firstname, lastname,security_question,account_number FROM " . _TABLE_USERS . " WHERE (email='" . $email . "')";

        $account = db_fetch_array(db_query($sql));
        $smarty->assign('email', $email);
        $smarty->assign('account_number', $account['account_number']);
        $smarty->assign('security_question', $account['security_question']);
        $smarty->assign('message_err', $message_err);
        //--------------------------------------------------------------------
        $_html_main_content = $smarty->fetch('home/reset_password_sent.html');
        // echo "Have not exits";
    }
} else
if ($_POST['action'] == 'process3') { //update new pasword
    $password = db_prepare_input($_POST['Password']);
    $password2 = db_prepare_input($_POST['Password2']);

    $resetcode_sent = true;
    
    if(empty($session_email) || empty($session_account_number)){
        tep_redirect(get_href_link(PAGE_RESET_PASSWORD,'','SSL'));
    }

    $sql = "SELECT user_id, firstname, lastname,security_question,account_number FROM " . _TABLE_USERS . " WHERE (email='" . $session_email . "') and (account_number='" . $session_account_number . "')";
    $account = db_fetch_array(db_query($sql));
    $user_id = $account['user_id'];

    $ok = false;

    if ($validator->validateEqual('Password', $password, $password2, _ERROR_PASSWORD)) {
        
    }

    if ($validator->validateMinLength('Password Length', $password, 6, _ERROR_PASSWORD_MIN_LENGTH)) {
        
    }


    if (count($validator->errors) == 0) {

        $ok = true;

        $q = db_query("UPDATE  users SET  password =  '" . encrypt_password($password) . "' WHERE user_id = $user_id");
        $_html_main_content = $smarty->fetch('home/reset_password_success.html');
    } else {
        //	postAssign($smarty);			

        $smarty->assign('validerrors', $validator->errors);
        //--------Add by donghp 27/03/2012- ----------------------------------
        $sql = "SELECT user_id, firstname, lastname,security_question,account_number FROM " . _TABLE_USERS . " WHERE (email='" . $email . "')";
        $account = db_fetch_array(db_query($sql));
        $smarty->assign('email', $email);
        $smarty->assign('account_number', $account['account_number']);
        // $smarty->assign('message_err',$message_err);
        $_html_main_content = $smarty->fetch('home/reset_password03.html');
    }
    $resetcode_sent = true;
}

if (!$resetcode_sent) {

    $smarty->assign('validerrors', $validator->errors);
    $_html_main_content = $smarty->fetch('home/reset_password.html');
}
?>