<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$api_name = '4d7a55d9';
$api_key = '30747071335';
$api_hash = '18p0';

$token = md5($api_key . ':' . $api_hash);

$data_post['api_name'] = $api_name;
$data_post['secure_token'] = $token;

$data_post['func_name'] = 'getbalance';
$data_post['account_number'] = 'U3156245';
$data_post['balance_currency'] = 'USD';

$url = 'http://ookcash.com/index.php?module=api';
$result = curl_post($url, $data_post);
dump($result);



function dump($result){
    echo '<pre>';
    print_r($result);
    echo '</pre>';
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
?>
