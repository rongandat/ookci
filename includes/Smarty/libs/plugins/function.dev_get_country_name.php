<?php
	function smarty_function_dev_get_country_name($params, &$smarty)
	{
		    foreach($params as $_key => $_val) {
        		switch($_key) {
					case 'country':
						$country 	=	trim((string)$_val);
						if (is_numeric($country)) {
							$country_info	=	db_fetch_array(db_query("SELECT countries_name FROM "._TABLE_COUNTRIES." WHERE countries_id='".$country."'"));
							$country	=	$country_info['countries_name'];
						}
						break;		
				}            
			}			

		  	return $country;			
	}
?>