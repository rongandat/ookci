<?php
$resetcode_sent	=	false;
if ($_POST['action']=='process') {	

		$security_code	=	db_prepare_input($_POST['security_code']);
		
		if ($security_code	==	$secure_image_hash_string) {
			$email	=	db_prepare_input($email);
			
			$account_number	= db_prepare_input($_POST['account_number']);//edit by donghp
			
			if ($validator->validateEmail('E-mail',$email,ERROR_EMAIL_ADDRESS) ) {
			 	$sql_check_info="SELECT user_id, firstname, lastname FROM ". _TABLE_USERS." WHERE (email='".$email."') and (account_number='".$account_number."')";
				$check_info_query	=	db_query($sql_check_info);
				if (db_num_rows($check_info_query)==0) { // email existed
					$validator->addError('Account Number/E-mail',"Invalid account number/e-mail.");
				} 
			}			

		}else {
			$validator->addError('Turing Number',ERROR_SECURE_CODE_WRONG);				
		}			
			
		if (count($validator->errors)==0 ) {   // found email => send account number to the email

			//$account_info	=	db_fetch_array($sql_check_info); //add by donghp 27/03/2012
			
			$account_info= db_fetch_array(db_query($sql_check_info));
			
						
			$email_info	=	get_email_template('RESET_PASSWORD_CODE');	
			
			//$firstname	=	$user_info['firstname'];
					
			$msg_subject	=	$email_info['emailtemplate_subject'];
			$reset_code		=	tep_create_random_value(10,'digits');
			
			
			
			$msg_content	=	str_replace(array('[firstname]','[reset_code]'),array($account_info['firstname'], $reset_code),$email_info['emailtemplate_content']);
				
			$msg_content	=  html_entity_decode($msg_content);//add by donghp 26/03/2012
			 		
			tep_mail($account_info['firstname'].' '.$account_info['lastname'],$email,$msg_subject, $msg_content,SITE_NAME,SITE_CONTACT_EMAIL );							
			$resetcode_sent	=	true;

		} else {
			postAssign($smarty);			
		}

}	

if (!$resetcode_sent) {	
	$smarty->assign('validerrors',$validator->errors);		
	$_html_main_content = $smarty->fetch('home/reset_password.html');
} else {
	$smarty->assign('email',$email);
	$_html_main_content = $smarty->fetch('home/reset_password_sent.html');	
}
?>