<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		
		switch ($action) {
			case	'deleteconfirm':
				$lID	=	$_POST['lID'];
				$sql_delete	=	"DELETE  FROM "._TABLE_LANGUAGES." WHERE language_id='".$lID."'";
				db_query($sql_delete);
				
				$feedbackmsgs[]	=	TEXT_MESSAGE_LANGUAGE_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);				
				break;
						
		}		
		
		$smarty->assign('link_languages',get_admin_link(PAGE_LANGUAGES,tep_get_all_get_params(array('action','module','page'))) );		
		$smarty->assign('link_new_language',get_admin_link(PAGE_LANGUAGE_NEW,tep_get_all_get_params(array('action','module','page'))) );
		$smarty->assign('link_language_edit',get_admin_link(PAGE_LANGUAGE_EDIT,tep_get_all_get_params(array('action','module','page'))) );		
		
		$sql_languages	=	"SELECT * FROM "._TABLE_LANGUAGES." WHERE 1 $where_filter ";
		$sql_languages_page	=	"SELECT * FROM "._TABLE_LANGUAGES." WHERE 1 $where_filter ORDER BY sort_order, language_name ASC";
		
		$languages_query		=	db_query($sql_languages);	
		$language_numbers	=	 db_num_rows($languages_query);
					
		$languagepage =& new Paginator($_GET['pg'],$language_numbers);
		$languagepage->set_Limit(20);	
		$languagepage->pagename	=	get_admin_link(PAGE_LANGUAGE_ACCOUNTS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$languagepage->set_Links(6);
		$limit1 = $languagepage->getRange1(); 
		$limit2 = $languagepage->getRange2(); 		
		
		$sql_languages_page	.=	" LIMIT $limit1, $limit2";	
		$language_page_query	=	db_query($sql_languages_page);	
		
		// get smarty languages list
		$languages_array	=	array();
		while ($language	=	db_fetch_array($language_page_query) )
		{
			$language['language_url']	=	get_admin_link(PAGE_LANGUAGE_EDIT,'language_id='.$language['language_id']);	
			$languages_array[]	=	$language;
		}
		
		$smarty->assign('page_links',$languagepage->getPageLinks());							
		$smarty->assign('languages',$languages_array);
		
		$_html_main_content = $smarty->fetch('langs/list.html');

?>