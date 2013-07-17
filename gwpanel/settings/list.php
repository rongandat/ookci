<?php
		include('includes/admin_login_check.php');

		include(_CLASSES_DIR.'paginator.php');

		$action	=	$_POST['action'];
		$configuration_group_id	=	isset($_REQUEST['cfgID']) ? (int)$_REQUEST['cfgID'] : 1;		
		
		switch ($action) {
			case	'update':
				$configuration_id	=	(int)$_POST['cID'];				
				db_query("UPDATE "._TABLE_CONFIGURATIONS." SET configuration_value='".$_POST['configuration_value']."' WHERE configuration_id='".$configuration_id."'");
				$feedbackmsgs[]	=	TEXT_MESSAGE_CONFIGURATION_UPDATED;
				$smarty->assign('feedbackmsgs',$feedbackmsgs);				
				break;
						
		}		
		// get configuration groups 
		$cfgroups_query	=	db_query("SELECT configuration_group_id, configuration_group_title FROM "._TABLE_CONFIGURATION_GROUPS." WHERE visible ORDER BY sort_order, configuration_group_title ");
		while ($cfgroup	=	db_fetch_array($cfgroups_query))
		{
			$cfgroups_array[$cfgroup['configuration_group_id']]	=	$cfgroup['configuration_group_title'];
		}
		$smarty->assign('cfgroups_options',$cfgroups_array);
		$smarty->assign('configuration_group_id',$configuration_group_id);
		
		// get current configuration group information
		$cfgroup_info	=	db_fetch_array(db_query("SELECT configuration_group_title FROM "._TABLE_CONFIGURATION_GROUPS." WHERE configuration_group_id='".$configuration_group_id."'"));
		$smarty->assign('cfgroupinfo',$cfgroup_info);
		
		//Template generate
		$smarty->assign('link_settings',get_admin_link(PAGE_SETTINGS,'pg='.$_GET['pg']));		
		
		$sql_settings	=	"SELECT * FROM "._TABLE_CONFIGURATIONS." WHERE configuration_group_id='".$configuration_group_id."' ";
		$sql_settings_page	=	$sql_settings." ORDER BY sort_order, configuration_title ASC ";
		
		$settings_query		=	db_query($sql_settings);	
		$setting_numbers	=	 db_num_rows($settings_query);
					
		$settingpage =& new Paginator($_GET['pg'],$setting_numbers);
		$settingpage->set_Limit(20);	
		$settingpage->pagename	=	get_admin_link(PAGE_SETTINGS,tep_get_all_get_params(array('pg', 'x', 'y')));
		
		$settingpage->set_Links(6);
		$limit1 = $settingpage->getRange1(); 
		$limit2 = $settingpage->getRange2(); 		
		
		$sql_settings_page	.=	" LIMIT $limit1, $limit2";	
		$setting_page_query	=	db_query($sql_settings_page);	
		
		// get smarty settings list
		$settings_array	=	array();
		while ($setting	=	db_fetch_array($setting_page_query) )
		{
			$settings_array[]	=	$setting;
		}
		
		$smarty->assign('page_links',$settingpage->getPageLinks());							
		$smarty->assign('settings',$settings_array);
		
		$_html_main_content = $smarty->fetch('settings/list.html');

?>