<?php
  //BOF  module/pages header settings load (javascript/styles/..etc)
  $module_header_init_file	=	_SITE_ROOT._CURRENT_MODULE.'/external/header_init.php';
  if (is_file($module_header_init_file)) {
  		include($module_header_init_file);
  } 
  
  $page_header_init_file	=	_SITE_ROOT._CURRENT_MODULE.'/external/'._CURRENT_PAGE.'_header_init.php';  
  if (is_file($page_header_init_file)) {
  		include($page_header_init_file);		
  }
  //EOF  module/pages  header  settings load   
?>

