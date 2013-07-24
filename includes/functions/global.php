<?php

// get email template information
function get_email_template($template_key) {
    global $languages_id;
    $sql_emailinfo = "SELECT ed.emailtemplate_subject,   ed.emailtemplate_content FROM " . _TABLE_EMAILTEMPLATES . ' e,' . _TABLE_EMAILTEMPLATES_DESCRIPTION . " ed WHERE  e.emailtemplates_id=ed.emailtemplates_id and ed.language_id='" . $languages_id . "' and e.emailtemplate_status and e.emailtemplate_key='" . $template_key . "' ";
    $email_info = db_fetch_array(db_query($sql_emailinfo));

    return $email_info;
}

//get currencies list
function get_currencies() {
    $currencies_array = array();
    $currencies_query = db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . _TABLE_CURRENCIES . " where status=1 order by sort_order, code ");
    while ($currencies = db_fetch_array($currencies_query)) {
        $currencies_array[$currencies['code']] = array('code' => $currencies['code'],
            'title' => $currencies['title'],
            'symbol_left' => $currencies['symbol_left'],
            'symbol_right' => $currencies['symbol_right'],
            'decimal_point' => $currencies['decimal_point'],
            'thousands_point' => $currencies['thousands_point'],
            'decimal_places' => $currencies['decimal_places'],
            'value' => $currencies['value']);
    }

    return $currencies_array;
}

function get_currency($code) {
    $currencies_query = db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . _TABLE_CURRENCIES . " where status=1 and code='{$code}' order by sort_order, code ");
    $curency = db_fetch_array($currencies_query);
    return $curency;
}

// return formated string of value(amount) by currency
function get_currency_value_format($amount, $currency_info) {
    $format_string = $currency_info['symbol_left'] . number_format(tep_round($amount, $currency_info['decimal_places']), $currency_info['decimal_places'], $currency_info['decimal_point'], $currency_info['thousands_point']) . $currency_info['symbol_right'];
    return $format_string;
}

function curl_post($url, $fields) {
    //url-ify the data for the POST
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

//open connection
    $ch = curl_init();

//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//close connection
    curl_close($ch);
    if ($httpcode >= 200 && $httpcode < 300) {
        return $result;
    } else {
        return false;
    }
}

function curl_get($url, $fields) {
    //url-ify the data for the POST
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

//open connection
    $ch = curl_init();
    $url .= '?' . $fields_string;

//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//close connection
    curl_close($ch);
    if ($httpcode >= 200 && $httpcode < 300) {
        return $result;
    } else {
        return false;
    }
}

