<?php

// get security questions
$security_questions_array = array();
$security_questions_query = db_query('SELECT s.security_questions_id, sd.question FROM ' . _TABLE_SECURITY_QUESTIONS . " s, " . _TABLE_SECURITY_QUESTIONS_DESCRIPTION . " sd WHERE s.security_questions_id =sd.security_questions_id AND sd.language_id='" . $languages_id . "' ORDER BY s.sort_order, sd.question ");
while ($security_question = db_fetch_array($security_questions_query)) {
    $security_questions_array[$security_question['question']] = $security_question['question'];
}
// Customer Question 
$security_questions_array[-1] = TEXT_CUSTOM_QUESTION;

$account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
$smarty->assign('account_info', $account_info);



$api_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_API_CONFIGS . " WHERE user_id='" . $login_userid . "'"));
$smarty->assign('api_info', $account_info);

$smarty->assign('security_questions_array', $security_questions_array);

if ($action == 'update_account') {
    $master_key_pass = true;

    $curent_password = $_POST['curent_password'];
    $new_password = db_prepare_input($_POST['new_password']);
    $re_password = db_prepare_input($_POST['re_password']);


    if ($validator->validateGeneral('Password', $curent_password, _ERROR_FIELD_EMPTY)) {
        if (!validate_password($curent_password, $account_info['password'])) { // wrong password
            $validator->addError('Password', ERROR_INVALID_PASSWORD);
        }
    }


    if ($validator->validateGeneral('New password', $new_password, _ERROR_FIELD_EMPTY)) {
        $validator->validateMinLength('New password', $new_password, 7, 'New password greater than 6 character');
    }

    if ($validator->validateGeneral('Confirm New Passwor', $re_password, _ERROR_FIELD_EMPTY)) {
        if ($new_password != $re_password) {
            $validator->addError('Confirm New Passwor', ERROR_INVALID_RE_PASSWORD);
        }
    }

    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) { // update user personal info	
        // create user data
        $signup_data_array = array(
            'password' => encrypt_password($new_password),
        );

        db_perform(_TABLE_USERS, $signup_data_array, 'update', " user_id='" . $login_userid . "' ");

        $smarty->assign('step', 'updated');
        postAssign($smarty);
    } else {
        postAssign($smarty);
    }
}


if ($master_key_pass) { // master key checked
//BOF: get countries list
    $sql_countries = "SELECT countries_id, countries_name FROM " . _TABLE_COUNTRIES . " ORDER BY countries_name";
    $countries_query = db_query($sql_countries);
    $countries_array = array();
    $countries_array[''] = '-- Select Country --';
    while ($country_info = db_fetch_array($countries_query)) {
        $countries_array[$country_info['countries_id']] = $country_info['countries_name'];
    }
    $smarty->assign('countries_array', $countries_array);
    //EOF: get countries list
    //BOF: get zones list
    $sql_zones = "SELECT zone_id, zone_name  FROM " . _TABLE_ZONES . " WHERE zone_country_id='" . $country . "'";

    $zones_query = db_query($sql_zones);
    $zones_array = array();
    $zones_array[''] = '-- Select State/Region --';
    while ($zone = db_fetch_array($zones_query)) {
        $zones_array[$zone['zone_id']] = $zone['zone_name'];
    }
    $smarty->assign('zones_array', $zones_array);
    //EOF: get zones list
    $smarty->assign('html_content', $smarty->fetch('account/settings/stchange_password.html'));
} else {
    $smarty->assign('html_content', $smarty->fetch('account/settings/master_key.html'));
}
$smarty->assign('post_security_question', $security_question);
$smarty->assign('post_security_answer', $security_answer);
?>
