<?php
if(empty($flag)){
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_012',
        'error_title' => $__ERROR_CODE['ERR_012']
    );
    echo json_encode($data_result);
    exit();
}
//Get User
$acount_number = db_prepare_input($_REQUEST['account_number']);
$balance_currency = db_prepare_input($_REQUEST['balance_currency']);

if (empty($acount_number)) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_011',
        'error_title' => $__ERROR_CODE['ERR_011']
    );
    echo json_encode($data_result);
    exit();
}

$checkUser = 'select * from ' . _TABLE_USERS . ' where account_number = "' . $acount_number . '"';
$user_check = db_query($checkUser);
if (db_num_rows($user_check) == 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_011',
        'error_title' => $__ERROR_CODE['ERR_011']
    );
    echo json_encode($data_result);
    exit();
}

$user = db_fetch_array($user_check);


if (empty($balance_currency)) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_010',
        'error_title' => $__ERROR_CODE['ERR_010']
    );
    echo json_encode($data_result);
    exit();
}

$sql_currencies_page = "SELECT * FROM " . _TABLE_CURRENCIES . " WHERE code='{$balance_currency}'";
$currency_page_query = db_query($sql_currencies_page);
if (db_num_rows($currency_page_query) <= 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_010',
        'error_title' => $__ERROR_CODE['ERR_011']
    );
    echo json_encode($data_result);
    exit();
}
$balance_currency = db_fetch_array($currency_page_query);

$sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $user['user_id'] . "' AND currency_code = '{$balance_currency['code']}'";
$balances_query = db_query($sql_balances);
$balances = db_fetch_array($balances_query);



$amount_text = get_currency_value_format($balances['balance'], $balance_currency);
$data_result = array(
    'status' => 'success',
    'amount' => $balances['balance'],
    'amount_text' => $amount_text,
    'balance_currency' => $balance_currency['code'],
);
echo json_encode($data_result);
exit();
die;
?>
