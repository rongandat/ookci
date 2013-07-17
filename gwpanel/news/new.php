<?php
	include('includes/admin_login_check.php');

			
	$pg	=	$_GET['pg'];
	
	$news_id	=	$_GET['news_id'];
	$smarty->assign('action_link',get_admin_link(PAGE_NEWS_EDIT,'action=process&news_id='.$news_id,'&pg='.$pg));
	$smarty->assign('back_link',get_admin_link(PAGE_NEWS,'pg='.$pg));

	$news_type_options	=	array(0 =>	TEXT_NEWS_TYPE_STATIC,
								 	1	=>	TEXT_NEWS_TYPE_DYNAMIC
								);
	$smarty->assign('news_type_options',$news_type_options);
	$smarty->assign('news_type',1);
					
	// get news log
	$sql_news_log		=	"SELECT * FROM "._TABLE_NEWS." ORDER BY news_date DESC, news_title ASC LIMIT 5";
	$news_log_query	=	db_query($sql_news_log);
	$news_log_array	=	array();
	
	while ($news_log	=	db_fetch_array($news_log_query))
	{
		$news_log['news_url']	=	get_admin_link(PAGE_NEWS_EDIT,'news_id='.$news_log['news_id']);
		$news_log['news_date']	=	date('d M Y',strtotime($news_log['news_date']));
		$news_log_array[]	=	$news_log;
		
	}
	$smarty->assign('news_log',$news_log_array);
	// eof - get news log						
	
			
	if ($_GET['action']=='process') {
		
		$news_title	=	$_POST['news_title'];
		$news_description	=	$_POST['news_description'];
		$news_path	=	$_POST['news_path'];
		
		$news_year	=	$_POST['newsYear'];
		$news_month	=	$_POST['newsMonth'];
		$news_day	=	$_POST['newsDay'];
		$news_type	=	$_POST['news_type'];
		$news_status	=	$_POST['news_status'];
		
		$news_date	=	$news_year.'-'.$news_month.'-'.$news_day;
		$smarty->assign('news_date',$news_date);
		
		$validator->validateGeneral(ERROR_FIELD_NEWS_TITLE,$news_title, _ERROR_FIELD_EMPTY);
		
		if (!$news_type) {
			$validator->validateGeneral(ERROR_FIELD_NEWS_DESCRIPTION,$news_description, _ERROR_FIELD_EMPTY);
			$validator->validateGeneral(ERROR_FIELD_NEWS_PATH,$news_path,_ERROR_FIELD_EMPTY);	
		}
		
		if (!$validator->foundErrors()) {
			$news_data	=	array(	'news_title'	=>	$_POST['news_title'],
									'news_description'	=>	html_entity_decode($_POST['news_description']),
									'news_file_path'=>	db_prepare_input($news_path),
									'news_date'	=>	$news_date,
									'news_type'	=>db_prepare_input($news_type),
									'news_status'=>db_prepare_input($news_status)
								);
								
			if ($news_id>0) { // update 
				db_perform(_TABLE_NEWS, $news_data,'update','news_id='.$news_id);
			} else {
				db_perform(_TABLE_NEWS, $news_data);			
				$news_id	=	db_insert_id();
			}
			
			tep_redirect(get_admin_link(PAGE_NEWS,'pg='.$pg));
		} else {
			postAssign($smarty);
			$smarty->assign('news_description',html_entity_decode($news_description));
			$smarty->assign('validerrors',$validator->errors);
		}	

	} else {
		if ($news_id>0) {
			$sql_news	=	"SELECT * FROM "._TABLE_NEWS." WHERE news_id='".$news_id."'";
			$news	=	db_fetch_array(db_query($sql_news));
			$news['news_title']	=	$news['news_title'];			
			$news['news_description']	=	htmlentities($news['news_description']);
			$news['news_path']	=	$news['news_file_path'];
			$smarty->assign('PAGE_HEADING',HEADING_EDIT_INFO);
			postAssign($smarty, $news);
		
		} else {
		
			$smarty->assign('PAGE_HEADING',HEADING_NEW_INFO);
		
		}
	}
		
	$_html_main_content = $smarty->fetch('news/new.html');
?>