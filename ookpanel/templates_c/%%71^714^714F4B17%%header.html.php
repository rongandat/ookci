<?php /* Smarty version 2.6.18, created on 2013-07-26 11:45:53
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'header.html', 36, false),)), $this); ?>
<?php if (! empty ( $_SESSION['admin_login_username'] )): ?>
<!-- START HEADER -->
<div id="header">


    <!-- logo -->
    <div class="logo">	<a href="index.html"><img src="images/logo.png" width="112" height="35" alt="logo"/></a>	</div>


    <!-- notifications -->
    <div id="notifications">
        <a href="index.html" class="qbutton-left"><img src="images/icons/header/dashboard.png" width="16" height="15" alt="dashboard" /></a>
        <a href="#" class="qbutton-normal tips"><img src="images/icons/header/message.png" width="19" height="13" alt="message" /> <span class="qballon">23</span> </a>
        <a href="#" class="qbutton-right"><img src="images/icons/header/support.png" width="19" height="13" alt="support" /> <span class="qballon">8</span> </a>
        <div class="clear"></div>
    </div>


    <!-- quick menu -->
    <div id="quickmenu">
        <a href="#" class="qbutton-left tips" title="Add a new post"><img src="images/icons/header/newpost.png" width="18" height="14" alt="new post" /></a>
        <a id="open-stats" href="#" class="qbutton-right tips" title="Statistics"><img src="images/icons/header/graph.png" width="17" height="15" alt="graph" /></a>
        <div class="clear"></div>
    </div>


    <!-- profile box -->
    <div id="profilebox">
        <a href="#" class="display">
            <b>Logged in as</b>	<span><?php echo $_SESSION['admin_login_username']; ?>
</span>
        </a>

        <div class="profilemenu">
            <ul>
                <li><a href="#">Account Settings</a></li>
                <li><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_ADMIN_LOGOUT','ssl' => true), $this);?>
">Logout</a></li>
            </ul>
        </div>

    </div>


    <div class="clear"></div>
</div>
<!-- END HEADER -->
<?php endif; ?>