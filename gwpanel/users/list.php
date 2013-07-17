<?php
	include('includes/admin_login_check.php');

	include(_CLASSES_DIR.'paginator.php');

	$action	=	$_POST['action'];
	
			
	switch ($action) {	
		case 'save':
			$user_id	=	$_POST['user_id'];
			$account_number=	$_POST['account_number'];
			$firstname	=	$_POST['firstname'];
			$lastname	=	$_POST['lastname'];
			$email		=	$_POST['email'];
			$mobile		=	$_POST['mobile'];
			$phone		=	$_POST['phone'];
			$additional_information	=	$_POST['additional_information'];
			
			$user_data_array	=	array('firstname'	=> db_prepare_input($firstname),
										'lastname'	=>	db_prepare_input($lastname),
										'email'	=>	db_prepare_input($email),
										'mobile'	=>	$mobile,
										'phone'		=>	$phone,
										'additional_information'	=>	$additional_information
									);
									
			db_perform(_TABLE_USERS,$user_data_array,'update',"user_id='".db_prepare_input($user_id)."'");
			
			$smarty->assign('feedback_message','User(#'.$account_number.') information have been updated successfully!');
			
			break;
		case 'process_search':			
			$account_number	=	db_prepare_input($_POST['account_number']);
			$keyword	=	db_prepare_input($_POST['keyword']);
			
			if (tep_not_null($account_number)) $where_filter	.= " AND account_number	=	'".$account_number."' ";
			if (tep_not_null($keyword)) $where_filter	.= " AND (firstname LIKE '".$keyword."%' OR lastname LIKE '".keyword."%' OR account_name LIKE '".$keyword."%')";												
			postAssign($smarty);
			break;			
	}		
	
	$smarty->assign('link_user',get_admin_link(PAGE_USERS,tep_get_all_get_params(array('action','module','page'))) );		
	
	$sql_user	=	"SELECT * FROM "._TABLE_USERS." WHERE 1 $where_filter ";
	$sql_user_page	=	"SELECT * FROM "._TABLE_USERS." WHERE 1 $where_filter ORDER BY signup_date DESC, account_name ASC, firstname ASC, lastname ASC ";
	
	$user_query		=	db_query($sql_user);	
	$user_numbers	=	 db_num_rows($user_query);
				
	$userpage =& new Paginator($_GET['pg'],$user_numbers);
	$userpage->set_Limit(25);	
	$userpage->pagename	=	get_admin_link(PAGE_USERS,tep_get_all_get_params(array('pg', 'x', 'y','action','module','page')));
	
	$userpage->set_Links(6);
	$limit1 = $userpage->getRange1(); 
	$limit2 = $userpage->getRange2(); 		
	
	$sql_user_page	.=	" LIMIT $limit1, $limit2";	
	$user_page_query	=	db_query($sql_user_page);	
	
	// get smarty user list
	$user_array	=	array();
	while ($user	=	db_fetch_array($user_page_query) )
	{
		$users_array[]	=	$user;
	}
	
	$smarty->assign('page_links',$userpage->getPageLinks());							
	$smarty->assign('users',$users_array);
	
// get all user users
$_html_main_content = $smarty->fetch('users/list.html');
?>