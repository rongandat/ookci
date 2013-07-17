<?php


	function smarty_function_dev_validate_errors($params, &$smarty)
	{	global $validator;

		foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'style':
						$style = (string)$_val;
						break;	
						
				}            
		}
				
		
			if (trim($style)!='') {
				
			} else {
			}
			
	}	
?>