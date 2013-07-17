<?php
	$langs	=	array('HEADING_EDIT_ADMIN_ACCOUNT'=> 'Edit Admin Account',
					'BUTTON_CONFIRM'	=>'Confirm',
					'BUTTON_CANCEL'=>'Cancel',
					'TEXT_DELETE_CONFIRM_MESSAGE'	=>	'Are you sure you want to delete the Admin account?'
				);
	
	define('TEXT_MESSAGE_ADMIN_DELETED','The admin account have been removed.');
	
	$smarty->assign('HEADING_LIST_ADMIN_ACCOUNTS','Admin Accounts');
	$smarty->assign('LINK_NEW_ADMIN','New Admin Account');
	$smarty->assign('HEADING_NEW_ADMIN_ACCOUNT','New Admin Account');
	
	$smarty->assign('LABEL_ADMIN_ACCOUNT_USERNAME','Admin Username');
	
	$smarty->assign('LABEL_ADMIN_ACCOUNT_NAME','Contact Name');
	$smarty->assign('LABEL_ADMIN_ACCOUNT_EMAIL','Admin Email');
	$smarty->assign('LABEL_ADMIN_ACCOUNT_PASSWORD','Admin Password');
	$smarty->assign('LABEL_ADMIN_ACCOUNT_CONFIRM_PASSWORD','Confirm Password');
	
	$smarty->assign('HEADER_ADMIN_USERNAME','Admin Username');
	$smarty->assign('HEADER_ADMIN_NAME','Contact Name');
	$smarty->assign('HEADER_ADMIN_EMAIL','Email');
	
	$smarty->assign('LABEL_ADMIN_ACCOUNT_CURRENT_PASSWORD','Current Password');
	
	$smarty->assign('','');
	$smarty->assign('','');
	
	define('ERROR_FIELD_ADMIN_PASSWORD','Admin Password');
	define('ERROR_FIELD_ADMIN_CONFIRM_PASSWORD','Confirm Password');	
	define('ERROR_FIELD_ADMIN_USERNAME','Admin Username');
	define('ERROR_FIELD_ADMIN_EMAIL','Admin Email');
	define('ERROR_FIELD_ADMIN_CONTACTNAME','Contact Name');
	define('ERROR_FIELD_CURRENT_PASSWORD','Current Password');
	define('ERROR_INVALID_CURRENT_PASSWORD','Invalid Current Password, Please check again');
	
    define('TEXT_INFO_ADMIN_UPDATED', 'The admin account have been changed successfully.');	
	
    define('_ERROR_EMAIL_ADDRESS','Please input correct email address');
	define('ERROR_ADMIN_USERNAME_NOT_AVAIABLE','Admin Username exist, please input new one');
	define('ERROR_CONFIRM_PASSWORD','Confirm password must be exactly the same as password');
	
?>