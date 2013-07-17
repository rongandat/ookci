<?php

	function smarty_function_dev_get_template_image_source($params, &$smarty) 
	{
	
		foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'name':
						$image_name = (string)$_val;
						break;					
				}            
		}
			
		return _HTTP_SITE_ROOT.'/templates/images/'.$image_name;	
	}
?>