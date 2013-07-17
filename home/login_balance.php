<?php
	if (!tep_session_is_registered('login_account_number') && tep_not_null($login_account_number)) tep_redirect(get_href_link(PAGE_LOGIN));
	
	// get currencies balance
	$currencies_balance	=	array();
	$sql_balances	=	"SELECT currency_code, balance FROM "._TABLE_USER_BALANCE." WHERE user_id='".$login_userid."'";
	$balances_query	=	db_query($sql_balances);
	while ($balance	=	db_fetch_array($balances_query))
	{
		$balances_array[$balance['currency_code']]	=	$balance['balance'];
	}
		
	// get all currencies_list
	$currencies_array	=	get_currencies();
	foreach ($currencies_array as $currency_code => $currency_info)
	{
		$balance_info_array[]	=	array('balance_name'	=> $currency_info['title'],
										  'balance_text'	=> get_currency_value_format($balances_array[$currency_code], $currency_info)
										 );
	}	
	
	$smarty->assign('balances',$balance_info_array);
	
	$_html_main_content = $smarty->fetch('home/login_balance.html');
?>