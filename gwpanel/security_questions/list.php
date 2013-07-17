<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		
		switch ($action) {
			case	'deleteconfirm':
				$security_question_id	=	(int)$_POST['security_questionID'];
				db_query("DELETE  FROM "._TABLE_SECURITY_QUESTIONS." WHERE security_questions_id='".$security_question_id."'");
				db_query("DELETE  FROM "._TABLE_SECURITY_QUESTIONS_DESCRIPTION." WHERE security_questions_id='".$security_question_id."'");				
				$feedbackmsgs[]	=	TEXT_MESSAGE_SECURITY_QUESTIONS_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);
				break;
						
		}		

		$smarty->assign('security_questions_tree',$security_questions_tree);
	
		//Template generate
		$smarty->assign('link_security_questions',get_admin_link(PAGE_SECURITY_QUESTIONS,array('action','module','page') ));		
		$smarty->assign('link_security_question_new',get_admin_link(PAGE_SECURITY_QUESTION_NEW,tep_get_all_get_params(array('action','module','page'))).'&action=new' );
		$smarty->assign('link_security_question_edit',get_admin_link(PAGE_SECURITY_QUESTION_EDIT,tep_get_all_get_params(array('action','module','page'))) );	
				
		$sql_security_questions	=	"select c.security_questions_id, cd.question, sort_order, status from " . _TABLE_SECURITY_QUESTIONS . " c, " . _TABLE_SECURITY_QUESTIONS_DESCRIPTION . " cd where c.security_questions_id = cd.security_questions_id and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'  ";
		$sql_security_questions_page	=	$sql_security_questions." order by cd.question  ";		
	
		$security_questions_query		=	db_query($sql_security_questions);	
		$security_question_numbers	=	 db_num_rows($security_questions_query);
					
		$security_questionpage =& new Paginator($_GET['pg'],$security_question_numbers);
		$security_questionpage->set_Limit(20);	
		$security_questionpage->pagename	=	get_admin_link(PAGE_SETTINGS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$security_questionpage->set_Links(6);
		$limit1 = $security_questionpage->getRange1(); 
		$limit2 = $security_questionpage->getRange2(); 		
		
		$sql_security_questions_page	.=	" LIMIT $limit1, $limit2";	
		$security_question_page_query	=	db_query($sql_security_questions_page);	
		
		// get smarty security_questions list
		$security_questions_array	=	array();
		while ($security_question	=	db_fetch_array($security_question_page_query) )
		{
			$security_questions_array[]	=	$security_question;
		}
		
		$smarty->assign('page_links',$security_questionpage->getPageLinks());							
		$smarty->assign('security_questions',$security_questions_array);
		
		$_html_main_content = $smarty->fetch('security_questions/list.html');

?>