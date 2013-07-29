<?php
	include('includes/admin_login_check.php');
	
	$smarty->assign('link_new_security_question',get_admin_link(PAGE_SECURITY_QUESTION_NEW,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_SECURITY_QUESTIONS,tep_get_all_get_params(array('action','module','page'))));

	$status_options	=	array(0 =>	TEXT_INACTIVE,
								 	1	=>	TEXT_ACTIVE
								);
	$smarty->assign('status_options',$status_options);				
																
	$languages	=	get_all_languages();
	$smarty->assign('languages', $languages);
	
	if ($_POST['action']=='process') {	
			$security_questions_name	=	db_prepare_input($_POST['security_questions_name']);			
			$status	=	isset($_POST['status']) ? (int)$_POST['status'] : 1; // active by default
			$sort_order	=	(int)$_POST['sort_order'];
			
			$validator->validateGeneral('Faq Name',$security_questions_name[$_SESSION['languages_id']],_ERROR_FIELD_EMPTY);	

			if (count($validator->errors)==0 ) { // create new member
				$security_question_data_array	=		array(
												'status'=>$status,
												'sort_order'	=> $sort_order,
											);
											
				db_perform(_TABLE_SECURITY_QUESTIONS,$security_question_data_array);		
				
				$security_question_id	=	db_insert_id();
				// security_question description
				for ($i=0; $i<count($languages); $i++)
				{
					$lang_id	=	$languages[$i]['id'];
					$security_question_description_data_array	=	array('language_id'	=> $lang_id,
															'security_questions_id'	=> $security_question_id,
															'question'	=> $security_questions_name[$lang_id],
																);
					db_perform(_TABLE_SECURITY_QUESTIONS_DESCRIPTION,$security_question_description_data_array);
				}
				
				tep_redirect(get_admin_link(PAGE_SECURITY_QUESTIONS,tep_get_all_get_params(array('action','module','page'))));
			} else {
				postAssign($smarty);						
				$smarty->assign('validerrors',$validator->errors);
			}	

	} 
		
	$_html_main_content = $smarty->fetch('security_questions/new.html');
?>