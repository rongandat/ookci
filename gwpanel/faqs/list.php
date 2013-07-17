<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		$parent_id	=	isset($_REQUEST['parent_id']) ? (int)$_REQUEST['parent_id'] : 0;		
		
		switch ($action) {
			case	'deleteconfirm':
				$faq_id	=	(int)$_POST['faqID'];
				db_query("DELETE  FROM "._TABLE_FAQS." WHERE faqs_id='".$faq_id."'");
				db_query("DELETE  FROM "._TABLE_FAQS_DESCRIPTION." WHERE faqs_id='".$faq_id."'");				
				$feedbackmsgs[]	=	TEXT_MESSAGE_FAQS_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);
				break;
						
		}		
		// get faqs tree
		$faqs_tree	=	tep_get_faq_tree(0,' ');	

		$smarty->assign('faqs_tree',$faqs_tree);
		$smarty->assign('parent_id',$parent_id);		
	
		//Template generate
		$smarty->assign('link_faqs',get_admin_link(PAGE_FAQS,array('action','module','page') ));		
		$smarty->assign('link_faq_new',get_admin_link(PAGE_FAQ_NEW,tep_get_all_get_params(array('action','module','page'))).'&action=new' );
		$smarty->assign('link_faq_edit',get_admin_link(PAGE_FAQ_EDIT,tep_get_all_get_params(array('action','module','page'))) );	
				
		$sql_faqs	=	"select c.faqs_id, cd.faqs_name, c.parent_id, sort_order, faqs_status, is_topic from " . _TABLE_FAQS . " c, " . _TABLE_FAQS_DESCRIPTION . " cd where c.faqs_id = cd.faqs_id and cd.language_id = '" . (int)$_SESSION['languages_id'] . "' and c.parent_id = '" . (int)$parent_id . "' ";
		$sql_faqs_page	=	$sql_faqs." order by is_topic DESC, c.sort_order, cd.faqs_name ";		
	
		$faqs_query		=	db_query($sql_faqs);	
		$faq_numbers	=	 db_num_rows($faqs_query);
					
		$faqpage =& new Paginator($_GET['pg'],$faq_numbers);
		$faqpage->set_Limit(20);	
		$faqpage->pagename	=	get_admin_link(PAGE_SETTINGS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$faqpage->set_Links(6);
		$limit1 = $faqpage->getRange1(); 
		$limit2 = $faqpage->getRange2(); 		
		
		$sql_faqs_page	.=	" LIMIT $limit1, $limit2";	
		$faq_page_query	=	db_query($sql_faqs_page);	
		
		// get smarty faqs list
		$faqs_array	=	array();
		while ($faq	=	db_fetch_array($faq_page_query) )
		{
			$faqs_array[]	=	$faq;
		}
		
		$smarty->assign('page_links',$faqpage->getPageLinks());							
		$smarty->assign('faqs',$faqs_array);
		
		$_html_main_content = $smarty->fetch('faqs/list.html');

?>