<?php
	tep_session_unregister('login_userid');
	tep_session_unregister('login_account_number');	
	tep_session_unregister('login_useremail');		  
	tep_session_unregister('navigation');
	tep_session_unregister('login_main_account_info');	  
	  	
	// delete the cookie
	tep_setcookie("account_number",$account_number	, time() -1, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);
	tep_setcookie("password",$login_password, time() -1, HTTP_COOKIE_PATH, HTTP_COOKIE_DOMAIN);			 
	tep_redirect(get_href_link(PAGE_DEFAULT));	
?>