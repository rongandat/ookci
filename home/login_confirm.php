<?php

if (!tep_session_is_registered('login_account_number') && tep_not_null($login_account_number))
    tep_redirect(get_href_link(PAGE_LOGIN));
// get persional Welcome Message


$account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE account_number='" . $login_account_number . "'"));
$smarty->assign('account_info', $account_info);


$welcome_message = $account_info['welcome_message']; //db_fetch_array(db_query("SELECT welcome_message FROM " . _TABLE_USERS . " WHERE account_number='" . $login_account_number . "'"));
$smarty->assign('personal_welcome_message', $welcome_message['welcome_message']);

$current_ip = get_client_ip();
$mss_flag = true;
if (($account_info['verification_status'] == 1) && ($current_ip != $account_info['verification_ip'])) {
    $mss_flag = true;
}

$smarty->assign('mss_flag', $mss_flag);



//if($mss_flag){
//    
//}



if ($_POST['action'] == 'process') {
    if ($mss_flag && ($account_info['verification_key'] != $_POST['verification_key'])) {
        $validator->addError('Verification code', 'Invalid verification code. Please try again.');
    }
    if (count($validator->errors) == 0)
        if ($_POST['confirm_message'] == 1) { //make sure correct personal welcome message 
            tep_redirect(get_href_link(PAGE_LOGIN_BALANCE));
        }
}

$smarty->assign('validerrors', $validator->errors);
$_html_main_content = $smarty->fetch('home/login_confirm.html');
?>