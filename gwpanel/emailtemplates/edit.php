<?php
	include('includes/admin_login_check.php');
	
	$emailtemplateID	=	(int)$_GET['emailtemplateID'];
	
	$smarty->assign('link_edit_emailtemplate',get_admin_link(PAGE_EMAILTEMPLATE_EDIT,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_EMAILTEMPLATES,tep_get_all_get_params(array('action','module','page'))));

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
			$emailtemplate_key		=	db_prepare_input($_POST['emailtemplate_key']);
			$emailtemplates_title	=	db_prepare_input($_POST['emailtemplates_title']);
			$emailtemplates_subject	=	db_prepare_input($_POST['emailtemplates_subject']);						
			$emailtemplates_content	=	$_POST['emailtemplates_content'];			
			
			$emailtemplate_status	=	(int)$_POST['emailtemplate_status'];
			$sort_order	=	(int)$_POST['sort_order'];
			$is_topic	=	(int)$_POST['is_topic'];
			
			$validator->validateGeneral('Template Key',$emailtemplate_key,_ERROR_FIELD_EMPTY);							
			$validator->validateGeneral('Template Title',$emailtemplates_title[$languages_id],_ERROR_FIELD_EMPTY);	
			$validator->validateGeneral('Template Subject',$emailtemplates_subject[$languages_id],_ERROR_FIELD_EMPTY);	
			$validator->validateGeneral('Template Content',$emailtemplates_content[$languages_id],_ERROR_FIELD_EMPTY);		

			if (count($validator->errors)==0 ) { // create new member
				$emailtemplate_data_array	=		array(
												'emailtemplate_key'	=> $emailtemplate_key,
												'emailtemplate_status'=>$emailtemplate_status,
												'is_html_email'	=> $is_html_email																								
											);
											
				db_perform(_TABLE_EMAILTEMPLATES,$emailtemplate_data_array,'update'," emailtemplates_id='".$emailtemplateID."'");	
				
				// emailtemplate description
				for ($i=0; $i<count($languages); $i++)
				{
					$lang_id	=	$languages[$i]['id'];
					$emailtemplate_description_data_array	=	array('language_id'	=> $lang_id,
															'emailtemplate_title'	=> $emailtemplates_title[$lang_id],															
															'emailtemplate_subject'	=> $emailtemplates_subject[$lang_id],
															'emailtemplate_content'=> $emailtemplates_content[$lang_id]
																);
					db_perform(_TABLE_EMAILTEMPLATES_DESCRIPTION,$emailtemplate_description_data_array,'update'," emailtemplates_id='".$emailtemplateID."' and language_id='".$lang_id."'");
				}
				
				tep_redirect(get_admin_link(PAGE_EMAILTEMPLATES,tep_get_all_get_params(array('action','module','page'))));
			} else {
				postAssign($smarty);
				for ($i=0; $i<count($languages); $i++)
				{
					$emailtemplates_content[$languages[$i]['id']]	=	html_entity_decode($_POST['emailtemplates_content'][$languages[$i]['id']]);
					$smarty->assign('emailtemplates_content',$emailtemplates_content);
										
					$emailtemplates_usage[$languages[$i]['id']]	=	$_POST['emailtemplates_usage'][$languages[$i]['id']];
					$smarty->assign('emailtemplates_usage',$emailtemplates_usage);					
					$emailtemplates_subject[$languages[$i]['id']]	=	$_POST['emailtemplates_subject'][$languages[$i]['id']];
					$smarty->assign('emailtemplates_subject',$emailtemplates_subject);					
					$emailtemplates_title[$languages[$i]['id']]	=	$_POST['emailtemplates_title'][$languages[$i]['id']];
					$smarty->assign('emailtemplates_title',$emailtemplates_title);		;
				}			
				$smarty->assign('validerrors',$validator->errors);
			}	

	} else {
		$emailtemplateinfo	=	db_fetch_array(db_query("SELECT * FROM  "._TABLE_EMAILTEMPLATES." WHERE emailtemplates_id='".$emailtemplateID."'"));
		postAssign($smarty,$emailtemplateinfo);		
		// get emailtemplate details
		$emailtemplates_description_query	=	db_query("SELECT * FROM "._TABLE_EMAILTEMPLATES_DESCRIPTION." WHERE emailtemplates_id='".$emailtemplateID."'");
		while ($emailtemplate_desc	=	db_fetch_array($emailtemplates_description_query))
		{
			$emailtemplates_description_info['emailtemplates_title'][$emailtemplate_desc['language_id']]	=	$emailtemplate_desc['emailtemplate_title'];
			$emailtemplates_description_info['emailtemplates_subject'][$emailtemplate_desc['language_id']]	=	$emailtemplate_desc['emailtemplate_subject'];			
			$emailtemplates_description_info['emailtemplates_content'][$emailtemplate_desc['language_id']]	=	htmlentities($emailtemplate_desc['emailtemplate_content']);						
		}
		
		postAssign($smarty,$emailtemplates_description_info);
	}
		
	$_html_main_content = $smarty->fetch('emailtemplates/edit.html');
?>