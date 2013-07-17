<?php


	function smarty_function_dev_check_error_field($params, &$smarty)
	{	global $validator;

		foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'style':
						$style = (string)$_val;
						break;		
					case 'checkfield':
						$fieldname	=	(string)$_val;
						break;			
				}            
		}
				
		if (empty($params['checkfield'])) { // style is not set
			$smarty->trigger_error("checkfield: missing 'checkfield' parameter");
			return	0;
		} else {
			if (trim($style)!='') {
				return (in_array($fieldname,$validator->invalidfields) ) ? ' class="'.$style.'" ' : ''; 				
				
			} else {
				return (in_array($fieldname,$validator->invalidfields) ) ? ' class="errorFieldBorder" ' : ''; 				
			}
		}
			
	}	
?>