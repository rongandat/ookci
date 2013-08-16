<?php

userLoginCheck();

if (!tep_session_is_registered('payee_account') && tep_not_null($payee_account))
    $smarty->assign('payee_account', $payee_account);
$account_info = db_fetch_array(db_query("SELECT account_name, account_type, referral_count FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));



//BOF: main account balances
// get all currencies_list
$currencies_array = get_currencies();
// get main account balances
$sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $login_userid . "'";
$balances_query = db_query($sql_balances);
while ($balance = db_fetch_array($balances_query)) {
    $balances_array[$balance['currency_code']] = $balance['balance'];
}

foreach ($currencies_array as $currency_code => $currency_info) {
    $balance_info_array[] = array('balance_code' => $currency_info['code'],
        'balance_name' => $currency_info['title'],
        'balance_text' => get_currency_value_format($balances_array[$currency_code], $currency_info)
    );
}

$smarty->assign('balances', $balance_info_array);

// get wallet balances
$sql_wallets = "SELECT currency_code, balance FROM " . _TABLE_USER_WALLET . " WHERE user_id='" . $login_userid . "'";
$wallets_query = db_query($sql_wallets);
while ($wallet = db_fetch_array($wallets_query)) {
    $wallets_array[$wallet['currency_code']] = $wallet['balance'];
}
foreach ($currencies_array as $currency_code => $currency_info) {
    $wallet_info_array[] = array('balance_code' => $currency_info['code'],
        'balance_name' => $currency_info['title'],
        'balance_text' => get_currency_value_format($wallets_array[$currency_code], $currency_info)
    );
    $totals_info_array[] = array('balance_text' => get_currency_value_format($wallets_array[$currency_code] + $balances_array[$currency_code], $currency_info));
}

$smarty->assign('wallets', $wallet_info_array);
$smarty->assign('totals', $totals_info_array);

//EOF: main account balances	
$smarty->assign('account_info', $account_info);
$_html_main_content = $smarty->fetch('account/account.html');
?>