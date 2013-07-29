<?php
		include('includes/admin_login_check.php');
		
		include(_CLASSES_DIR.'paginator.php');
		if ($_GET['action']=='delete') {
			$info_id	=	$_GET['info_id'];
			$sql_delete	=	"DELETE  FROM "._TABLE_INFO_TEMPLATES." WHERE info_id='".$info_id."'";
			db_query($sql_delete);
		}
		
		$smarty->assign('link_new_info',get_admin_link(PAGE_NEW_INFO,'pg='.$_GET['pg']));
		$smarty->assign('link_infos',get_admin_link(PAGE_INFORS,'pg='.$_GET['pg']));
		
		
		$sql_infos	=	"SELECT * FROM "._TABLE_INFO_TEMPLATES." WHERE 1 $where_filter ";
		$sql_infos_page	=	"SELECT * FROM "._TABLE_INFO_TEMPLATES." WHERE 1 $where_filter ORDER BY info_key";
		
		$infos_query		=	db_query($sql_infos);	
		$info_numbers	=	 db_num_rows($infos_query);
					
		$infopage =& new Paginator($_GET['pg'],$info_numbers);
		$infopage->set_Limit(20);	
		$infopage->pagename	=	get_admin_link(PAGE_INFORS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$infopage->set_Links(6);
		$limit1 = $infopage->getRange1(); 
		$limit2 = $infopage->getRange2(); 		
		
		$sql_infos_page	.=	" LIMIT $limit1, $limit2";	
		$info_page_query	=	db_query($sql_infos_page);	
		
		// get smarty infos list
		$infos_array	=	array();
		while ($info	=	db_fetch_array($info_page_query) )
		{
			$info['info_url']	=	get_admin_link(PAGE_EDIT_INFO,'info_id='.$info['info_id']);				
			$infos_array[]	=	$info;
		}
		
		$smarty->assign('page_links',$infopage->getPageLinks());							
		$smarty->assign('infors',$infos_array);
		
		$_html_main_content = $smarty->fetch('infors/list.html');

?>