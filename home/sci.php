<?php

tep_session_unregister('login_userid');
tep_session_unregister('login_account_number');
tep_session_unregister('login_useremail');
tep_session_unregister('navigation');
tep_session_unregister('login_main_account_info');

// delete the cookie
tep_setcookie("account_number", $account_number, time() - 1, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);
tep_setcookie("password", $login_password, time() - 1, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $requests = $_POST;
else
    $requests = $_GET;

$custom_fields = array('payee_account', 'payer_account', 'checkout_amount', 'checkout_currency', 'cancel_url', 'fail_url', 'success_url', 'status_url', 'status_method');

if (empty($requests['payee_account'])) {
    $error_code[] = 'ERR_002';
} else {
    $sql_user_payee = "SELECT user_id,  email,password FROM " . _TABLE_USERS . " WHERE account_number='" . $requests['payee_account'] . "'";
    $user_query_payee = db_query($sql_user_payee);
    if (db_num_rows($user_query_payee) <= 0) {
        $error_code[] = 'ERR_002';
    }
}
//
//if (empty($requests['checkout_amount'])) {
//    $error_code[] = 'ERR_003';
//}
//else{
//        if (!is_numeric($requests['checkout_amount']) || $requests['checkout_amount'] < 0) {
//            $error_code[] = 'ERR_009';
//    }
//}

if (empty($requests['checkout_currency'])) {
    $error_code[] = 'ERR_006';
}
if (empty($requests['checkout_currency'])) {
    $error_code[] = 'ERR_006';
}


if (empty($requests['checkout_currency'])) {
    $error_code[] = 'ERR_010';
} else {
    $sql_currencies_page = "SELECT * FROM " . _TABLE_CURRENCIES . " WHERE code='{$requests['checkout_currency']}'";
    $currency_page_query = db_query($sql_currencies_page);
    if (db_num_rows($currency_page_query) <= 0) {
        $error_code[] = 'ERR_010';
    }
}


$i = 0;
foreach ($requests as $field => $value) {
    if (!in_array($field, $custom_fields)) {
        $i++;
    }
}

if ($i > FIELDS_EXTRA_SCI_LIMIT) {
    $error_code[] = 'ERR_005';
}

if (empty($error_code)) {
    $payee_account = db_prepare_input($requests['payee_account']);
    $sql_user = "SELECT user_id,  account_number,account_name, firstname, lastname FROM " . _TABLE_USERS . " WHERE account_number='" . $payee_account . "'";
    $user_query = db_query($sql_user);

    if (db_num_rows($user_query) > 0) {
        foreach ($requests as $key => $request) {
            $requests[$key] = db_prepare_input($request);
//        $$key = $request;
//        tep_session_register($key);
        }

        $payee_account = $requests['payee_account'];
        tep_session_register('payee_account');
        unset($requests['payee_account']);

        $payer_account = $requests['payer_account'];
        tep_session_register('payer_account');
        unset($requests['payer_account']);

        $checkout_amount = $requests['checkout_amount'];
        tep_session_register('checkout_amount');
        unset($requests['checkout_amount']);

        $checkout_currency = $requests['checkout_currency'];
        tep_session_register('checkout_currency');
        unset($requests['checkout_currency']);

        $cancel_url = $requests['cancel_url'];
        tep_session_register('cancel_url');
        unset($requests['cancel_url']);

        $fail_url = $requests['fail_url'];
        tep_session_register('fail_url');
        unset($requests['fail_url']);

        $success_url = $requests['success_url'];
        tep_session_register('success_url');
        unset($requests['success_url']);

        $status_url = $requests['status_url'];
        tep_session_register('status_url');
        unset($requests['status_url']);

        $status_method = $requests['status_method'];
        tep_session_register('status_method');
        unset($requests['status_method']);

        $extra_fields = array();
        foreach ($requests as $key => $request) {
            $extra_fields[$key] = $request;
        }
        tep_session_register('extra_fields');
        $action = $requests['action'];

        $currency = get_currency($checkout_currency);
        $balance = get_currency_value_format($checkout_amount, $currency);

        $smarty->assign('amount', $balance);

        $user_info = db_fetch_array($user_query);
        $smarty->assign('user_info', $user_info);
        $smarty->assign('requests', $requests);
//        tep_redirect(get_href_link(PAGE_LOGIN));
    } else {
        $validator->addError(ERROR_FIELD_SCI, ERROR_INVALID_ACCOUNT_SCI);
    }
} else {

    $smarty->assign('errors', $error_code);
    $smarty->assign('error_code', $__ERROR_CODE);
}

$_html_main_content = $smarty->fetch('home/sci.html');
