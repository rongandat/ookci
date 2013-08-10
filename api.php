<form action="" method="post">
    <div>
        Amount:  <input type="text" name="amount">
    </div>
    <div>
        Currency:  <input type="text" name="balance_currency" value="USD">
    </div>
    <div>
        Acount Number:  <input type="text" name="acount_number">
    </div>
    <div>
        Token:  <input type="text" name="api_token">
    </div>
    <div>
        <input type="submit" value="add"/>
    </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_post['amount'] = $_POST['amount'];
    $data_post['balance_currency'] = $_POST['balance_currency'];
    $data_post['acount_number'] = md5($_POST['acount_number']);
    $data_post['master_key'] = md5($_POST['master_key']);
    $data_post['pin'] = md5($_POST['pin']);
    
    $api_name = md5('4d7a55d9');
    $api_key = '30747071335';
    $api_hash = '18p0';
    
    $token = md5($api_key.':'.$api_hash);

    $data_post['to_acount_number'] = md5('U3156245');
    $data_post['api_name'] = $api_name;
    $data_post['token'] = $token;

    $url = 'http://pmcart.lc/index.php?page=transfer&module=api';
    $result = curl_post($url, $data_post);
    dump($result);
}

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