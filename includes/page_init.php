<?php

	include('includes/configs.php');

	include(_CLASSES_DIR.'validator.php');		
	include(_CLASSES_DIR.'messagestack.php');	
	include(_CLASSES_DIR.'breadcrumb.php');
	include(_FUNCTIONS_DIR.'database.php');
	include(_FUNCTIONS_DIR.'htmloutput.php');
	include(_FUNCTIONS_DIR.'general.php');
	include(_FUNCTIONS_DIR.'global.php');	
	include(_FUNCTIONS_DIR.'security.php');	
	
	include('includes/Smarty/libs/Smarty.class.php');
	
	include('includes/dbtables.php');	
	include('includes/pages.php');
	
	
	db_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD,DB_DATABASE);

	// set the application parameters
	  $configuration_query = db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . _TABLE_CONFIGURATIONS);
	  while ($configuration = db_fetch_array($configuration_query)) {
		define($configuration['cfgKey'], $configuration['cfgValue']);
	  }
  
	define('_CURRENT_MODULE',isset($_GET['module']) ? $_GET['module'] : 'home');
	define('_CURRENT_PAGE',isset($_GET['page']) ? $_GET['page'] : 'index');
	define('_CURRENT_PAGE_LINK',get_href_link('module='._CURRENT_MODULE.'&page='._CURRENT_PAGE));
	
	include(_CLASSES_DIR.'email.php');
	include(_CLASSES_DIR.'mime.php');  	
        include('includes/error_code.php');
	
// BEGIN sessions/cookies -------------
		// set the type of request (secure or not)
	  $request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';

		// set the cookie domain
		  $cookie_domain = (($request_type == 'NONSSL') ? HTTP_COOKIE_DOMAIN : HTTPS_COOKIE_DOMAIN);
		  $cookie_path = (($request_type == 'NONSSL') ? HTTP_COOKIE_PATH : HTTPS_COOKIE_PATH);
  
		  // check if sessions are supported, otherwise use the php3 compatible session class
		  if (!function_exists('session_start')) {
			define('PHP_SESSION_NAME', 'appsid');
			define('PHP_SESSION_PATH', $cookie_path);
			define('PHP_SESSION_DOMAIN', $cookie_domain);
			define('PHP_SESSION_SAVE_PATH', SESSION_WRITE_DIRECTORY);
		
			include(_CLASSES_DIR.'sessions.php');
		  }
		
		// define how the session functions will be used
		  require(_FUNCTIONS_DIR . 'sessions.php');
		
	// include navigation history class
	  require(_CLASSES_DIR.'navigation_history.php');
		
	
			
// currency
  if (!tep_session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!tep_session_is_registered('currency')) tep_session_register('currency');

    if (isset($HTTP_GET_VARS['currency']) && $currencies->is_set($HTTP_GET_VARS['currency'])) {
      $currency = $HTTP_GET_VARS['currency'];
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }
  			
		// set the session name and save path
		  tep_session_name('appsid');
		  tep_session_save_path(SESSION_WRITE_DIRECTORY);
		

	// set the session cookie parameters
		   if (function_exists('session_set_cookie_params')) {
			session_set_cookie_params(0, $cookie_path, $cookie_domain);
		  } elseif (function_exists('ini_set')) {
			ini_set('session.cookie_lifetime', '0');
			ini_set('session.cookie_path', $cookie_path);
			ini_set('session.cookie_domain', $cookie_domain);
		  }
		
		// set the session ID if it exists
		   if (isset($HTTP_POST_VARS[tep_session_name()])) {
			 tep_session_id($HTTP_POST_VARS[tep_session_name()]);
		   } elseif ( ($request_type == 'SSL') && isset($HTTP_GET_VARS[tep_session_name()]) ) {
			 tep_session_id($HTTP_GET_VARS[tep_session_name()]);
		   }
		
		// start the session
		  $session_started = false;
		  if (SESSION_FORCE_COOKIE_USE == 'True') {

			tep_setcookie('cookie_test', 'please_accept_for_session', time()+60*60*24*30, $cookie_path, $cookie_domain);
		
			if (isset($HTTP_COOKIE_VARS['cookie_test'])) {
			  tep_session_start();
			  $session_started = true;
			}
		  } elseif (SESSION_BLOCK_SPIDERS == 'True') {
			$user_agent = strtolower(getenv('HTTP_USER_AGENT'));
			$spider_flag = false;
		
			if (tep_not_null($user_agent)) {
			  $spiders = file('includes/spiders.txt');
		
			  for ($i=0, $n=sizeof($spiders); $i<$n; $i++) {
				if (tep_not_null($spiders[$i])) {
				  if (is_integer(strpos($user_agent, trim($spiders[$i])))) {
					$spider_flag = true;
					break;
				  }
				}
			  }
			}
		
			if ($spider_flag == false) {
			  tep_session_start();
			  $session_started = true;
			}
		  } else {
			tep_session_start();
			$session_started = true;
		  }
		
		  if ( ($session_started == true) && (PHP_VERSION >= 4.3) && function_exists('ini_get') && (ini_get('register_globals') == false) ) {
			extract($_SESSION, EXTR_OVERWRITE+EXTR_REFS);
		  }
		
		// set SID once, even if empty
		  $SID = (defined('SID') ? SID : '');
		
		// verify the ssl_session_id if the feature is enabled
		  if ( ($request_type == 'SSL') && (SESSION_CHECK_SSL_SESSION_ID == 'True') && (ENABLE_SSL == true) && ($session_started == true) ) {
			$ssl_session_id = getenv('SSL_SESSION_ID');
			if (!tep_session_is_registered('SSL_SESSION_ID')) {
			  $SESSION_SSL_ID = $ssl_session_id;
			  tep_session_register('SESSION_SSL_ID');
			}
		
			if ($SESSION_SSL_ID != $ssl_session_id) {
			  tep_session_destroy();
			  tep_redirect(get_href_link(PAGE_SSL_CHECK));
			}
		  }
		
		// verify the browser user agent if the feature is enabled
		  if (SESSION_CHECK_USER_AGENT == 'True') {
			$http_user_agent = getenv('HTTP_USER_AGENT');
			if (!tep_session_is_registered('SESSION_USER_AGENT')) {
			  $SESSION_USER_AGENT = $http_user_agent;
			  tep_session_register('SESSION_USER_AGENT');
			}
		
			if ($SESSION_USER_AGENT != $http_user_agent) {
			  tep_session_destroy();
			  tep_redirect(get_href_link(PAGE_LOGIN));
			}
		  }
		
		// verify the IP address if the feature is enabled
		  if (SESSION_CHECK_IP_ADDRESS == 'True') {
			$ip_address = tep_get_ip_address();
			if (!tep_session_is_registered('SESSION_IP_ADDRESS')) {
			  $SESSION_IP_ADDRESS = $ip_address;
			  tep_session_register('SESSION_IP_ADDRESS');
			}
		
			if ($SESSION_IP_ADDRESS != $ip_address) {
			  tep_session_destroy();
			  tep_redirect(get_href_link(PAGE_LOGIN));
			}
		  }
	
