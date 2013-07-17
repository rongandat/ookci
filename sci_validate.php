<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
include('includes/page_init.php');

if ($_REQUEST['validate']) {
    
    $sql_check = "SELECT * FROM " . _TABLE_TRANSACTIONS_HISTOTY . " WHERE MD5(CONCAT(to_account,from_account,amount,transaction_currency,batch_number,transaction_status))='" . urldecode(trim($_REQUEST['validate'])) . "'";
    $history_check = db_query($sql_check);
    $history = db_fetch_array($history_check);
   
    if (empty($history)) {
        echo 'ERROR';
        exit();
    }

    echo 'SUCCESS';
} else {
    echo 'ERROR';
    exit();
}

// MAIN PAGE CONTENT
?>
