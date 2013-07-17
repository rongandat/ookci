<?php


	function smarty_function_dev_get_state_name($params, &$smarty)
	{
		    foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'state':
						$state 	=	trim((string)$_val);
						if (is_numeric($state)) {
							$state_info	=	db_fetch_array(db_query("SELECT zone_name FROM "._TABLE_ZONES." WHERE zone_id='".$state."'"));
							$state	=	$state_info['zone_name'];
						}
						break;		
				}            
			}			

		  	return $state;			
	}	
?>