<?php
	if (!tep_session_is_registered('login_account_number') && tep_not_null($login_account_number)) tep_redirect(get_href_link(PAGE_LOGIN));


	$_html_main_content = $smarty->fetch('home/account.html');
?>