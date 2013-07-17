<?php
include('includes/admin_login_check.php');

$doajax	=	$_POST['doajax'];

switch ($doajax) {
	case	'get_user_details':
		$user_id	=	(int)$_POST['user_id'];
		$user_data	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_USERS." WHERE user_id='".$user_id."'"));
		$smarty->assign('user_data',$user_data);
		echo $smarty->fetch('users/view.html');
		break;

	case	'edit_user':
		$user_id	=	(int)$_POST['user_id'];
		$user_data	=	db_fetch_array(db_query("SELECT user_id, firstname,lastname,email,phone,mobile, additional_information, account_number FROM "._TABLE_USERS." WHERE user_id='".$user_id."'"));
		$smarty->assign('user_data',$user_data);
		echo $smarty->fetch('users/edit.html');
		break;
}

die();
?>