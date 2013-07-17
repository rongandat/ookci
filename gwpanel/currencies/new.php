<?php
	include('includes/admin_login_check.php');

	$smarty->assign('link_new_currency',get_admin_link(PAGE_CURRENCY_NEW,tep_get_all_get_params(array('action','module','page'))));
	$smarty->assign('back_link',get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))));

	$status_options	=	array(0 =>	TEXT_INACTIVE,
						 	1	=>	TEXT_ACTIVE
						);
	$smarty->assign('status_options',$status_options);
	
	$status	= isset($_POST['status']) ? (int)$_POST['status'] : 1;
	
	if ($_POST['action']=='process') {	
			$code	=	db_prepare_input($_POST['code']);
			$title	=	db_prepare_input($_POST['title']);
			$symbol_left	=	db_prepare_input($_POST['symbol_left']);			
			$symbol_right	=	db_prepare_input($_POST['symbol_right']);
			$decimal_point	=	db_prepare_input($_POST['decimal_point']);
			$thousands_point	=	db_prepare_input($_POST['thousands_point']);
			$decimal_places	=	(int)$_POST['decimal_places'];			
			$sort_order		=	(int)$_POST['sort_order'];
						
			$validator->validateGeneral('Currency Name',$title,_ERROR_FIELD_EMPTY);
			$validator->validateGeneral('Currency Code',$code,_ERROR_FIELD_EMPTY);			

				if (count($validator->errors)==0 ) { 

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
											
				db_perform(_TABLE_CURRENCIES,$currency_data_array);
												
			
			tep_redirect(get_admin_link(PAGE_CURRENCIES,tep_get_all_get_params(array('action','module','page'))));
		} else {
			postAssign($smarty);
			$smarty->assign('validerrors',$validator->errors);
		}	

	} 
		
	$_html_main_content = $smarty->fetch('currencies/new.html');
?>