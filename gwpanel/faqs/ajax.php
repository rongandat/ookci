<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getDeleteForm':
			$faqid	=	$_POST['faqid'];
			$faqinfo	=	db_fetch_array(db_query("SELECT faqs_id, faqs_name FROM "._TABLE_FAQS_DESCRIPTION."  WHERE faqs_id='".$faqid."' AND language_id='".$_SESSION['languages_id']."'"));
			$smarty->assign('link_faqs',get_admin_link(PAGE_FAQS,tep_get_all_get_params(array('action','module','page'))));
			$smarty->assign('faqinfo',$faqinfo);
			echo $smarty->fetch('faqs/deleteform.html');
			break;
	}	
	die();
}
?>