// END sesctions	----------------
	
// navigation history
	  if (tep_session_is_registered('navigation')) {
		if (PHP_VERSION < 4) {
		  $broken_navigation = $navigation;
		  $navigation = new navigationHistory;
		  $navigation->unserialize($broken_navigation);
		}
	  } else {
		tep_session_register('navigation');
		$navigation = new navigationHistory;
	  }
	  $navigation->add_current_page();
	  	
		
	// init Smarty Object	
	$smarty	=	new Smarty;
	
	$smarty->assign('CURRENT_PAGE',_CURRENT_PAGE);
	$smarty->assign('CURRENT_MODULE',_CURRENT_MODULE);	
	$smarty->assign('_CURRENT_PAGE_LINK',_CURRENT_PAGE_LINK);
	$smarty->assign('_TEMPLATE_SOURCE_DIR',_SITE_ROOT.'templates/');
	
	// BOF Language setting -------------

// language changes checking
	if (isset($_GET['lang'])  ) {
		$_SESSION['language_code']	=	$_GET['lang'];	
		$sql_lang	=	"SELECT language_id, language_code, language_directory FROM "._TABLE_LANGUAGES." WHERE language_code='".$_SESSION['language_code']."' and lang_status='actived'";
		$lang_query	=	db_query($sql_lang);
		if (db_num_rows($lang_query) >0 ) { // language avaible 
			$lang_info	=	db_fetch_array($lang_query);		
			$_SESSION['language_directory']	=	$lang_info['language_directory'];	
			$_SESSION['languages_id']	=	$lang_info['language_id'];
		}
	} else {
		$languages_id		=	1; // EN by default
		tep_session_register('languages_id');
	}
	
	// language includes 
	$main_language	=	(isset($_SESSION['language_directory'])) ? $_SESSION['language_directory'] : _DEFAULT_LANGUAGE;

	if (is_file(_LANGUAGE_DIR.$main_language.'.php') ) {
		require(_LANGUAGE_DIR.$main_language.'.php');
	}
	
	if (is_file(_LANGUAGE_DIR.$main_language.'/'._CURRENT_MODULE._PAGE_EXTENDSION) ) {
		require(_LANGUAGE_DIR.$main_language.'/'._CURRENT_MODULE._PAGE_EXTENDSION);
	}
	
	$smarty->assign('langs',$langs);		
	
	
	$language_code	=	(isset($_SESSION['language_code'])) ? $_SESSION['language_code'] : _LANGUAGE_CODE;
	
	define('_IMAGES_LANG_DIR',_HTTP_SITE_ROOT.'/languages/'.$main_language.'/'); // Dir of language images 

	// EOF Language Settings	---------

/// MESSAGES/ ERROS PROCESSING ---------------------

 	$messageToStack = new messageStack;
  
  // Validator object init ---------------------------
  	$validator = new Validator();
  // Breadcrumb object init
	$breadcrumb	=	 new breadcrumb();
		

	
?>