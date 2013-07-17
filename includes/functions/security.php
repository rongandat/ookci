<?php
// check to make sure user logged in
function userLoginCheck()	
{	global	$navigation, $login_account_number;
	
	if (!tep_session_is_registered('login_account_number') || !tep_not_null($login_account_number)) {
		$navigation->set_snapshot();
		tep_redirect(get_href_link(PAGE_LOGIN, '', 'SSL'));
	}

}
// get curren user master key
function getMasterKey()
{	global $login_account_number;
	$master_key_info	=	db_fetch_array(db_query("SELECT master_key FROM "._TABLE_USERS." WHERE account_number='".$login_account_number."'"));
	return ($master_key_info['master_key']);
}
?>