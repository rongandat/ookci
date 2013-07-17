<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$newsid	=	$_POST['newsid'];
			$newsinfo	=	db_fetch_array(db_query("SELECT news_id, news_title FROM "._TABLE_NEWS." WHERE news_id='".$newsid."'"));
			$smarty->assign('link_news',get_admin_link(PAGE_NEWS,tep_get_all_get_params(array('action','module','page','news_id'))));
			$smarty->assign('newsinfo',$newsinfo);
			echo $smarty->fetch('news/deleteform.html');
			break;
	}	
	die();
}
?>