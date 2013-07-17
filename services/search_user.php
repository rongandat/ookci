<?php
	if ($_POST['action']=='process')
	{
		$security_code	=	db_prepare_input($_POST['security_code']);
		if ($security_code	==	$secure_image_hash_string) {
			$account_number	=	db_prepare_input($_POST['account_number']);
			if ($validator->validateGeneral('Account Number',$account_number,_ERROR_FIELD_EMPTY)) {
				$check_account_query	=	db_query("SELECT * FROM "._TABLE_USERS." WHERE account_number='".$account_number."'");
				if (db_num_rows($check_account_query)==0) {
					$validator->addError('Account Number',"Account doesn't exist.");
				}
			}

		} else {
			$validator->addError('Turing Number',ERROR_SECURE_CODE_WRONG);
		}
		
		if (count($validator->errors)==0 ) { // create new user					
			//get account informations
			$account_info	=	db_fetch_array($check_account_query);
			$smarty->assign('account_info', $account_info);
			// get all currencies_list
			$currencies_array	=	get_currencies();
			
			// get main account balances
			$sql_balances	=	"SELECT currency_code, balance FROM "._TABLE_USER_BALANCE." WHERE user_id='".$account_info['user_id']."'";
			$balances_query	=	db_query($sql_balances);
			while ($balance	=	db_fetch_array($balances_query))
			{
				$balances_array[$balance['currency_code']]	=	$balance['balance'];
			}
				
			foreach ($currencies_array as $currency_code => $currency_info)
			{
				$balance_info_array[]	=	array('balance_code'	=> $currency_info['code'],
												  'balance_name'	=> $currency_info['title'],
												  'balance_text'	=> get_currency_value_format($balances_array[$currency_code], $currency_info)
												 );
			}	
			
			$smarty->assign('balances_list',$balance_info_array);	
								
			// get user information settings
			$user_settings	=	db_fetch_array(db_query("SELECT * FROM "._TABLE_USER_SETTINGS." WHERE user_id='".$account_info['user_id']."'"));
			$balance_settings	=	explode(',',$user_settings['balances']);
			$smarty->assign('balance_settings', $balance_settings);
			$smarty->assign('user_settings',$user_settings);										
			//get account settings
			$smarty->assign('found_account',true);						
		} 
		
		$smarty->assign('account_number',$account_number);	
	
		$smarty->assign('validerrors',$validator->errors);				
	}
	$_html_main_content = $smarty->fetch('services/search_user.html');
?>