<?php
		include('includes/admin_login_check.php');
		include(_CLASSES_DIR.'paginator.php');
		
		// define numbers of latest news should be shown on news details page
		define('MAX_LATEST_NEWS',20);		
		define('NEWS_LIST_TEMPLATE_FILE',_ADMIN_ROOT.'templates/news/news_list_template.htm');
		define('NEWS_LIST_FILE','index.htm');
		

		$action	=	$_GET['action'];
		
		switch ($action) {
			case	'deleteconfirm':
				$news_id	=	$_GET['news_id'];
				$sql_delete	=	"DELETE  FROM "._TABLE_NEWS." WHERE news_id='".$news_id."'";
				db_query($sql_delete);
				$feedbackmsgs[]	=	TEXT_MESSAGE_NEWS_DELETED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);
				break;
			
		}
		
		
		
		$smarty->assign('link_new_news',get_admin_link(PAGE_NEWS_NEW,'pg='.$_GET['pg']));
		$smarty->assign('link_news',get_admin_link(PAGE_NEWS,'pg='.$_GET['pg']));
		$smarty->assign('link_update_news',get_admin_link(PAGE_NEWS,'action=update&pg='.$_GET['pg']));
		

		
		$sql_news	=	"SELECT * FROM "._TABLE_NEWS." WHERE 1 $where_filter ";
		$sql_news_page	=	"SELECT * FROM "._TABLE_NEWS." WHERE 1 $where_filter ORDER BY  news_date DESC, news_id DESC, news_title ASC";
		
		$news_query		=	db_query($sql_news);	
		$news_numbers	=	 db_num_rows($news_query);
					
		$newspage =& new Paginator($_GET['pg'],$news_numbers);
		$newspage->set_Limit(20);	
		$newspage->pagename	=	get_admin_link(PAGE_NEWS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$newspage->set_Links(6);
		$limit1 = $newspage->getRange1(); 
		$limit2 = $newspage->getRange2(); 		
		
		$sql_news_page	.=	" LIMIT $limit1, $limit2";	
		$news_page_query	=	db_query($sql_news_page);	
		
		// get smarty news list
		$news_array	=	array();
		while ($news	=	db_fetch_array($news_page_query) )
		{
			$news['news_url']	=	get_admin_link(PAGE_NEWS_EDIT,'news_id='.$news['news_id']);	
			$news['news_date']	=	date('d M Y',strtotime($news['news_date']));			
			$news_array[]	=	$news;
		}
		
		$smarty->assign('page_links',$newspage->getPageLinks());							
		$smarty->assign('news',$news_array);
		
		$_html_main_content = $smarty->fetch('news/list.html');

?>