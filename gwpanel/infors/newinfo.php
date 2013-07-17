<?php
	$pg	=	$_GET['pg'];
	
	$info_id	=	$_GET['info_id'];
	$smarty->assign('action_link',get_admin_link(PAGE_EDIT_INFO,'action=process&info_id='.$info_id,'&pg='.$pg));
	$smarty->assign('back_link',get_admin_link(PAGE_INFORS,'pg='.$pg));

	
	if ($_GET['action']=='process') {
		
		$info_key	=	$_POST['info_key'];
		$info_content	=	$_POST['info_content'];
		
		$validator->validateGeneral(ERROR_FIELD_KEY,$info_key, _ERROR_FIELD_EMPTY);
		$validator->validateGeneral('Content',$info_content, _ERROR_FIELD_EMPTY);	
		
		if (!$validator->foundErrors()) {
			$info_data	=	array(	'info_key'	=>	$info_key,
									'info_content'	=>	addslashes(htmlentities($info_content)),
									'info_title'	=>	addslashes(htmlentities($_POST['info_title'])),
									'info_description'=>	$_POST['info_description'],
									'info_usage'	=>		$_POST['info_usage'],
								);
								
			if ($info_id>0) { // update 
				db_perform(_TABLE_INFO_TEMPLATES, $info_data,'update','info_id='.$info_id);
			} else {
				db_perform(_TABLE_INFO_TEMPLATES, $info_data);			
			}
			
			tep_redirect(get_admin_link(PAGE_INFORS,'pg='.$pg));
		} else {
			postAssign($smarty);
			$smarty->assign('validerrors',$validator->errors);
		}	

	} else {
		if ($info_id>0) {
			$sql_info	=	"SELECT * FROM "._TABLE_INFO_TEMPLATES." WHERE info_id='".$info_id."'";
			$info	=	db_fetch_array(db_query($sql_info));
			$info['info_title']	=	stripslashes($info['info_title']);
			$info['info_content']	=	stripslashes($info['info_content']);
			$smarty->assign('PAGE_HEADING',HEADING_EDIT_INFO);
			postAssign($smarty, $info);
		
		} else {
		
			$smarty->assign('PAGE_HEADING',HEADING_NEW_INFO);
		
		}
	}
		
	$_html_main_content = $smarty->fetch('infors/newinfo.html');
?>