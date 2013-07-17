<?php
	include('includes/admin_login_check.php');
	
	$smarty->assign('link_new_faq',get_admin_link(PAGE_FAQ_NEW,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_FAQS,tep_get_all_get_params(array('action','module','page'))));

	$status_options	=	array(0 =>	TEXT_INACTIVE,
								 	1	=>	TEXT_ACTIVE
								);
	$smarty->assign('status_options',$status_options);
								
	$yesno_status_options	=	array(1 =>	TEXT_YES,
								 	0	=>	TEXT_NO
								);	
																
	$smarty->assign('yesno_status_options',$yesno_status_options);
	$languages	=	get_all_languages();
	$smarty->assign('languages', $languages);
	
	if ($_POST['action']=='process') {	
			$faqs_name	=	db_prepare_input($_POST['faqs_name']);
			$categorie_description	=	db_prepare_input($_POST['categorie_description']);
			
			$faq_status	=	(int)$_POST['faq_status'];
			$sort_order	=	(int)$_POST['sort_order'];
			$is_topic	=	(int)$_POST['is_topic'];
			
			$validator->validateGeneral('Faq Name',$faqs_name[$_SESSION['languages_id']],_ERROR_FIELD_EMPTY);	

			if (count($validator->errors)==0 ) { // create new member
				$faq_data_array	=		array('parent_id'=>(int)$_GET['parent_id'],
												'faqs_status'=>$faq_status,
												'sort_order'	=> $sort_order,
												'is_topic'	=> $is_topic																								
											);
											
				db_perform(_TABLE_FAQS,$faq_data_array);		
				
				$faq_id	=	db_insert_id();
				// faq description
				for ($i=0; $i<count($languages); $i++)
				{
					$lang_id	=	$languages[$i]['id'];
					$faq_description_data_array	=	array('language_id'	=> $lang_id,
															'faqs_id'	=> $faq_id,
															'faqs_name'	=> $faqs_name[$lang_id],
															'faqs_description'=> $faqs_description[$lang_id]
																);
					db_perform(_TABLE_FAQS_DESCRIPTION,$faq_description_data_array);
				}
				
				tep_redirect(get_admin_link(PAGE_FAQS,tep_get_all_get_params(array('action','module','page'))));
			} else {
				postAssign($smarty);
				for ($i=0; $i<count($languages); $i++)
				{
					$faqs_description[$languages[$i]['id']]	=	html_entity_decode($_POST['faqs_description'][$languages[$i]['id']]);
					$smarty->assign('faqs_description',$faqs_description);
				}			
				$smarty->assign('validerrors',$validator->errors);
			}	

	} 
		
	$_html_main_content = $smarty->fetch('faqs/new.html');
?>