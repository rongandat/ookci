<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$security_questionid	=	$_POST['security_questionid'];
			$security_questioninfo	=	db_fetch_array(db_query("SELECT security_questions_id, question FROM "._TABLE_SECURITY_QUESTIONS_DESCRIPTION."  WHERE security_questions_id='".$security_questionid."' AND language_id='".$_SESSION['languages_id']."'"));
			$smarty->assign('link_security_questions',get_admin_link(PAGE_SECURITY_QUESTIONS,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('security_questioninfo',$security_questioninfo);
			echo $smarty->fetch('security_questions/deleteform.html');
			break;
	}	
	die();
}
?>