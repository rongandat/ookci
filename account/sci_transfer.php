<?php

userLoginCheck();
if (!tep_session_is_registered('payee_account') && tep_not_null($payee_account))
    tep_redirect(get_href_link(PAGE_TRANSFER));
//bof: get currencies
$currency = get_currency($checkout_currency);
$balance = get_currency_value_format($checkout_amount, $currency);
$transfer_info['fees_text'] = get_currency_value_format($fees, $currency);

$smarty->assign('amount', $balance);
$smarty->assign('fees_text', $fees_text);
$smarty->assign('success_url', $success_url);
$smarty->assign('fail_url', $fail_url);
$smarty->assign('cancel_url', $cancel_url);
$smarty->assign('status_url', $status_url);
$smarty->assign('extra_fields', $extra_fields);



$smarty->assign('to_acount', $payee_account);
//eof: get currencies

$sql_user = "SELECT user_id,account_number,account_name FROM " . _TABLE_USERS . " WHERE account_number='" . $payee_account . "'";
$user_query = db_query($sql_user);

if (db_num_rows($user_query) == 0) {
    tep_redirect(get_href_link(PAGE_TRANSFER));
}

$user_to_info = db_fetch_array($user_query);
$smarty->assign('user_to_info', $user_to_info);
$stepValue = 'confirm';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $master_key = db_prepare_input($_POST['master_key']);
    $memo = db_prepare_input($_POST['transaction_memo']);
    $sql_check = "SELECT account_name, firstname, lastname FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "' and account_number='" . $login_account_number . "' and master_key='" . $master_key . "'";
    $user_check = db_query($sql_check);
    $user_transfer = db_fetch_array($user_check);
    $smarty->assign('user_transfer', $user_transfer);


    if (db_num_rows($user_check) > 0) {
        $step = db_prepare_input($_POST['step']);

        if ($step == 'confirm') {
            $smarty->assign('master_key', $master_key);
            //get banlance
            $currencies_query = db_query("select currency_code, balance value from " . _TABLE_USER_BALANCE . " where user_id='{$login_userid}' and currency_code='{$checkout_currency}'");
            $curency = db_fetch_array($currencies_query);

            $to_userid = $user_to_info['user_id'];
            $to_account = $payee_account;
            $transaction_memo = db_prepare_input($_POST['transaction_memo']);
            $amount = (float) $checkout_amount;
            $balance_currency = $checkout_currency; //dv tien

            $batch_number = tep_create_random_value(11, 'digits');
            $amount_text = $balance;
        } elseif ($step == 'complete') {
            $smarty->assign('master_key', $master_key);
            //get banlance
            $currencies_query = db_query("select currency_code, balance value from " . _TABLE_USER_BALANCE . " where user_id='{$login_userid}' and currency_code='{$checkout_currency}'");
            $curency = db_fetch_array($currencies_query);

            $to_userid = $user_to_info['user_id'];
            $to_account = $payee_account;
            $transaction_memo = db_prepare_input($_POST['transaction_memo']);
            $amount = (float) $checkout_amount;
            $balance_currency = $checkout_currency; //dv tien

            $batch_number = tep_create_random_value(11, 'digits');
            $amount_text = $balance;
            if ($checkout_amount > $curency['value']) {
                $error_code[] = 'ERR_001';
                $smarty->assign('errors', $error_code);
                $smarty->assign('error_code', $__ERROR_CODE);
            } else {

                $transaction_data_array = array(
                    'from_userid' => $login_userid,
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
                $transaction_id = db_insert_id();

                $transaction_history_array = array(
                    'from_userid' => $login_userid,
                    'batch_number' => $transaction_data_array['batch_number'],
                    'transaction_id' => $transaction_id,
                    'to_userid' => $to_userid,
                    'amount' => $amount,
                    'transaction_time' => date('YmdHis'),
                    'transaction_memo' => $transaction_memo,
                    'from_account' => $login_account_number,
                    'to_account' => $to_account,
                    'transaction_currency' => $balance_currency,
                    'amount_text' => $amount_text,
                    'transaction_status' => 'completed',
                    'description' => '',
                    'fail_url' => $fail_url,
                    'cancel_url' => $cancel_url,
                    'status_url' => $status_url,
                    'success_url' => $success_url,
                    'extra_fields' => serialize($extra_fields),
                    'status_method' => $status_method
                );

                db_perform(_TABLE_TRANSACTIONS_HISTOTY, $transaction_history_array);
                $history_id = db_insert_id();
                $smarty->assign('status_transaction', 'completed');
                $smarty->assign('transaction', $transaction_history_array);



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
                $stepValue = 'complate';
                tep_redirect(get_href_link(PAGE_SCI_TRANSFER_COMPLETE, 'transaction=' . $history_id));
            }
        } else {
            $transaction_memo = db_prepare_input($_POST['transaction_memo']);
            $smarty->assign('transaction_memo', $transaction_memo);
            $smarty->assign('master_key', $master_key);
        }
    } else {
        postAssign($smarty);
        $validator->addError('Master Key', 'Invalid master key entered. Master Key is a three digit number you have selected at the time of registration. Please try again.');
    }
}
$smarty->assign('validerrors', $validator->errors);
$smarty->assign('step_value', $step);

$_html_main_content = $smarty->fetch('account/sci_transfer.html');
?>