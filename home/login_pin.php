<?php

if (!tep_session_is_registered('login_account_number') && tep_not_null($login_account_number))
    tep_redirect(get_href_link(PAGE_LOGIN));
if (tep_session_is_registered('login_main_account_info'))
    tep_session_unregister('login_main_account_info');

if ($_POST['action'] == 'process') {
    $login_pin = db_prepare_input($_POST['login_pin']);
    // check login_pin
    $sql_check = "SELECT account_name, firstname, lastname FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "' and account_number='" . $login_account_number . "' and login_pin='" . $login_pin . "'";
    $check_login_query = db_query($sql_check);
    if (db_num_rows($check_login_query) > 0) {
        $login_main_account_info = db_fetch_array($check_login_query);
        $login_main_account_info['activity_clock_log'] = array('mins' => 15,
            'sec' => 59
        );
        tep_session_register('login_main_account_info');

        tep_redirect(get_href_link(PAGE_ACCOUNT));
    } else { // invalid login pin
        $validator->addError('Login PIN', 'Invalid Login Pin.');
    }
}

$smarty->assign('validerrors', $validator->errors);
$_html_main_content = $smarty->fetch('home/login_pin.html');
?>