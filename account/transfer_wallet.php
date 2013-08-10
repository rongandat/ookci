<?php

userLoginCheck();

//bof: get currencies
$currencies_array = get_currencies();
$balance_currencies[''] = '-- Select Currency --';
// get main account balances
$sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $login_userid . "'";
$balances_query = db_query($sql_balances);
while ($balance = db_fetch_array($balances_query)) {
    $balances_array[$balance['currency_code']] = $balance['balance'];
}

$smarty->assign('success', $_GET['success']);
$sql_login_user = "SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'";
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


    $check_master_key = getMasterKey();
    // check master KEy
    if ($master_key != $check_master_key) {
        $validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
    }



    if (count($validator->errors) == 0) {
        $batch_number = tep_create_random_value(11, 'digits');
        $amount_text = get_currency_value_format($amount, $currencies_array[$balance_currency]);
        $transaction_memo = 'Transfer to wallet';

        $transaction_data_array = array(
            'from_userid' => $login_userid,
            'batch_number' => $batch_number,
            'to_userid' => $login_userid,
            'amount' => $amount,
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => $transaction_memo,
            'from_account' => $login_account_number,
            'to_account' => $login_account_number,
            'transaction_currency' => $balance_currency,
            'amount_text' => $amount_text,
            'transaction_status' => 'completed',
        );

        db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);

        // deduce balance of the from account
        db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance- " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $login_userid . "' and currency_code='" . $balance_currency . "'");
        // add balance to the account
        // check  user's balance currency init ?
        $check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_WALLET . " WHERE user_id='" . $login_userid . "' and currency_code='" . $balance_currency . "'"));

        $current_amount = $amount;
        if ($check_balance['total'] > 0) {

            db_query("UPDATE " . _TABLE_USER_WALLET . " SET balance=balance+ " . $current_amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $login_userid . "' and currency_code='" . $balance_currency . "'");
        } else {
            $balance_data_array = array('user_id' => $login_userid,
                'currency_code' => $balance_currency,
                'balance' => $current_amount,
                'last_updated' => date('YmdHis'),
            );
            db_perform(_TABLE_USER_WALLET, $balance_data_array);
        }


        // Send Transaction Notify 	Email to User
        $email_info = get_email_template('TRANSFER_WALLET_EMAIL');
        $user_info = db_fetch_array(db_query("SELECT firstname, email FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
        $firstname = $user_info['firstname'];

        $msg_subject = $email_info['emailtemplate_subject'];

        //	echo "amount_text = $amount_text <br>";


        $msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $login_account_number), $email_info['emailtemplate_content']);

        $msg_content = html_entity_decode($msg_content); //add by donghp 26/03/2012
        //echo $email_info['emailtemplate_content']."<br>-------------------<br>";
        //	echo $msg_content."<br>";

        tep_mail($firstname, $user_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

        tep_redirect(get_href_link(PAGE_ACCOUNT_TRANSFER_WALLET,'success=1'));
    } else {
        $smarty->assign('validerrors', $validator->errors);
    }
}

$_html_main_content = $smarty->fetch('account/transfer_wallet.html');
?>