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

foreach ($currencies_array as $currency_code => $currency_info) {
    $balance_currencies[$currency_code] = $currency_info['title'] . ' (' . get_currency_value_format($balances_array[$currency_code], $currency_info) . ')';
}

$smarty->assign('balance_currencies', $balance_currencies);
//eof: get currencies

if ($_POST['action'] == 'process') {
    $step = $_POST['step'];

    //echo "step = $step <br>";

    if ($step == 'confirm') { // confirm transfer
        $to_userid = (int) $_POST['to_userid'];
        $to_account = db_prepare_input($_POST['to_account']);
        $transaction_memo = db_prepare_input($_POST['transaction_memo']);
        $amount = (float) $_POST['amount'];
        $balance_currency = $_POST['balance_currency']; //dv tien

        $batch_number = tep_create_random_value(11, 'digits');
        $amount_text = get_currency_value_format($amount, $currencies_array[$balance_currency]);

        $transaction_data_array = array('from_userid' => $login_userid,
            'batch_number' => $batch_number,
            'to_userid' => $to_userid,
            'amount' => $amount,
            'transaction_time' => date('YmdHis'),
            'transaction_memo' => $transaction_memo,
            'from_account' => $login_account_number,
            'to_account' => $to_account,
            'transaction_currency' => $balance_currency,
            'amount_text' => $amount_text,
            'transaction_status' => 'completed',
        );

        db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);

        // deduce balance of the from account
        db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance- " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $login_userid . "' and currency_code='" . $balance_currency . "'");
        // add balance to the account
        // check  user's balance currency init ?
        $check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'"));

        if ($check_balance['total'] > 0) {

            db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance+ " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'");
        } else {
            $balance_data_array = array('user_id' => $to_userid,
                'currency_code' => $balance_currency,
                'balance' => $amount,
                'last_updated' => date('YmdHis'),
            );
            db_perform(_TABLE_USER_BALANCE, $balance_data_array);
        }

        // completed
        $transaction_data = array('batch_number' => $batch_number,
            'from_account' => $login_account_number,
            'to_account' => $to_account,
            'amount_text' => $amount_text,
            'memo' => $transaction_memo,
            'transaction_time' => date('d/m/Y H:i')
        );


        $smarty->assign('transaction_data', $transaction_data);
        $step = 'completed';
        // Send Transaction Notify 	Email to User
        $email_info = get_email_template('TRANSFER_EMAIL');
        $user_info = db_fetch_array(db_query("SELECT firstname, email FROM " . _TABLE_USERS . " WHERE user_id='" . $to_userid . "'"));
        $firstname = $user_info['firstname'];

        $msg_subject = $email_info['emailtemplate_subject'];

        //	echo "amount_text = $amount_text <br>";


        $msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $login_account_number), $email_info['emailtemplate_content']);

        $msg_content = html_entity_decode($msg_content); //add by donghp 26/03/2012
        //echo $email_info['emailtemplate_content']."<br>-------------------<br>";
        //	echo $msg_content."<br>";

        tep_mail($firstname, $user_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);
    } else { // normal form
        $to_account = db_prepare_input($_POST['to_account']);
        $amount = (float) $_POST['amount'];

        $balance_currency = $_POST['balance_currency'];

        $transaction_memo = db_prepare_input($_POST['transaction_memo']);

        $master_key = db_prepare_input($_POST['master_key']);


        if ($balance_currency == '')
            $validator->addError('Currency', 'Please select the currency of balance that you want to use for the transaction.');
        if ($amount <= 0) {
            $validator->addError('Amount', 'Please input correct Amount .');
        } else { // check if out of balance
            if ($amount > $balances_array[$balance_currency])
                $validator->addError('Balance', 'You have not enough balance to transfer the amount(<strong>' . get_currency_value_format($amount, $currencies_array[$balance_currency]) . '</strong>). Please input difference amount.');
        }

        $check_account_query = db_query("SELECT account_number, firstname, lastname, account_name , user_id FROM " . _TABLE_USERS . " WHERE account_number='" . trim($to_account) . "' and account_number <>'" . $login_account_number . "'");
        if (db_num_rows($check_account_query) == 0) {
            $validator->addError('Account Number', 'Invalid account number. Please input correct account number of the user that you want to transfer to.');
        } else {
            $check_master_key = getMasterKey();
            // check master KEy
            if ($master_key != $check_master_key) {
                $validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
            }
        }

        if (count($validator->errors) == 0) {
            $transfer_info = db_fetch_array($check_account_query);
            $transfer_info['amount'] = $amount;
            $transfer_info['balance_currency'] = $balance_currency;
            $transfer_info['amount_text'] = get_currency_value_format($amount, $currencies_array[$balance_currency]);
            $transfer_info['fees_text'] = get_currency_value_format($fees, $currencies_array[$balance_currency]);
            $transfer_info['transaction_memo'] = $transaction_memo;
            $smarty->assign('transfer_info', $transfer_info);

            $step = 'confirm';
        } else {
            postAssign($smarty);
            $smarty->assign('validerrors', $validator->errors);
        }
    }

    $smarty->assign('step', $step);
}

$_html_main_content = $smarty->fetch('account/transfer.html');
?>