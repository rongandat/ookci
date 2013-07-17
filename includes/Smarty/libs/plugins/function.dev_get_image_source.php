<?php

	function smarty_function_dev_get_image_source($params, &$smarty) 
	{
	
		foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'name':
						$image_name = (string)$_val;
						break;					
				}            
		}
			
		return _IMAGE_SITE_URL.$image_name;	
	}
?>