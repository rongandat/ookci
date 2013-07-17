<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$languageid	=	$_POST['languageid'];
			$languageinfo	=	db_fetch_array(db_query("SELECT language_id, language_name FROM "._TABLE_LANGUAGES." WHERE language_id='".$languageid."'"));
			$smarty->assign('link_languages',get_admin_link(PAGE_LANGUAGES,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('languageinfo',$languageinfo);
			echo $smarty->fetch('langs/deleteform.html');
			break;
	}	
	die();
}
?>