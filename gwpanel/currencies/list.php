<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		
		switch ($action) {
			case	'deleteconfirm':
				$cID	=	$_POST['cID'];
				$sql_delete	=	"DELETE  FROM "._TABLE_CURRENCIES." WHERE currencies_id='".$cID."'";
				db_query($sql_delete);
				
				$feedbackmsgs[]	=	TEXT_MESSAGE_CURRENCY_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);				
				break;
						
		}		
		
		$smarty->assign('link_currencies',get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))) );		
		$smarty->assign('link_new_currency',get_admin_link(PAGE_CURRENCY_NEW,tep_get_all_get_params(array('action','module','page'))) );
		$smarty->assign('link_currency_edit',get_admin_link(PAGE_CURRENCY_EDIT,tep_get_all_get_params(array('action','module','page'))) );		
		
		$sql_currencies	=	"SELECT * FROM "._TABLE_CURRENCIES." WHERE 1 $where_filter ";
		$sql_currencies_page	=	"SELECT * FROM "._TABLE_CURRENCIES." WHERE 1 $where_filter ORDER BY sort_order, title ASC";
		
		$currencies_query		=	db_query($sql_currencies);	
		$currency_numbers	=	 db_num_rows($currencies_query);
					
		$currencypage =& new Paginator($_GET['pg'],$currency_numbers);
		$currencypage->set_Limit(20);	
		$currencypage->pagename	=	get_admin_link(PAGE_CURRENCY_ACCOUNTS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$currencypage->set_Links(6);
		$limit1 = $currencypage->getRange1(); 
		$limit2 = $currencypage->getRange2(); 		
		
		$sql_currencies_page	.=	" LIMIT $limit1, $limit2";	
		$currency_page_query	=	db_query($sql_currencies_page);	
		
		// get smarty currencies list
		$currencies_array	=	array();
		while ($currency	=	db_fetch_array($currency_page_query) )
		{
			$currency['currency_url']	=	get_admin_link(PAGE_CURRENCY_EDIT,'currencies_id='.$currency['currencies_id']);	
			$currencies_array[]	=	$currency;
		}
		
		$smarty->assign('page_links',$currencypage->getPageLinks());							
		$smarty->assign('currencies',$currencies_array);
		
		$_html_main_content = $smarty->fetch('currencies/list.html');

?>