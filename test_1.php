<form action="http://global-fund.net/ookcash_processing.php" method="post">
    <input type="hidden" value="0" name="compound">
    <input type="hidden" value="10" name="userid">
    <input type="hidden" value="2" name="hyipid">
    <input type="hidden" value="checkpayment" name="a">

    <input type="text" name="payee_account" value="U0189680"/>
    <input type="text" name="payer_account" value="U3156245"/>
    <input type="text" name="checkout_amount" value="50"/>
    <input type="text" name="transaction_currency" value="USD"/>
    <input type="text" name="batch_number" value="5645654"/>
    <input type="text" name="transaction_status" value="success"/>
    <input type="submit" value="post"/>
</form>


<?php
$test = array(
    'bname' => 'fsfs',
    'bname3' => 'fsfs',
    'bname4' => 'fsfs',
    'bname5' => 'fsfs',
);

$url = realpath(dirname(__FILE__)) . '/log.txt';
$out = fopen($url, "w");
fwrite($out, aprint($test,TRUE));
fclose($out);

function aprint($arr, $return = true) {
    $wrap = '<div style=" white-space:pre; position:absolute; top:10px; left:10px; height:200px; width:100px; overflow:auto; z-index:5000;">';
    $wrap = '<pre>';
    $txt = preg_replace('/(\[.+\])\s+=>\s+Array\s+\(/msiU', '$1 => Array (', print_r($arr, true));

    if ($return)
        return $wrap . $txt . '</pre>';
    else
        echo $wrap . $txt . '</pre>';
}
?>
