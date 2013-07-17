<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_GET['action'];
		
		switch ($action) {
			case	'deleteconfirm':
				$admin_id	=	$_GET['adminid'];
				$sql_delete	=	"DELETE  FROM "._TABLE_ADMINS." WHERE admin_id='".$admin_id."'";
				db_query($sql_delete);
				
				$feedbackmsgs[]	=	TEXT_MESSAGE_ADMIN_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);				
				break;
						
		}		
		
		$smarty->assign('link_new_admin',get_admin_link(PAGE_ADMIN_NEW,'pg='.$_GET['pg']));
		$smarty->assign('link_admins',get_admin_link(PAGE_ADMIN_ACCOUNTS,'pg='.$_GET['pg']));		
		
		$sql_admins	=	"SELECT * FROM "._TABLE_ADMINS." WHERE 1 $where_filter ";
		$sql_admins_page	=	"SELECT * FROM "._TABLE_ADMINS." WHERE 1 $where_filter ORDER BY admin_id ASC";
		
		$admins_query		=	db_query($sql_admins);	
		$admin_numbers	=	 db_num_rows($admins_query);
					
		$adminpage =& new Paginator($_GET['pg'],$admin_numbers);
		$adminpage->set_Limit(20);	
		$adminpage->pagename	=	get_admin_link(PAGE_ADMIN_ACCOUNTS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$adminpage->set_Links(6);
		$limit1 = $adminpage->getRange1(); 
		$limit2 = $adminpage->getRange2(); 		
		
		$sql_admins_page	.=	" LIMIT $limit1, $limit2";	
		$admin_page_query	=	db_query($sql_admins_page);	
		
		// get smarty admins list
		$admins_array	=	array();
		while ($admin	=	db_fetch_array($admin_page_query) )
		{
			$admin['admin_url']	=	get_admin_link(PAGE_ADMIN_EDIT,'admin_id='.$admin['admin_id']);	
			$admins_array[]	=	$admin;
		}
		
		$smarty->assign('page_links',$adminpage->getPageLinks());							
		$smarty->assign('admins',$admins_array);
		
		$_html_main_content = $smarty->fetch('admins/list.html');

?>