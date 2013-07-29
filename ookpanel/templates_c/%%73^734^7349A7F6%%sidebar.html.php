<?php /* Smarty version 2.6.18, created on 2013-07-29 11:07:24
         compiled from sidebar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'sidebar.html', 17, false),)), $this); ?>
<!-- START SIDEBAR -->
<div id="sidebar">

    <!-- start searchbox -->
    <div id="searchbox">
        <div class="in">
            <form id="form1" name="form1" method="post" action="">
                <input name="textfield" type="text" class="input" id="textfield" onfocus="$(this).attr('class','input-hover')" onblur="$(this).attr('class','input')"  />
            </form>
        </div>
    </div>
    <!-- end searchbox -->

    <!-- start sidemenu -->
    <div id="sidemenu">
        <ul>
            <li <?php if (( $_GET['module'] == 'home' ) && empty ( $_GET['page'] )): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/laptop.png" width="16" height="16" alt="icon"/>Dashboard</a></li>
             <li <?php if ($_GET['module'] == 'admins'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_ADMIN_ACCOUNTS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/user.png" width="16" height="16" alt="icon"/>Admin Accounts</a></li>
             <li <?php if ($_GET['module'] == 'settings'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_SETTINGS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/star.png" width="16" height="16" alt="icon"/>Settings</a></li>
             <li <?php if ($_GET['module'] == 'langs'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_LANGUAGES','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/copy.png" width="16" height="16" alt="icon"/>Languages</a></li>
             <li <?php if ($_GET['module'] == 'emailtemplates'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_EMAILTEMPLATES','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/attach.png" width="16" height="16" alt="icon"/>Email Template</a></li>
             <li <?php if ($_GET['module'] == 'security_questions'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_SECURITY_QUESTIONS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/file_edit.png" width="16" height="16" alt="icon"/>Security Question</a></li>
             <li <?php if ($_GET['module'] == 'users'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_USERS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/user.png" width="16" height="16" alt="icon"/>Users</a></li>
             <li <?php if ($_GET['module'] == 'currencies'): ?>class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_CURRENCIES','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/download.png" width="16" height="16" alt="icon"/>Currencies</a></li>
             <li <?php if (( $_GET['module'] == 'transactions' ) && ( $_GET['page'] == 'addfunds' )): ?> class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_ADD_FUNDS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/comment.png" width="16" height="16" alt="icon"/>Add Funds</a></li>
             <li <?php if ($_GET['module'] == 'transactions' && ( $_GET['page'] == 'history' )): ?> class="active"<?php endif; ?>><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_TRANSACTIONS','ssl' => true), $this);?>
"><img src="includes/img/icons/sidemenu/calendar.png" width="16" height="16" alt="icon"/>Transactions</a></li>
        </ul>
    </div>
    <!-- end sidemenu -->

</div>
<!-- END SIDEBAR -->