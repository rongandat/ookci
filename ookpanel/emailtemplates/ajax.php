<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$emailtemplateid	=	$_POST['emailtemplateid'];
			$emailtemplateinfo	=	db_fetch_array(db_query("SELECT emailtemplates_id, emailtemplate_title FROM "._TABLE_EMAILTEMPLATES_DESCRIPTION."  WHERE emailtemplates_id='".$emailtemplateid."' AND language_id='".$_SESSION['languages_id']."'"));
			$smarty->assign('link_emailtemplates',get_admin_link(PAGE_EMAILTEMPLATES,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('emailtemplateinfo',$emailtemplateinfo);
			echo $smarty->fetch('emailtemplates/deleteform.html');
			break;
	}	
	die();
}
?>