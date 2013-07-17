<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr><td class="headerbg" width="100%" ><?php

    if (!tep_session_is_registered('admin_login_id')) {
		checkAdminAutoLogin();
	} else { // admin logged
		echo '<span style="float:right" class="whiteText"><strong>'.TEXT_WELCOME.$admin_login_username.'</strong>&nbsp;<a href="'.get_admin_link(PAGE_ADMIN_LOGOUT).'" class="linkWhite">'.TEXT_LOGOUT.'</a></span>';
	}
?></td></tr>	
</table>