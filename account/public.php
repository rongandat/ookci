<?php

userLoginCheck();
// get account information
$account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
$smarty->assign('account_info', $account_info);

// get balance settings
// get all currencies_list
$currencies_array = get_currencies();

// get main account balances
$sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $login_userid . "'";
$balances_query = db_query($sql_balances);
while ($balance = db_fetch_array($balances_query)) {
    $balances_array[$balance['currency_code']] = $balance['balance'];
}

$balance_settings_array = array();
foreach ($currencies_array as $currency_code => $currency_info) {
    $balance_info_array[] = array('balance_code' => $currency_info['code'],
        'balance_name' => $currency_info['title'],
        'balance_text' => get_currency_value_format($balances_array[$currency_code], $currency_info)
    );
    $balance_settings_array[] = $currency_info['code'];
}

$smarty->assign('balances_list', $balance_info_array);

if ($_POST['action'] == 'process') {
    $name = (int) $_POST['name'];
    $address = (int) $_POST['address'];
    $phone = (int) $_POST['phone'];
    $email = (int) $_POST['email'];
    $mobile = (int) $_POST['mobile'];
    $company = (int) $_POST['company'];
    $balance_settings = (array) $_POST['balance_settings'];
    print_r($balance_settings);

    $user_settings_data = array('name' => $name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'mobile' => $mobile,
        'company' => $company,
        'balances' => implode(',', $balance_settings),
        'user_id' => $login_userid
    );
    // check setting
    $check_setting = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_SETTINGS . " WHERE user_id='" . $login_userid . "'"));
    if ($check_setting['total'] > 0) {
        // update setings
        db_perform(_TABLE_USER_SETTINGS, $user_settings_data, 'update', "user_id='" . $login_userid . "'");
    } else {
        db_perform(_TABLE_USER_SETTINGS, $user_settings_data);
    }
    $smarty->assign('updated', true);
    postAssign($smarty);
} else {
    // get user information settings
    $user_settings = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USER_SETTINGS . " WHERE user_id='" . $login_userid . "'"));
    $balance_settings = explode(',', $user_settings['balances']);
    $smarty->assign('balance_settings', $balance_settings);
    postAssign($smarty, $user_settings);
}
$smarty->assign('balance_settings_array', $balance_settings_array);
$_html_main_content = $smarty->fetch('account/public.html');
?>