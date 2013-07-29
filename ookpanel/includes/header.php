<?php

if(!tep_session_is_registered('admin_login_id')) {
checkAdminAutoLogin();
} 

echo $smarty->fetch('header.html');

?>