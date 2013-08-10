<?php
$api_name = db_prepare_input($_REQUEST['api_name']);
$api_token = db_prepare_input($_REQUEST['secure_token']);

$flag = TRUE;

if(empty($api_name) || empty($api_token)){
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_012',
        'error_title' => $__ERROR_CODE['ERR_012']
    );
    echo json_encode($data_result);
    exit();
}

$checkUserTO = 'select * from ' . _TABLE_USERS . ' us INNER JOIN ' . _TABLE_API_CONFIGS . ' ac ON(us.user_id = ac.user_id) where ac.api_name="' . $api_name . '" AND md5(CONCAT(ac.api_key,":",ac.api_hask))="' . $api_token . '" AND ac.api_status = 1';

$user_check = db_query($checkUserTO);
if (db_num_rows($user_check) == 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_012',
        'error_title' => $__ERROR_CODE['ERR_012']
    );
    echo json_encode($data_result);
    exit();
}

$user_info = db_fetch_array($user_check);

$func_name = db_prepare_input($_REQUEST['func_name']);

switch ($func_name) {
    case 'getbalance':
        include_once 'get_balance.php';
        break;
    case 'getaccount':
        include_once 'get_account.php';
        break;
    case 'tracking':
        include_once 'track.php';
        break;
    case 'transfer':
        include_once 'transfers.php';
        break;
    default:
        $data_result = array(
            'status' => 'error',
            'error_code' => 'ERR_012',
            'error_title' => $__ERROR_CODE['ERR_012']
        );
        echo json_encode($data_result);
        exit();
        break;
}
die();
?>
