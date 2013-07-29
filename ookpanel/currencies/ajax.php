<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$currencyid	=	$_POST['currencyid'];
			$currencyinfo	=	db_fetch_array(db_query("SELECT currencies_id, title FROM "._TABLE_CURRENCIES." WHERE currencies_id='".$currencyid."'"));
			$smarty->assign('link_currencies',get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('currencyinfo',$currencyinfo);
			echo $smarty->fetch('currencies/deleteform.html');
			break;
	}	
	die();
}
?>