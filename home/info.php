<?php

	// get info content
	$info_key	=	db_prepare_input($_GET['info_key']);
	
	$sql_info	=	"SELECT  info_title, info_content FROM "._TABLE_INFO_TEMPLATES." WHERE info_key='".$info_key."'";
	$info	=	db_fetch_array(db_query($sql_info));
	
	$smarty->assign('title',stripslashes($info['info_title']));
	$smarty->assign('content',stripslashes($info['info_content']));
	$_html_main_content = $smarty->fetch('home/info.html');
	
?>