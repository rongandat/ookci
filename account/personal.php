<?php

userLoginCheck();

$action = $_POST['action'];
$master_key_pass = false;

if ($action == 'process') {
    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) {
        $master_key_pass = true;
        // get account's information
        $account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
        postAssign($smarty, $account_info);
        $country = $account_info['country'];
    }
} elseif ($action == 'update_account') {
    $master_key_pass = true;
    $account_name = db_prepare_input($_POST['account_name']);
    $company = db_prepare_input($_POST['company']);
    $address = db_prepare_input($_POST['address']);
    $city = db_prepare_input($_POST['city']);
    $country = (int) $_POST['country'];
    $state = db_prepare_input($_POST['state']);
    $postcode = db_prepare_input($_POST['postcode']);
    $phone = db_prepare_input($_POST['phone']);
    $mobile = db_prepare_input($_POST['mobile']);
    $firstname = db_prepare_input($_POST['firstname']);
    $lastname = db_prepare_input($_POST['lastname']);
    $additional_information = db_prepare_input($_POST['additional_information']);
    $welcome_message = db_prepare_input($_POST['welcome_message']);


    $validator->validateGeneral('Account Name', $account_name, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Company Name', $account_name, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Address', $address, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Personal welcome message', $welcome_message, _ERROR_FIELD_EMPTY);
    if ($country == 0) {
        $validator->addError('Country', 'Please select country.');
    }
    $validator->validateGeneral('City', $city, _ERROR_FIELD_EMPTY);

    if ($state == 0) {
        $validator->addError('State', 'Please select state.');
    }

    if (strlen($phone) < 7)
        $validator->addError('Phone', 'Please input correct phone number.');
    if (strlen($postcode) < 4)
        $validator->addError('Zip/Post Code', 'Please input correct Zip/Post Code.');

    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) { // update user personal info	
        // create user data
        $signup_data_array = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'account_name' => $account_name,
            'company' => $company,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'phone' => $phone,
            'mobile' => $mobile,
            'postcode' => $postcode,
            'additional_information' => $additional_information,
            'welcome_message' => $welcome_message
        );
        
        $login_main_account_info['account_name'] = $account_name;
        $login_main_account_info['firstname'] = $firstname;
        $login_main_account_info['lastname'] = $lastname;
        
        db_perform(_TABLE_USERS, $signup_data_array, 'update', " user_id='" . $login_userid . "' ");
        $smarty->assign('success', true);
        $smarty->assign('step', 'updated');
        postAssign($smarty);
    } else {
        postAssign($smarty);
    }
}

$smarty->assign('validerrors', $validator->errors);

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

    $_html_main_content = $smarty->fetch('account/edit_account.html');
} else {
    $_html_main_content = $smarty->fetch('account/personal.html');
}
?>