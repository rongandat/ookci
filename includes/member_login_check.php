<?php

  if (!(tep_session_is_registered('login_userid') &&  $login_userid>0 )) {
    $navigation->set_snapshot();
    tep_redirect(get_href_link(PAGE_LOGIN, '', 'SSL'));
  }
  
?>