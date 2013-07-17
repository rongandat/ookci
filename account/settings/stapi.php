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

    $api_status = $_POST['api_status'];
    $api_name = db_prepare_input($_POST['api_name']);
    $api_key = db_prepare_input($_POST['api_key']);
    $api_hask = db_prepare_input($_POST['api_hask']);
    $smarty->assign('api_status', $api_status);
    $smarty->assign('api_name', $api_name);
    $smarty->assign('api_key', $api_key);
    $smarty->assign('api_hask', $api_hask);

    if ($validator->validateGeneral('Api name', $api_name, _ERROR_FIELD_EMPTY)) {
        $validator->validateMaxLength('Api name', $api_name, 32, 'Api name litter than 17 character');
    }

    if ($validator->validateGeneral('Api key', $api_key, _ERROR_FIELD_EMPTY)) {
        $validator->validateMaxLength('Api key', $api_key, 32, 'Api key litter than 33 character');
    }

    if ($validator->validateGeneral('Api hask', $api_hask, _ERROR_FIELD_EMPTY)) {
        $validator->validateMaxLength('Api hask', $api_hask, 4, 'Api key litter than 5 character');
    }


    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) { // update user personal info	
        // create user data
        $signup_data_array = array(
            'api_status' => $api_status,
            'api_name' => $api_name,
            'api_key' => $api_key,
            'api_hask' => $api_hask,
            'user_id' => $login_userid,
        );

        if (!empty($api_info))
            db_perform(_TABLE_API_CONFIGS, $signup_data_array, 'update', " user_id='" . $login_userid . "' ");
        else
            db_perform(_TABLE_API_CONFIGS, $signup_data_array);
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
        
        if (!empty($api_info)) {
            $smarty->assign('view_api_status', $api_info['api_status']);
            $smarty->assign('view_api_name', $api_info['api_name']);
            $smarty->assign('view_api_key', $api_info['api_key']);
            $smarty->assign('view_api_hask', $api_info['api_hask']);
            $smarty->assign('api_status', $api_info['api_status']);
            $smarty->assign('api_name', $api_info['api_name']);
            $smarty->assign('api_key', $api_info['api_key']);
            $smarty->assign('api_hask', $api_info['api_hask']);
        }else{
            $smarty->assign('view_api_status', 'empty');
            $smarty->assign('view_api_name', 'empty');
            $smarty->assign('view_api_key', 'empty');
            $smarty->assign('view_api_hask', 'empty');
        }
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
    $smarty->assign('html_content', $smarty->fetch('account/settings/stapi.html'));
} else {
    $smarty->assign('html_content', $smarty->fetch('account/settings/master_key.html'));
}
$smarty->assign('post_security_question', $security_question);
$smarty->assign('post_security_answer', $security_answer);
?>
