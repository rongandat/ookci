<?php

	define('PAGE_DEFAULT','module=home');
	// Admin
	define('PAGE_ADMIN_LOGIN','module=home&page=login');	
	define('PAGE_ADMIN_LOGOUT','page=logout');
	define('PAGE_ADMIN_ACCOUNTS','module=admins&page=list');
	define('PAGE_ADMIN_EDIT','module=admins&page=edit');
	define('PAGE_ADMIN_NEW','module=admins&page=new');
	define('PAGE_ADMIN_AJAX','module=admins&page=ajax');
	// Email Templates
	define('PAGE_EMAILTEMPLATES','module=emailtemplates&page=list');
	define('PAGE_EMAILTEMPLATE_NEW','module=emailtemplates&page=new');
	define('PAGE_EMAILTEMPLATE_EDIT','module=emailtemplates&page=edit');
	define('PAGE_EMAILTEMPLATE_AJAX','module=emailtemplates&page=ajax');	
	
	// Informations
	define('PAGE_INFORS','module=infors&page=list');
	
	// News
	define('PAGE_NEWS','module=news&page=list');
	define('PAGE_NEWS_NEW','module=news&page=new');
	define('PAGE_NEWS_EDIT','module=news&page=new');
	define('PAGE_NEWS_AJAX','module=news&page=ajax');	
	
	// Settings
	define('PAGE_SETTINGS','module=settings&page=list');
	define('PAGE_SETTINGS_AJAX','module=settings&page=ajax');	
	//Languages
	define('PAGE_LANGUAGES','module=langs&page=list');
	define('PAGE_LANGUAGE_NEW','module=langs&page=new');
	define('PAGE_LANGUAGE_EDIT','module=langs&page=edit');	
	define('PAGE_LANGUAGE_AJAX','module=langs&page=ajax');

	// Faqs
	define('PAGE_FAQS','module=faqs&page=list');
	define('PAGE_FAQ_NEW','module=faqs&page=new');
	define('PAGE_FAQ_EDIT','module=faqs&page=edit');	
	define('PAGE_FAQ_AJAX','module=faqs&page=ajax');		

	// Faqs
	define('PAGE_SECURITY_QUESTIONS','module=security_questions&page=list');
	define('PAGE_SECURITY_QUESTION_NEW','module=security_questions&page=new');
	define('PAGE_SECURITY_QUESTION_EDIT','module=security_questions&page=edit');	
	define('PAGE_SECURITY_QUESTION_AJAX','module=security_questions&page=ajax');	
	
	//Currencies
	define('PAGE_CURRENCIES','module=currencies&page=list');
	define('PAGE_CURRENCY_NEW','module=currencies&page=new');
	define('PAGE_CURRENCY_EDIT','module=currencies&page=edit');	
	define('PAGE_CURRENCY_AJAX','module=currencies&page=ajax');		
	//Payments
	
	define('PAGE_ADD_FUNDS','module=transactions&page=addfunds');
	define('PAGE_TRANSACTIONS','module=transactions&page=history');		
	define('PAGE_HISTORY_AJAX','module=transactions&page=history_ajax');	
	
	//Users
	define('PAGE_USERS','module=users&page=list');
	define('PAGE_USER_AJAX','module=users&page=ajax');
	
?>