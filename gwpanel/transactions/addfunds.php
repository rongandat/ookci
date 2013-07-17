<?php
	//bof: get currencies
	$currencies_array	=	get_currencies();		
	$balance_currencies['']	=	'-- Select Currency --';
	foreach ($currencies_array as $code => $currency_info)
	{
		$balance_currencies[$code]	=	$currency_info['title'];
	}
	$smarty->assign('balance_currencies', $balance_currencies);
	//eof: get currencies
	
	if ($_POST['action']=='process') {	
		$step	=	$_POST['step'];
		if ($step=='confirm') { // confirm transfer
				$to_userid	=	(int)$_POST['to_userid'];
				$account_number	=	db_prepare_input($_POST['account_number']);
				$transaction_memo	=	db_prepare_input($_POST['transaction_memo']);				
				$amount	=	(float)$_POST['amount'];
				$balance_currency	=	$_POST['balance_currency'];			
				$batch_number	=	tep_create_random_value(11,'digits');
				$amount_text	=	get_currency_value_format($amount, $currencies_array[$balance_currency]);	
				
				$transaction_data_array	=	array('from_userid'	=> -1, // from admin
												 'batch_number'	=>	$batch_number,
												 'to_userid'	=>	$to_userid,
												 'amount'	=>	$amount,
												 'transaction_time'	=> date('YmdHis'),
												 'transaction_memo'	=> $transaction_memo,
												 'from_account'	=>	'GWebcash Service',
												 'to_account'	=> $account_number,
												 'transaction_currency'	=> $balance_currency,
												 'amount_text'	=> $amount_text,
												 'transaction_status'	=>	'completed'
											);
											
				db_perform(_TABLE_TRANSACTIONS, $transaction_data_array);
				
				// add balance to the account
				// check  user's balance currency init ?
				$check_balance	=	db_fetch_array(db_query("SELECT count(*) as total FROM "._TABLE_USER_BALANCE." WHERE user_id='".$to_userid."' and currency_code='".$balance_currency."'"));
				if ($check_balance['total']>0) {
					db_query("UPDATE "._TABLE_USER_BALANCE." SET balance=balance+ ".$amount.", last_updated='".date('YmdHis')."' WHERE user_id='".$to_userid."' and currency_code='".$balance_currency."'");
				} else {
					$balance_data_array	=	array('user_id'	=>	$to_userid,
												'currency_code'	=> $balance_currency,
												'balance'	=> $amount,
												'last_updated'	=> date('YmdHis'),
											);
					db_perform(_TABLE_USER_BALANCE, $balance_data_array);							
				}														
	
				// completed
				$transaction_data	=	array('batch_number'	=> $batch_number,
											  'account_number'	=>	$account_number,
											  'amount_text'	=>	$amount_text
											 );
											  
											  
				$smarty->assign('transaction_data',$transaction_data);
				$smarty->assign('step','completed');
				
				// Send Transaction Notify 	Email to User
				$email_info	=	get_email_template('ADMIN_TRANSFER_EMAIL');			
				$user_info	=	db_fetch_array(db_query("SELECT firstname, email FROM "._TABLE_USERS." WHERE user_id='".$to_userid."'"));
				$firstname	=	$user_info['firstname'];
				
				$msg_subject	=	$email_info['emailtemplate_subject'];
				$msg_content	=	str_replace(array('[firstname]','[amount_text]','[batch_number]','[balance_currency]'),array($firstname, $amount_text, $batch_number, $balance_currency),$email_info['emailtemplate_content']);
				
				tep_mail($firstname,$user_info['email'],$msg_subject, $msg_content,SITE_NAME,SITE_CONTACT_EMAIL );
				// end of email sending										
				
		} else { // normal form
				$account_number	=	db_prepare_input($_POST['account_number']);
				$amount	=	(float)$_POST['amount'];
				$balance_currency	=	$_POST['balance_currency'];
				$transaction_memo	=	db_prepare_input($_POST['transaction_memo']);
				
				if ($amount<=0)	$validator->addError('Amount','Please input correct Amount .');
				if ($balance_currency=='') $validator->addError('Balance Currency','Please select the currency of balance that you want to add funds to.');
				
				$check_account_query	=	db_query("SELECT account_number, firstname, lastname, account_name , user_id FROM "._TABLE_USERS." WHERE account_number='".trim($account_number)."'");
				if (db_num_rows($check_account_query)==0) {
					$validator->addError('Account Number','Invalid account number. Please input correct account number of the user that you want to add funds to.');
				}
						
				if (count($validator->errors)==0 ) { 
						$transfer_info	=	db_fetch_array($check_account_query);
						$transfer_info['amount']	=	$amount;
						$transfer_info['balance_currency']	=	$balance_currency;	
						$transfer_info['transaction_memo']	=	$transaction_memo;	
						$smarty->assign('transfer_info',$transfer_info);	
						$smarty->assign('step','confirm');
				} else {
					postAssign($smarty);
					$smarty->assign('validerrors',$validator->errors);		
				}
		}

	}
	
	$_html_main_content = $smarty->fetch('transactions/addfunds.html');
?>