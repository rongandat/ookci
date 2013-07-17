<?php
// get link to Load Page (for Ajax content,..)
function smarty_function_dev_get_loadpage_link($params, &$smarty)
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
			

	  	eval("\$loadpage_link = get_loadpage_link($page);");		
		return $loadpage_link;
	}	
?>