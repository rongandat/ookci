<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$adminid	=	$_POST['adminid'];
			$admininfo	=	db_fetch_array(db_query("SELECT admin_id, admin_username FROM "._TABLE_ADMINS." WHERE admin_id='".$adminid."'"));
			$smarty->assign('link_admins',get_admin_link(PAGE_ADMIN_ACCOUNTS,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('admininfo',$admininfo);
			echo $smarty->fetch('admins/deleteform.html');
			break;
	}	
	die();
}
?>