<?php
  //BOF  module/pages header settings load (javascript/styles/..etc)
  $module_header_init_file	=	_ADMIN_ROOT._CURRENT_ADMIN_MODULE.'/header_init.php';
  if (is_file($module_header_init_file)) {
  		include($module_header_init_file);
  } 
  
  $page_header_init_file	=	_ADMIN_ROOT._CURRENT_ADMIN_MODULE.'/'._CURRENT_ADMIN_PAGE.'_header_init.php';  
  if (is_file($page_header_init_file)) {
  		include($page_header_init_file);		
  }
  //EOF  module/pages  header  settings load     
?>

