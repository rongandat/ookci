<?php
	include('includes/admin_login_check.php');

	$pg	=	$_GET['pg'];
	
	$smarty->assign('action_link',get_admin_link(PAGE_ADMIN_NEW,'action=process'));
	$smarty->assign('back_link',get_admin_link(PAGE_ADMIN_ACCOUNTS,'pg='.$pg));

	
	if ($_GET['action']=='process') {	
			$admin_username	=	db_prepare_input(trim($_POST['admin_username']));
			$admin_contactname	=	db_prepare_input(trim($_POST['admin_contactname']));
			$admin_email	=	db_prepare_input($_POST['admin_email']);
			$admin_password	=	db_prepare_input(trim($_POST['admin_password']));
			$confirm_password	=	db_prepare_input(trim($_POST['confirm_password']));
		
			if ($validator->validateGeneral(ERROR_FIELD_ADMIN_USERNAME,$admin_username,_ERROR_FIELD_EMPTY)) // checking avaiable nickname
			{
				// check if the email avaible
				$sql_username=	"SELECT admin_id	FROM ". _TABLE_ADMINS." WHERE admin_username='".$admin_username."'";
				if (db_num_rows(db_query($sql_username))>0) { // email existed
					$validator->addError(ERROR_FIELD_ADMIN_USERNAME,ERROR_ADMIN_USERNAME_NOT_AVAIABLE);
				}
			}
			
			$validator->validateGeneral(ERROR_FIELD_ADMIN_CONTACTNAME,$admin_contactname,_ERROR_FIELD_EMPTY);

			$validator->validateEmail(ERROR_FIELD_ADMIN_EMAIL,$admin_email,_ERROR_EMAIL_ADDRESS);
			
			if ($validator->validateMinLength(ERROR_FIELD_ADMIN_PASSWORD,$admin_password,5,sprintf(_ERROR_MIN_LENGTH,5, strlen($admin_password))) ) {			
				$validator->validateEqual(ERROR_FIELD_ADMIN_CONFIRM_PASSWORD,$admin_password,$confirm_password,ERROR_CONFIRM_PASSWORD);
			}

			if (count($validator->errors)==0 ) { // create new member

						
				// create new admin info
				$admin_data_array	=		array(	'admin_username'=>$admin_username,
													'admin_contactname'=>$admin_contactname,
													'admin_email'=>$admin_email,
													'admin_password'=>encrypt_password($admin_password),
											
											);
				db_perform(_TABLE_ADMINS,$admin_data_array);
												
			
			tep_redirect(get_admin_link(PAGE_ADMIN_ACCOUNTS,'pg='.$pg));
		} else {
			postAssign($smarty);
			$smarty->assign('validerrors',$validator->errors);
		}	

	} 
		
	$_html_main_content = $smarty->fetch('admins/new.html');
?>