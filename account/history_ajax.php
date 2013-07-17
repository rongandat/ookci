<?php
userLoginCheck();

$doajax	=	$_POST['doajax'];

switch ($doajax) {
	case	'get_transaction_details':
		$transaction_id	=	(int)$_POST['transaction_id'];
		$transaction_data	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_TRANSACTIONS." WHERE transaction_id='".$transaction_id."' AND ( from_userid='".$login_userid."' OR  to_userid='".$login_userid."') "));
		$smarty->assign('transaction_data',$transaction_data);
		echo $smarty->fetch('account/view_transaction.html');

}

die();
?>