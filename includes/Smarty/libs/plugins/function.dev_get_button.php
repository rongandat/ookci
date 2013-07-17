<?php


	function smarty_function_dev_get_button($params, &$smarty)
	{
		    foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'name':
						$button_name = (string)$_val;
						break;					
				}            
			}
			

  		return	_IMAGES_LANG_DIR.'images/'.$button_name;

			
	}	
?>