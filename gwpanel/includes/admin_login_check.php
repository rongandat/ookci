<?php

  if (!tep_session_is_registered('admin_login_id')) {
    $navigation->set_snapshot();
    tep_redirect(get_admin_link(PAGE_ADMIN_LOGIN, '', 'SSL'));
  }
  
?>