<?php

include('includes/admin_login_check.php');

for ($m = 1; $m <= 12; $m++) {
    $sqlUserMonth = 'select * from ' . _TABLE_USERS .' where MONTH(signup_date) = '.$m.' AND YEAR(signup_date) = '.date("Y");
    $check_email_query = db_query($sqlUserMonth);
    $countUsers[$m] = db_num_rows($check_email_query);
    
//    $sqlUserMonth = 'select SUM() from ' . _TABLE_USERS .' where MONTH(signup_date) = '.$m.' AND YEAR(signup_date) = '.date("Y");
//    $check_email_query = db_query($sql_check_email);
//    $countUsers[$m] = db_num_rows($check_email_query);
}

$smarty->assign('count_user',$countUsers);

$_html_main_content = $smarty->fetch('home/home.html');
?>