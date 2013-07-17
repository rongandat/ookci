<?php
if ($_POST['action']=='ajax') {

	$ajaxaction	=	$_POST['ajaxaction'];		
	switch ($ajaxaction)
	{
		case 'getEditForm':
			$configid	=	$_POST['configid'];
			$configinfo	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_CONFIGURATIONS." WHERE configuration_id='".$configid."'"));
		    if (tep_not_null($configinfo['set_function'])) {
				eval('$value_field = ' . $configinfo['set_function'] . '"' . htmlspecialchars($configinfo['configuration_value']) . '");');
			} else {
				$value_field = tep_draw_input_field('configuration_value', $configinfo['configuration_value']);
			}
			
			$smarty->assign('configuration_value_field_html', $value_field);
			
			$smarty->assign('link_settings',get_admin_link(PAGE_SETTINGS,tep_get_all_get_params(array('action','module','page','cID'))));
			$smarty->assign('configinfo',$configinfo);
	
			
	  		echo $smarty->fetch('settings/ajaxedit.html');
			break;
	}	
	die();
}
?>