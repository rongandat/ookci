<?php
	include('includes/admin_login_check.php');
	
	$security_questionID	=	(int)$_GET['security_questionID'];
	
	$smarty->assign('link_edit_security_question',get_admin_link(PAGE_SECURITY_QUESTION_EDIT,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_SECURITY_QUESTIONS,tep_get_all_get_params(array('action','module','page'))));

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
			$security_questions_name	=	db_prepare_input($_POST['security_questions_name']);			
			$status	=	isset($_POST['status']) ? (int)$_POST['status'] : 1; // active by default
			$sort_order			=	(int)$_POST['sort_order'];
			
			$validator->validateGeneral(ERROR_SECURITY_QUESTION_NAME,$security_questions_name[$_SESSION['languages_id']],_ERROR_FIELD_EMPTY);

			if (count($validator->errors)==0 ) { // create new member
				$security_question_data_array	=		array(
													'status'=>$status,
													'sort_order'	=> $sort_order,
											);
											
				db_perform(_TABLE_SECURITY_QUESTIONS,$security_question_data_array,'update'," security_questions_id='".$security_questionID."'");	
				
				// security_question description
				for ($i=0; $i<count($languages); $i++)
				{
					$lang_id	=	$languages[$i]['id'];
					$security_question_description_data_array	=	array('question'	=> $security_questions_name[$lang_id],
														);
					db_perform(_TABLE_SECURITY_QUESTIONS_DESCRIPTION,$security_question_description_data_array,'update'," security_questions_id='".$security_questionID."' and language_id='".$lang_id."'");
				}
				
				tep_redirect(get_admin_link(PAGE_SECURITY_QUESTIONS,tep_get_all_get_params(array('action','module','page'))));
			} else {
				postAssign($smarty);					
				$smarty->assign('validerrors',$validator->errors);
			}	

	} else {
		$security_questioninfo	=	db_fetch_array(db_query("SELECT status, sort_order FROM  "._TABLE_SECURITY_QUESTIONS." WHERE security_questions_id='".$security_questionID."'"));
		postAssign($smarty,$security_questioninfo);		
		// get security_question details
		$security_questions_description_query	=	db_query("SELECT * FROM "._TABLE_SECURITY_QUESTIONS_DESCRIPTION." WHERE security_questions_id='".$security_questionID."'");
		while ($security_question_desc	=	db_fetch_array($security_questions_description_query))
		{
			$security_questions_description_info['security_questions_name'][$security_question_desc['language_id']]	=	$security_question_desc['question'];
		}
		
		postAssign($smarty,$security_questions_description_info);
	}
		
	$_html_main_content = $smarty->fetch('security_questions/edit.html');
?>