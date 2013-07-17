<?php
function smarty_function_dev_get_admin_page_link($params, &$smarty)
	{
		    foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'page':
						$page = (string)$_val;
						break;
					case 'params':
						$params	=	(string)$_val;
						break;
					case 'ssl':
						$ssl	=	(bool)$_val;
						break;
				}            
			}
			

	  	eval("\$admin_page_link = get_admin_link($page);");		
		return $admin_page_link;
	}	
?>