<?php

	// get FAQs 
	$sql_faqs	=	"SELECT question_title, answer FROM "._TABLE_FAQS." WHERE question_status ORDER BY question_order,question_title  ";
	$faqs_query	=	db_query($sql_faqs);
	$faqs_array	=	array();
	
	while ($faq	=	db_fetch_array($faqs_query))
	{
		$faqs_array[]	=	$faq;
	}
	
	$smarty->assign('faqs',$faqs_array);
	$_html_main_content = $smarty->fetch('home/faqs.html');
?>