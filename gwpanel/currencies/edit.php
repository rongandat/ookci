<?php
	include('includes/admin_login_check.php');

	$cID	=	(int)$_GET['cID'];
	
	$smarty->assign('link_edit_currency',get_admin_link(PAGE_CURRENCY_EDIT,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))));

	$status_options	=	array(0 =>	TEXT_INACTIVE,
								 	1	=>	TEXT_ACTIVE
								);
	$smarty->assign('status_options',$status_options);
	
	if ($_POST['action']=='process') {	
	
			$code	=	db_prepare_input($_POST['code']);
			$title	=	db_prepare_input($_POST['title']);
			$symbol_left	=	db_prepare_input($_POST['symbol_left']);			
			$symbol_right	=	db_prepare_input($_POST['symbol_right']);
			$decimal_point	=	db_prepare_input($_POST['decimal_point']);
			$thousands_point	=	db_prepare_input($_POST['thousands_point']);
			$decimal_places	=	(int)$_POST['decimal_places'];			
			$sort_order		=	(int)$_POST['sort_order'];
			$status	= (int)$_POST['status'];
			
			
			$validator->validateGeneral('Currency Name',$title,_ERROR_FIELD_EMPTY);
			$validator->validateGeneral('Currency Code',$code,_ERROR_FIELD_EMPTY);		

				if (count($validator->errors)==0 ) { // create new member

				$currency_data_array	=		array('code'=>$code,
													'title'=>$title,
													'status'=>$status,
													'sort_order'	=> $sort_order,
													'symbol_left'	=> $symbol_left,
													'symbol_right' 	=>	$symbol_right,
													'decimal_point'	=> 	$decimal_point,
													'thousands_point'	=> $thousands_point,
													'decimal_places'	=> $decimal_places																								
											);
				db_perform(_TABLE_CURRENCIES,$currency_data_array,'update',"currencies_id='".$cID."'");
												
			
			tep_redirect(get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))));
		} else {
			postAssign($smarty);
			$smarty->assign('validerrors',$validator->errors);
		}	

	}  else {	
			$currency_info	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_CURRENCIES." WHERE currencies_id='".$cID."'"));
			postAssign($smarty, $currency_info);
	}
		
	$_html_main_content = $smarty->fetch('currencies/edit.html');
?>