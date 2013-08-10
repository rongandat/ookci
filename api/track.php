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
$transaction_id = db_prepare_input($_REQUEST['transaction_id']);

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

if(empty($transaction_id)){
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_019',
        'error_title' => $__ERROR_CODE['ERR_019']
    );
    echo json_encode($data_result);
    exit();
}


$sql_transaction = "SELECT * FROM " . _TABLE_TRANSACTIONS . " WHERE  ( from_account='" . $acount_number . "' OR  to_account='" . $acount_number . "') AND batch_number = '{$transaction_id}'";
$transaction_check = db_query($sql_transaction);
if (db_num_rows($transaction_check) == 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_019',
        'error_title' => $__ERROR_CODE['ERR_019']
    );
    echo json_encode($data_result);
    exit();
}
$transaction = db_fetch_array($transaction_check);


$data_result = array(
    'status' => 'success',
    'transaction_id' => $transaction['batch_number'],
    'payer_account' => $transaction['from_account'],
    'payee_account' => $transaction['to_account'],
    'amount' => $transaction['amount'],
    'amount_text' => $transaction['amount_text'],
    'fee' => $transaction['fee'],
    'fee_text' => $transaction['fee_text'],
    'currency_code' => $transaction['transaction_currency'],
    'transaction_time' => $transaction['transaction_time'],
    'status' => $transaction['transaction_status'],
);
echo json_encode($data_result);
exit();
die;


?>
