<?php

if (!tep_session_is_registered('signup_info'))
    tep_redirect(get_href_link(PAGE_SIGNUP,'','SSL'));
$signup_finished = false;

if ($_POST['action'] == 'process') {
    $account_name = db_prepare_input($_POST['account_name']);
    $company_name = db_prepare_input($_POST['company_name']);
    $address = db_prepare_input($_POST['address']);
    $city = db_prepare_input($_POST['city']);
    $country_id = (int) $_POST['country_id'];
    $state = 0;
    $postcode = db_prepare_input($_POST['postcode']);
    $phone = db_prepare_input($_POST['phone']);
    $mobile = db_prepare_input($_POST['mobile']);

    $validator->validateGeneral('Account Name', $account_name, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Company Name', $account_name, _ERROR_FIELD_EMPTY);
    $validator->validateGeneral('Address', $address, _ERROR_FIELD_EMPTY);
    if ($country_id == 0) {
        $validator->addError('Country', 'Please select country.');
    }
    $validator->validateGeneral('City', $city, _ERROR_FIELD_EMPTY);

//    if ($state == 0) {
//        $validator->addError('State', 'Please select state.');
//    }

    if (strlen($phone) < 7)
        $validator->addError('Phone', 'Please input correct phone number.');
    if (strlen($postcode) < 4)
        $validator->addError('Zip/Post Code', 'Please input correct Zip/Post Code.');

    $dobYear = db_prepare_input($_POST['dobYear']);
    $dobMonth = db_prepare_input($_POST['dobMonth']);
    $dobDay = db_prepare_input($_POST['dobDay']);


    if ($dobYear == 0 || $dobMonth == 0 || $dobDay == 0) {
        $validator->addError('Date of Birth', 'Please select your DOB.');
    }

    if (count($validator->errors) == 0) { // create new user					
        // generate account secure informations
        $password = tep_create_random_value(7);
        $login_pin = tep_create_random_value(5, 'digits');
        $master_key = tep_create_random_value(3, 'digits');
        $account_number = 'U' . generate_account_number();

        // create user data
        $signup_data_array = array('firstname' => $signup_info['firstname'],
            'lastname' => $signup_info['lastname'],
            'email' => $signup_info['email'],
            'security_question' => $signup_info['security_question'],
            'security_answer' => $signup_info['security_answer'],
            'welcome_message' => $signup_info['welcome_message'],
            'account_name' => $account_name,
            'company' => $company_name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country_id,
            'dob' => $dobYear . '-' . $dobMonth . '-' . $dobDay,
            'phone' => $phone,
            'mobile' => $mobile,
            'language' => 'en',
            'status' => 1, // inactive by default	,
            'account_number' => $account_number,
            'login_pin' => $login_pin,
            'master_key' => $master_key,
            'password' => encrypt_password($password),
            'account_type' => 'user', // user by default,
            'signup_date' => date('YmdHis')
        );
        db_perform(_TABLE_USERS, $signup_data_array);

        // send notification email to user
        $email_info = get_email_template('SIGNUP_EMAIL');

        $firstname = $signup_info['firstname'];
        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = str_replace(array('[firstname]', '[account_number]'), array($firstname, $account_number), $email_info['emailtemplate_content']);

        tep_mail($firstname, $signup_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);
        // end of email sending			
        $signup_finished = true;
    } else {
        postAssign($smarty);
    }
}

if (!$signup_finished) {
    //bof: DOB
    $this_year = date('Y');
    $months_array[0] = '--';
    for ($i = 1; $i < 13; $i++) {
        $months_array[$i] = $i;
    }
    // day of month array
    $days_array[0] = '--';
    for ($i = 1; $i < 32; $i++) {
        $days_array[$i] = $i;
    }

    $smarty->assign('days_array', $days_array);
    // search years	
    $smarty->assign('months_array', $months_array);

    $years_array = array();
    $years_array[0] = '----';
    for ($i = $this_year - 90; $i < $this_year - 14; $i++) {
        $years_array[$i] = $i;
    }
    //eof: DOB
    //BOF: get countries list
    $sql_countries = "SELECT countries_id, countries_name FROM " . _TABLE_COUNTRIES . " ORDER BY countries_name";
    $countries_query = db_query($sql_countries);
    $countries_array = array();
    $countries_array[''] = '-- Select Country --';
    while ($country = db_fetch_array($countries_query)) {
        $countries_array[$country['countries_id']] = $country['countries_name'];
    }
    $smarty->assign('countries_array', $countries_array);
    //EOF: get countries list
    //BOF: get zones list
    $sql_zones = "SELECT zone_id, zone_name  FROM " . _TABLE_ZONES . " WHERE zone_country_id='" . $country_id . "'";

    $zones_query = db_query($sql_zones);
    $zones_array = array();
    $zones_array[''] = '-- Select State/Region --';
    while ($zone = db_fetch_array($zones_query)) {
        $zones_array[$zone['zone_id']] = $zone['zone_name'];
    }
    $smarty->assign('zones_array', $zones_array);
    //EOF: get zones list

    $smarty->assign('years_array', $years_array);

    $smarty->assign('validerrors', $validator->errors);
    $_html_main_content = $smarty->fetch('home/signup_personal.html');
} else { // display account secure informations
    $secure_info = array('login_pin' => $login_pin,
        'password' => $password,
        'master_key' => $master_key,
        'security_question' => $signup_info['security_question'],
        'security_answer' => $signup_info['security_answer']
    );

    $smarty->assign('secure_info', $secure_info);
    $_html_main_content = $smarty->fetch('home/signup_finished.html');

    tep_session_unregister('signup_info');
}
?>