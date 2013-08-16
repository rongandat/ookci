<?php

userLoginCheck();

$account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE account_number='" . $login_account_number . "'"));


//bof: get currencies
$currencies_array = get_currencies();
$balance_currencies[''] = '-- Select Currency --';
// get main account balances
$sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_WALLET . " WHERE user_id='" . $account_info['user_id'] . "'";
$balances_query = db_query($sql_balances);
while ($balance = db_fetch_array($balances_query)) {
    $balances_array[$balance['currency_code']] = $balance['balance'];
}

$smarty->assign('success', $_GET['success']);
$sql_login_user = "SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $account_info['user_id'] . "'";
$login_user_query = db_query($sql_login_user);
$user_login = db_fetch_array($login_user_query);
$smarty->assign('user_login', $user_login);


foreach ($currencies_array as $currency_code => $currency_info) {
    $balance_currencies[$currency_code] = $currency_info['title'] . ' (' . get_currency_value_format($balances_array[$currency_code], $currency_info) . ')';
}

$smarty->assign('balance_currencies', $balance_currencies);
//eof: get currencies
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $balance_currency = db_prepare_input($_POST['balance_currency']);
    $amount = db_prepare_input($_POST['amount']);
    $master_key = db_prepare_input($_POST['master_key']);

    if ($balance_currency == '')
        $validator->addError('Currency', 'Please select the currency of balance that you want to use for the transaction.');
    if ($amount <= 0) {
        $validator->addError('Amount', 'Please input correct Amount .');
    } else { // check if out of balance
        if ($amount > $balances_array[$balance_currency])
            $validator->addError('Balance', 'You have not enough balance to transfer the amount(<strong>' . get_currency_value_format($amount, $currencies_array[$balance_currency]) . '</strong>). Please input difference amount.');
    }

    $to_account = db_prepare_input($_POST['to_account']);
    $check_account_query = db_query("SELECT account_number, firstname, lastname, account_name , user_id FROM " . _TABLE_USERS . " WHERE account_number='" . trim($to_account) . "' and account_number <>'" . $login_account_number . "'");
    if (db_num_rows($check_account_query) == 0) {
        $validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
    } elseif (trim($to_account) == $login_account_number) {
        $validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
    }
    
    $to_user_info = db_fetch_array($check_account_query);


    if (count($validator->errors) == 0) {
        $batch_number = tep_create_random_value(11, 'digits');
        $amount_text = get_currency_value_format($amount, $currencies_array[$balance_currency]);
        $transaction_memo = '';
        
        $fees = $amount * TRANSFER_FEES / 100;
        $fees_text = get_currency_value_format($fees, $currencies_array[$balance_currency]);

        $transaction_data_array = array(
            'from_userid' => $user_login['user_id'],
            'batch_number' => $batch_number,
            'to_userid' => $to_user_info['user_id'],
            'amount' => $amount,
            'fee' => $fees,
            'fee_text' => $fees_text,
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => $transaction_memo,
            'from_account' => $user_login['account_number'],
            'to_account' => $to_user_info['account_number'],
            'transaction_currency' => $balance_currency,
            'amount_text' => $amount_text,
            'transaction_status' => 'completed',
        );

        db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);

        // deduce balance of the from account
        db_query("UPDATE " . _TABLE_USER_WALLET . " SET balance=balance- " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $user_login['user_id'] . "' and currency_code='" . $balance_currency . "'");
        // add balance to the account
        // check  user's balance currency init ?
        $check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $to_user_info['user_id'] . "' and currency_code='" . $balance_currency . "'"));
        
        $current_amount = $amount - $fees;
        if ($check_balance['total'] > 0) {
            db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance+ " . $current_amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $to_user_info['user_id'] . "' and currency_code='" . $balance_currency . "'");
        } else {
            $balance_data_array = array('user_id' => $to_user_info['user_id'],
                'currency_code' => $balance_currency,
                'balance' => $current_amount,
                'last_updated' => date('YmdHis'),
            );
            db_perform(_TABLE_USER_BALANCE, $balance_data_array);
        }


        // Send Transaction Notify 	Email to User
        $email_info = get_email_template('TRANSFER_EMAIL');
        
        $firstname = $to_user_info['firstname'];

        $msg_subject = $email_info['emailtemplate_subject'];

        //	echo "amount_text = $amount_text <br>";


        $msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $login_account_number), $email_info['emailtemplate_content']);

        $msg_content = html_entity_decode($msg_content); //add by donghp 26/03/2012
        //echo $email_info['emailtemplate_content']."<br>-------------------<br>";
        //	echo $msg_content."<br>";

        tep_mail($firstname, $to_user_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

        //admin transfer
        $batch_number_admin = tep_create_random_value(11, 'digits');
        $transaction_data_array_admin = array(
            'from_userid' => $to_user_info['user_id'],
            'batch_number' => $batch_number_admin,
            'to_userid' => 1,
            'amount' => $fees,
            'fee' => 0,
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => 'transaction fees #' . $batch_number,
            'from_account' => $to_user_info['account_number'],
            'to_account' => 'OOKCASH',
            'transaction_currency' => $balance_currency,
            'amount_text' => $transaction_data_array['fee_text'],
            'transaction_status' => 'completed',
            'status' => '0',
        );
        db_perform(_TABLE_TRANSACTIONS, $transaction_data_array_admin);
        transfer_admin($transaction_data_array_admin);
        
        
        tep_redirect(get_href_link(PAGE_QUICK_PAYMENT, 'success=1'));
    } else {
        $smarty->assign('validerrors', $validator->errors);
    }
}

$_html_main_content = $smarty->fetch('account/quick_payment.html');
?>
