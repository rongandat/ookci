<?php

	$smarty->assign('HEADING_LIST_NEWS','News');
	$smarty->assign('LINK_NEW_NEWS','Create News');
	define('HEADING_NEW_INFO','Create News');
	define('HEADING_EDIT_INFO','Update News');
	
	$smarty->assign('LABEL_NEWS_TITLE','News Title');	
	$smarty->assign('LABEL_NEWS_DESCRIPTION','News Description');
	$smarty->assign('LABEL_NEWS_PATH','News Path/Url');
	$smarty->assign('LABEL_NEWS_DATE','News Date');
	$smarty->assign('LABEL_NEWS_TYPE','News Type');
	
	$smarty->assign('HEADER_NEWS_TITLE','News Title');
	$smarty->assign('HEADER_NEWS_TIME','News Date');
	
	$smarty->assign('LINK_UPDATE_NEWS','Auto Update News');
	$smarty->assign('LINK_UPDATE_NEWS_LIST','Update News List');
	$smarty->assign('','');
	
	define('ERROR_FIELD_NEWS_TITLE','News Title');
	define('ERROR_FIELD_NEWS_DESCRIPTION','News Description');
	define('ERROR_FIELD_NEWS_PATH','News Path');
	
	define('TEXT_NEWS_TYPE_STATIC','Static');
	define('TEXT_NEWS_TYPE_DYNAMIC','Dynamic');	
	$smarty->assign('HEADING_NEWS_LOG','Logs');
	
	
    define('MSG_NEWS_UPDATE_LIST_SUCCESS', 'The news list was updated successfully.');
	define('TEXT_MESSAGE_NEWS_DELETED','The news have been deleted.');
	
	// Smarty Langs
	$langs	=	array('BUTTON_CONFIRM'	=> 'Confirm',
					'TEXT_DELETE_CONFIRM_MESSAGE'	=>	'Are you sure you want to delete the news?'
					);
	
?>