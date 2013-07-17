<?php
$doajax	=	$_REQUEST['doajax'];
switch ($doajax) {
	case 'get_states':
		$country_id	=	(int)$_POST['country_id'];
		$sql_zones	=	"SELECT zone_id, zone_name  FROM "._TABLE_ZONES." WHERE zone_country_id='".$country_id."'";		
		$zones_query	=	db_query($sql_zones);
		$states_html		.=	'<option value="">-- Select State/Region --</option>';
		while ($zone	=	db_fetch_array($zones_query))
		{
			$states_html	.='<option label"'.$zone['zone_id'].'" value="'.$zone['zone_id'].'">'.$zone['zone_name'].'</option>';
		}		
		
		echo $states_html;
		break;
}
die(); // quite the page
?>