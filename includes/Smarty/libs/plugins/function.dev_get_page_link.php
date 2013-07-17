<?php

function smarty_function_dev_get_page_link($params, &$smarty)
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
							
		$ssl	=	(true) ? 'SSL' : 'NONSSL';		

	  	eval("\$page_link = get_href_link($page,'',$ssl);");	
	  	
		return $page_link;
	}	
?>