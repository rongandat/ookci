<?php
	include('includes/admin_login_check.php');

	$lID	=	(int)$_GET['lID'];
	
	$smarty->assign('link_edit_language',get_admin_link(PAGE_LANGUAGE_EDIT,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_LANGUAGES,tep_get_all_get_params(array('action','module','page'))));

	$status_options	=	array(0 =>	TEXT_INACTIVE,
								 	1	=>	TEXT_ACTIVE
								);
	$smarty->assign('status_options',$status_options);
	
	if ($_POST['action']=='process') {	
			$language_code	=	db_prepare_input($_POST['language_code']);
			
			$validator->validateGeneral('Language Name',$language_name,_ERROR_FIELD_EMPTY);
			$validator->validateGeneral('Language Code',$language_code,_ERROR_FIELD_EMPTY);
			$validator->validateGeneral('Language Directory',$language_directory,_ERROR_FIELD_EMPTY);
			$validator->validateGeneral('Language Icon',$language_image,_ERROR_FIELD_EMPTY);

				if (count($validator->errors)==0 ) { // create new member

				$language_data_array	=		array('language_code'=>$language_code,
													'language_name'=>$language_name,
													'language_directory'=>$language_directory,
													'language_image'=>$language_image,
													'language_status'=>$language_status,
													'sort_order'	=> $sort_order
																								
											);
				db_perform(_TABLE_LANGUAGES,$language_data_array,'update',"language_id='".$lID."'");
												
			
			tep_redirect(get_admin_link(PAGE_LANGUAGES,tep_get_all_get_params(array('action','module','page'))));
		} else {
			postAssign($smarty);
			$smarty->assign('validerrors',$validator->errors);
		}	

	}  else {	
			$language_info	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_LANGUAGES." WHERE language_id='".$lID."'"));
			postAssign($smarty, $language_info);
	}
		
	$_html_main_content = $smarty->fetch('langs/edit.html');
?>