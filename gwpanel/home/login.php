<?php

	// updated by Minhmt - 09/15/2007  - force login
	
	$smarty->assign('action_login',get_admin_link(PAGE_ADMIN_LOGIN,'action=access')); 
	
	if ($_GET['action']=='access') {	
		
			$login_password	=	db_prepare_input($_POST['password']);
			$login_username	=	db_prepare_input(trim($_POST['username']));
			
			$sql_admin =	"SELECT admin_id, admin_username, admin_password FROM ". _TABLE_ADMINS." WHERE admin_username='".$login_username."'";
			$admin_query	=	db_query($sql_admin);

			if (db_num_rows($admin_query)>0) { // email passed
				// check password
				$admin_info	=	db_fetch_array($admin_query);


				if (!validate_password($login_password, $admin_info['admin_password'])) {	// wrong password
					$validator->addError('Account',ERROR_INVALID_ACCOUNT);
				} else { // password passed ==> correct account
					$admin_login_id	=	$admin_info['admin_id'];
					$admin_login_username	=	$admin_info['admin_username'];
					
					tep_session_register('admin_login_id');
        			tep_session_register('admin_login_username');
		
					// set cookies for autologin
					
					if ($_POST['remember_me']) {
						
				///		tep_setcookie("login_email",$login_email	, time()+60*60*24*100, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);
					//	tep_setcookie("login_password",$login_password, time()+60*60*24*100, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);
						 setcookie("admin_login_username", $login_username, time()+60*60*24*30, "/");
    					 setcookie("admin_login_password", $login_password, time()+60*60*24*30, "/");	  
					}
						
										
					if (sizeof($navigation->snapshot) > 0) {
				
					  $origin_href = get_admin_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
					  $navigation->clear_snapshot();
					  tep_redirect($origin_href);
					} else {
					  tep_redirect(get_admin_link(PAGE_DEFAULT));
					}
			
				}
				
			} else {
				$validator->addError('Account',ERROR_INVALID_ACCOUNT);
			}
			
			if (count($validator->errors)==0 ) { // create new admin

			
			} else {
				postAssign($smarty);
				$smarty->assign('validerrors',$validator->errors);
			}		
		
		}
		
	$_html_main_content = $smarty->fetch('home/login.html');
		

?>