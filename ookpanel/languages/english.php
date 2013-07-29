<?php

	define('CHARSET','utf-8');
	define('_LANGUAGE_CODE','en');
	
	define('_ERROR_FIELD_EMPTY','This value cannot be empty.');
	define('_ERROR_FIELD_NOT_NUMBER','This value must be a number.');
	define('_ERROR_MAX_LENGTH_LIMIT',"This value can be no greater than %s characters (currently %s characters).");
	define('_ERROR_LENGTH_LIMIT',"This value must be around %s-%s characters length (currently %s characters).");
	
	define('_ERROR_MIN_LENGTH',"This value must be at least %s characters (currently %s characters).");
	define('_ERROR_REQUEST','Sorry! Your request cannot be processed by some reasons, please try again later.');

	
	$smarty->assign('WARNING_CONFIRM_MESSAGE','Do you want to continue?');	
	$smarty->assign('WARNING_DELETE_CONFIRM_MESSAGE','Are you sure you want to delete the item?');	
	define('WARNING_DELETE_CONFIRM_MESSAGE','Are you sure you want to delete the item?');
	
	// MENUS DEFINE
	define('MNU_ADMIN_ACCOUNTS','Admin Accounts');
	define('MNU_ADMIN_INFORMATIONS','Informations');
	define('MNU_ADMIN_NEWS','News');
	define('MNU_ADMIN_SETTINGS','Settings');
	define('MNU_ADMIN_EMAILTEMPLATES','Email Templates');
	define('MNU_ADMIN_LANGUAGES','Languages');
	define('MNU_ADMIN_FAQS','FAQs');
	define('MNU_ADMIN_SECURITY_QUESTIONS','Security Questions');
	define('MNU_ADMIN_CURRENCIES','Currencies');	
	define('MNU_ADMIN_ADD_FUNDS','Add Funds');
	define('MNU_ADMIN_TRANSACTIONS','Transactions');
	define('MNU_ADMIN_USERS','Users');
	// BUTTONS DEFINE
	
	$smarty->assign('BUTTON_SUBMIT','Submit');
	$smarty->assign('BUTTON_CANCEL','Cancel');	
	
	$smarty->assign('ACTION_EDIT','Edit');	
	$smarty->assign('ACTION_DELETE','Delete');	
	$smarty->assign('ACTION_VIEW','View');
	$smarty->assign('TEXT_ACTION','Actions');
	$smarty->assign('BUTTON_CONFIRM','Confirm');
	$smarty->assign('TEXT_ACTIVE','Active');
	$smarty->assign('TEXT_INACTIVE','Inactive');	
	$smarty->assign('TEXT_YES','Yes');
	$smarty->assign('TEXT_NO','No');	
	
	define('TEXT_WELCOME','Welcome, ');
	define('TEXT_LOGOUT','LogOut');
	define('TEXT_INACTIVE','Inactive');
	define('TEXT_ACTIVE','Active');
	define('TEXT_YES','Yes');
	define('TEXT_NO','No');
		
?>