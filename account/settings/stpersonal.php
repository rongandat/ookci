<?php

// get security questions
$security_questions_array = array();
$security_questions_query = db_query('SELECT s.security_questions_id, sd.question FROM ' . _TABLE_SECURITY_QUESTIONS . " s, " . _TABLE_SECURITY_QUESTIONS_DESCRIPTION . " sd WHERE s.security_questions_id =sd.security_questions_id AND sd.language_id='" . $languages_id . "' ORDER BY s.sort_order, sd.question ");
while ($security_question = db_fetch_array($security_questions_query)) {
    $security_questions_array[$security_question['question']] = $security_question['question'];
}
// Customer Question 
$security_questions_array[-1] = TEXT_CUSTOM_QUESTION;

$smarty->assign('security_questions_array', $security_questions_array);

$security_question = null;
$security_answer = null;
if ($action == 'update_account') {
    $master_key_pass = true;

    $security_question = $_POST['security_question'];
    $security_answer = db_prepare_input($_POST['security_answer']);
    $custom_question = db_prepare_input($_POST['custom_question']);


    if ($security_question == -1) {
        $validator->validateGeneral('Custom Question', $custom_question, _ERROR_FIELD_EMPTY);
    }
    $validator->validateGeneral('Security Answer', $security_answer, _ERROR_FIELD_EMPTY);
    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) { // update user personal info	
        // create user data
        $signup_data_array = array(
            'security_question' => ($security_question == -1) ? $custom_question : $security_question,
            'security_answer' => $security_answer
        );
        db_perform(_TABLE_USERS, $signup_data_array, 'update', " user_id='" . $login_userid . "' ");
        $smarty->assign('step', 'updated');
        postAssign($smarty);
    } else {
        postAssign($smarty);
    }
}

if ($action == 'view_info') {
    $master_key_pass = true;
    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }
    if (count($validator->errors) == 0) {
        $account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
        $smarty->assign('view_security_question', $account_info['security_question']);
        $smarty->assign('view_security_answer', $account_info['security_answer']);
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
    $smarty->assign('html_content', $smarty->fetch('account/settings/stpersonal.html'));
} else {
    $smarty->assign('html_content', $smarty->fetch('account/settings/master_key.html'));
}
$smarty->assign('post_security_question', $security_question);
$smarty->assign('post_security_answer', $security_answer);
?>
