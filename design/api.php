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
        Master key:  <input type="text" name="master_key">
    </div>
    <div>
        Pin:  <input type="text" name="pin">
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

    $data_post['to_acount_number'] = md5('U3156245');
    $data_post['api_name'] = md5('4d7a55d9');
    $data_post['api_key'] = md5('30747071335');
    $data_post['api_hask'] = md5('18p0');

    $url = 'http://ookcash.com/api.php';
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