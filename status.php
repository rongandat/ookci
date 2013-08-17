<?php

//set POST variables
$url = 'http://ookcash.lc/sci/validate';
foreach ($_REQUEST as $key => $post) {
    $fields[$key] = urldecode($post);
}

$validateField = trim($fields['payee_account']);
$validateField .= trim($fields['payer_account']);
$validateField .= trim($fields['checkout_amount']);
$validateField .= trim($fields['transaction_currency']);
$validateField .= trim($fields['batch_number']);
$validateField .= trim($fields['transaction_status']);
$fields_string = 'validate=' . md5($validateField);
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, strlen($fields_string));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

echo $result;
