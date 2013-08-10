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

$data_result = array(
    'status' => 'success',
    'account_number' => $user['account_number'],
    'account_name' => $user['account_name'],
);
echo json_encode($data_result);
exit();
die;


?>
