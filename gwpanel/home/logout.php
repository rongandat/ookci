<?php
	  include('includes/admin_login_check.php');

	  $admin_id	=	-1;	
	  tep_session_unregister('admin_login_id');
	  tep_session_unregister('admin_login_username');
		
		// delete the cookie
	  setcookie("admin_login_username", "", time( ) - 1,"/");	
	  setcookie("admin_login_password", "", time( ) - 1,"/");	
		 
	  $_html_main_content = $smarty->fetch('home/logout.html');
?>