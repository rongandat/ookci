<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		$parent_id	=	isset($_REQUEST['parent_id']) ? (int)$_REQUEST['parent_id'] : 0;		
		
		switch ($action) {
			case	'deleteconfirm':
				$emailtemplate_id	=	(int)$_POST['emailtemplateID'];
				db_query("DELETE  FROM "._TABLE_EMAILTEMPLATES." WHERE emailtemplates_id='".$emailtemplate_id."'");
				db_query("DELETE  FROM "._TABLE_EMAILTEMPLATES_DESCRIPTION." WHERE emailtemplates_id='".$emailtemplate_id."'");				
				$feedbackmsgs[]	=	TEXT_MESSAGE_EMAILTEMPLATES_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);
				break;
						
		}		

		//Template generate
		$smarty->assign('link_emailtemplates',get_admin_link(PAGE_EMAILTEMPLATES,array('action','module','page') ));		
				
		$sql_emailtemplates	=	"select e.emailtemplates_id, ed.emailtemplate_title, emailtemplate_status, is_html_email from " . _TABLE_EMAILTEMPLATES . " e, " . _TABLE_EMAILTEMPLATES_DESCRIPTION . " ed where e.emailtemplates_id = ed.emailtemplates_id and ed.language_id = '" . (int)$languages_id . "' ";
		$sql_emailtemplates_page	=	$sql_emailtemplates." order by emailtemplate_title, emailtemplate_key ";		
	
		$emailtemplates_query		=	db_query($sql_emailtemplates);	
		$emailtemplate_numbers	=	 db_num_rows($emailtemplates_query);
					
		$emailtemplatepage =& new Paginator($_GET['pg'],$emailtemplate_numbers);
		$emailtemplatepage->set_Limit(20);	
		$emailtemplatepage->pagename	=	get_admin_link(PAGE_SETTINGS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$emailtemplatepage->set_Links(6);
		$limit1 = $emailtemplatepage->getRange1(); 
		$limit2 = $emailtemplatepage->getRange2(); 		
		
		$sql_emailtemplates_page	.=	" LIMIT $limit1, $limit2";	
		$emailtemplate_page_query	=	db_query($sql_emailtemplates_page);	
		
		// get smarty emailtemplates list
		$emailtemplates_array	=	array();
		while ($emailtemplate	=	db_fetch_array($emailtemplate_page_query) )
		{
			$emailtemplates_array[]	=	$emailtemplate;
		}
		
		$smarty->assign('page_links',$emailtemplatepage->getPageLinks());							
		$smarty->assign('emailtemplates',$emailtemplates_array);
		
		$_html_main_content = $smarty->fetch('emailtemplates/list.html');

?>