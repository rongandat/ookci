<?php
include('includes/admin_login_check.php');

$doajax	=	$_POST['doajax'];

switch ($doajax) {
	case	'get_transaction_details':
		$transaction_id	=	(int)$_POST['transaction_id'];
		$transaction_data	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_TRANSACTIONS." WHERE transaction_id='".$transaction_id."'"));
		$smarty->assign('transaction_data',$transaction_data);
		echo $smarty->fetch('transactions/view.html');

}

die();
?>