<?php



$amount = $_REQUEST['transfer_amount'];
$balance_currency = $_REQUEST['balance_currency']; //dv tien
$account_number = $_REQUEST['account_number']; 
$payee_account = $_REQUEST['payee_account']; 


//bof: get currencies
$currency = get_currency($balance_currency);
if (!$currency) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_014',
        'error_title' => $__ERROR_CODE['ERR_014']
    );
    echo json_encode($data_result);
    exit();
}

$fees = $amount * TRANSFER_FEES / 100;

$batch_number = tep_create_random_value(11, 'digits');
$amount_text = get_currency_value_format($amount, $currency);
$fees_text = get_currency_value_format($fees, $currency);

if ((!is_numeric($amount) && !is_float($amount)) || ($amount < 0)) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_013',
        'error_title' => $__ERROR_CODE['ERR_013']
    );
    echo json_encode($data_result);
    exit();
}

if($user_info['account_number'] != $account_number){
     $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_020',
        'error_title' => $__ERROR_CODE['ERR_020']
    );
    echo json_encode($data_result);
    exit();
}


//get balance user from
$checkBalance = 'select * from ' . _TABLE_USER_BALANCE . ' where user_id = "' . $user_info['user_id'] . '" AND currency_code = "' . $balance_currency . '"';
$balance_check = db_query($checkBalance);
if (db_num_rows($balance_check) == 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_016',
        'error_title' => $__ERROR_CODE['ERR_016']
    );
    echo json_encode($data_result);
    exit();
}
$balance = db_fetch_array($balance_check);

if ($balance['balance'] < $amount) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_016',
        'error_title' => $__ERROR_CODE['ERR_016']
    );
    echo json_encode($data_result);
    exit();
}


$checkUserTO = 'select * from ' . _TABLE_USERS . ' where account_number="' . $payee_account .'"';
$user_check = db_query($checkUserTO);
if (db_num_rows($user_check) == 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_021',
        'error_title' => $__ERROR_CODE['ERR_021']
    );
    echo json_encode($data_result);
    exit();
}

$user_to = db_fetch_array($user_check);

$sql_check_transaction = 'select * from ' . _TABLE_TRANSACTIONS . ' where from_userid = "' . $user_info['user_id'] . '" AND to_userid = "' . $user_to['user_id'] . '" AND amount = "' . $amount . '" AND transaction_currency = "' . $balance_currency . '" AND transaction_time >= "' . date("Y-m-d h:i:s", time() - 60) . '"';
$check_transaction = db_query($sql_check_transaction);
if (db_num_rows($check_transaction) > 0) {
    $data_result = array(
        'status' => 'error',
        'error_code' => 'ERR_015',
        'error_title' => $__ERROR_CODE['ERR_015']
    );
    echo json_encode($data_result);
    exit();
}

$transaction_memo = 'Transfer by api from acount number: ' . $user_info['account_number'];

$transaction_data_array = array(
    'from_userid' => $user_info['user_id'],
    'batch_number' => $batch_number,
    'to_userid' => $user_to['user_id'],
    'amount' => $amount,
    'fee' => $fees,
    'fee_text' => $fees_text,
    'transaction_time' => date('YmdHis'),
    'transaction_memo' => $transaction_memo,
    'from_account' => $user_info['account_number'],
    'to_account' => $user_to['account_number'],
    'transaction_currency' => $balance_currency,
    'amount_text' => $amount_text,
    'transaction_status' => 'completed',
);

db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);

// deduce balance of the from account
db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance- " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $user_info['user_id'] . "' and currency_code='" . $balance_currency . "'");
// add balance to the account
// check  user's balance currency init ?
$check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $user_to['user_id'] . "' and currency_code='" . $balance_currency . "'"));

$current_amount = $amount - $fees;
if (count($check_balance) > 0) {

    db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance+ " . $current_amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $user_to['user_id'] . "' and currency_code='" . $balance_currency . "'");
} else {
    $balance_data_array = array('user_id' => $user_to['user_id'],
        'currency_code' => $balance_currency,
        'balance' => $current_amount,
        'last_updated' => date('YmdHis'),
    );
    db_perform(_TABLE_USER_BALANCE, $balance_data_array);
}

// completed
$transaction_data = array('batch_number' => $batch_number,
    'from_account' => $user_info['account_number'],
    'to_account' => $user_to['account_number'],
    'amount_text' => $amount_text,
    'memo' => $transaction_memo,
    'transaction_time' => date('d/m/Y H:i')
);


// Send Transaction Notify 	Email to User
$email_info = get_email_template('TRANSFER_EMAIL');
$firstname = $user_to['firstname'];

$msg_subject = $email_info['emailtemplate_subject'];

//	echo "amount_text = $amount_text <br>";


$msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $login_account_number), $email_info['emailtemplate_content']);

$msg_content = html_entity_decode($msg_content);
//echo $email_info['emailtemplate_content']."<br>-------------------<br>";
//	echo $msg_content."<br>";

tep_mail($firstname, $user_to['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

//admin transfer
$batch_number_admin = tep_create_random_value(11, 'digits');
$transaction_data_array_admin = array(
    'from_userid' => $user_to['user_id'],
    'batch_number' => $batch_number_admin,
    'to_userid' => 1,
    'amount' => $fees,
    'fee' => 0,
    'transaction_time' => date('YmdHis'),
    'transaction_memo' => 'transaction fees #' . $batch_number,
    'from_account' => $user_to['account_number'],
    'to_account' => 'OOKCASH',
    'transaction_currency' => $balance_currency,
    'amount_text' => $transaction_data_array['fee_text'],
    'transaction_status' => 'completed',
    'status' => '0',
);
db_perform(_TABLE_TRANSACTIONS, $transaction_data_array_admin);
transfer_admin($transaction_data_array_admin);

$data_result = array(
    'status' => 'success',
    'batch_number' => $batch_number,
    'amount' => $amount,
    'fee' => $fees,
    'transaction_memo' => $transaction_memo,
    'from_account' => $user_from['account_number'],
    'to_account' => $user_to['account_number'],
    'transaction_currency' => $balance_currency,
);
echo json_encode($data_result);
exit();
?>
