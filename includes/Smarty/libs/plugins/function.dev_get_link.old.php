<?php


	function smarty_function_dev_get_link($params, &$smarty)
	{
		    foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'page':
						$page = (string)$_val;
						break;
					case 'ssl':
						$ssl	=	(bool)$_val;
						break;
				}            
			}
			

		  	return get_href_link($page);

			
	}	
?>