function transfer($transaction_data_array) {
    $amount = $transaction_data_array['amount'];
    $from_userid = $transaction_data_array['from_userid'];
    $balance_currency = $transaction_data_array['transaction_currency'];
    $to_userid = $transaction_data_array['to_userid'];
    $fees = $transaction_data_array['fee'];
    $batch_number = $transaction_data_array['batch_number'];
    $to_account = $transaction_data_array['to_account'];
    $amount_text = $transaction_data_array['amount_text'];
    $to_account = $transaction_data_array['to_account'];
    $transaction_memo = $transaction_data_array['transaction_memo'];
    $from_account_number = $transaction_data_array['from_account'];
    // deduce balance of the from account
    db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance- " . $amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $from_userid . "' and currency_code='" . $balance_currency . "'");
    // add balance to the account
    // check  user's balance currency init ?
    $check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'"));

    $current_amount = $amount - $fees;
    if ($check_balance['total'] > 0) {

        db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance+ " . $current_amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'");
    } else {
        $balance_data_array = array('user_id' => $to_userid,
            'currency_code' => $balance_currency,
            'balance' => $current_amount,
            'last_updated' => date('YmdHis'),
        );
        db_perform(_TABLE_USER_BALANCE, $balance_data_array);
    }

    // completed
    $transaction_data = array('batch_number' => $batch_number,
        'from_account' => $from_account_number,
        'to_account' => $to_account,
        'amount_text' => $amount_text,
        'memo' => $transaction_memo,
        'transaction_time' => date('d/m/Y H:i')
    );


    $step = 'completed';
    // Send Transaction Notify 	Email to User
    $email_info = get_email_template('TRANSFER_EMAIL');
    $user_info = db_fetch_array(db_query("SELECT firstname, email FROM " . _TABLE_USERS . " WHERE user_id='" . $to_userid . "'"));
    $firstname = $user_info['firstname'];

    $msg_subject = $email_info['emailtemplate_subject'];

    //	echo "amount_text = $amount_text <br>";


    $msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $from_account_number), $email_info['emailtemplate_content']);

    $msg_content = html_entity_decode($msg_content);

    tep_mail($firstname, $user_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

    
    //admin transfer
    $batch_number_admin = tep_create_random_value(11, 'digits');
    $transaction_data_array_admin = array('from_userid' => $to_userid,
        'batch_number' => $batch_number_admin,
        'to_userid' => 1,
        'amount' => $fees,
        'fee' => 0,
        'transaction_time' => date('YmdHis'),
        'transaction_memo' => 'transaction fees #' . $batch_number,
        'from_account' => $to_account,
        'to_account' => 'OOKCASH',
        'transaction_currency' => $balance_currency,
        'amount_text' => $transaction_data_array['fee_text'],
        'transaction_status' => 'completed',
    );

    db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);
    transfer_admin($transaction_data_array_admin);
    return $transaction_data;
}

function transfer_admin($transaction_data_array) {
    $amount = $transaction_data_array['amount'];
    $from_userid = $transaction_data_array['from_userid'];
    $balance_currency = $transaction_data_array['transaction_currency'];
    $to_userid = $transaction_data_array['to_userid'];
    $fees = $transaction_data_array['fee'];
    $batch_number = $transaction_data_array['batch_number'];
    $to_account = $transaction_data_array['to_account'];
    $amount_text = $transaction_data_array['amount_text'];
    $to_account = $transaction_data_array['to_account'];
    $transaction_memo = $transaction_data_array['transaction_memo'];
    $from_account_number = $transaction_data_array['from_account'];

   
    // check  user's balance currency init ?
    $check_balance = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'"));

    $current_amount = $amount - $fees;
    if ($check_balance['total'] > 0) {
        db_query("UPDATE " . _TABLE_USER_BALANCE . " SET balance=balance+ " . $current_amount . ", last_updated='" . date('YmdHis') . "' WHERE user_id='" . $to_userid . "' and currency_code='" . $balance_currency . "'");
    } else {
        $balance_data_array = array('user_id' => $to_userid,
            'currency_code' => $balance_currency,
            'balance' => $current_amount,
            'last_updated' => date('YmdHis'),
        );
        db_perform(_TABLE_USER_BALANCE, $balance_data_array);
    }

    // completed
    $transaction_data = array('batch_number' => $batch_number,
        'from_account' => $from_account_number,
        'to_account' => $to_account,
        'amount_text' => $amount_text,
        'memo' => $transaction_memo,
        'transaction_time' => date('d/m/Y H:i')
    );


    $step = 'completed';
    // Send Transaction Notify 	Email to User
    $email_info = get_email_template('TRANSFER_EMAIL');
    $user_info = db_fetch_array(db_query("SELECT firstname, email FROM " . _TABLE_USERS . " WHERE user_id='" . $to_userid . "'"));
    $firstname = $user_info['firstname'];

    $msg_subject = $email_info['emailtemplate_subject'];

    //	echo "amount_text = $amount_text <br>";


    $msg_content = str_replace(array('[firstname]', '[amount_text]', '[batch_number]', '[balance_currency]', '[from_account]'), array($firstname, $amount_text, $batch_number, $balance_currency, $from_account_number), $email_info['emailtemplate_content']);

    $msg_content = html_entity_decode($msg_content);

    tep_mail($firstname, $user_info['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);
}

?>