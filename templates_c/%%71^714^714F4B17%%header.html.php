<?php /* Smarty version 2.6.18, created on 2013-07-22 04:26:23
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'header.html', 4, false),)), $this); ?>
<?php if ($_SESSION['login_main_account_info']): ?>
<div id="header-login">
    <div class="top-header">
        <a class="logo" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
"><img src="images/logo.png"/></a>
        <ul class="top-nav">
            <li>
                Welcome <strong><?php echo $_SESSION['login_main_account_info']['firstname']; ?>
&nbsp;<?php echo $_SESSION['login_main_account_info']['lastname']; ?>
</strong>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
"> <strong><?php echo $_SESSION['login_account_number']; ?>
 </strong></a>(<?php echo $_SESSION['login_main_account_info']['account_name']; ?>
)
            </li>
            <li><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGOUT','ssl' => true), $this);?>
">Logout</a> </li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="nav">
        <div class="nav-content">
            <ul>
                <li>
                    <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
" <?php if (( $_GET['page'] == 'index' ) && empty ( $_GET['module'] )): ?> class="active" <?php endif; ?>>Home</a>
                </li>
                <li>
                    <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'account'): ?>
                    <a class="active" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
" >
                        Account
                    </a>
                    <?php else: ?>
                    <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
" >
                        Account
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'personal'): ?>
                    <a class="active" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
" >
                        Profile
                    </a>
                    <?php else: ?>
                    <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
" >
                        Profile
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'history'): ?>
                    <a class="active" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
" >
                        History
                    </a>
                    <?php else: ?>
                    <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
" >
                        History
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'transfer'): ?>
                    <a class="active" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
" >
                        Transfer
                    </a>
                    <?php else: ?>
                    <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
" >
                        Transfer
                    </a>
                    <?php endif; ?>
                </li>

            </ul>
            <div class="search">
                <form method="GET" action="">
                    <span>Search</span>
                    <input type="text" name="search" class="search-inut"/>
                    <input type="submit" value="Go" class="btn-search"/>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php else: ?>
<?php if (empty ( $_GET['page'] ) || ( ( $_GET['page'] == 'index' ) && empty ( $_GET['module'] ) )): ?>
<div id="header">
    <div class="top-header">
        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
" class="logo"><img src="images/logo.png"/></a>
        <ul class="top-nav">
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
">Home</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP','ssl' => true), $this);?>
">Create Account</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
">Log in</a>
            </li>
        </ul>
    </div>
    <div class="nav">
        <div class="nav-content">
            <ul>
                <li><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
" <?php if (( $_GET['page'] == 'index' ) && empty ( $_GET['module'] )): ?> class="active" <?php endif; ?>>Home</a></li>

                <li><a href="#">Business</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Make money</a></li>
            </ul>
            <div class="search">
                <form method="GET" action="">
                    <span>Search</span>
                    <input type="text" name="search" class="search-inut"/>
                    <input type="submit" value="Go" class="btn-search"/>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="banner">
        <div class="content-banner">
            <div class="left-banner">
                <h1>OOKCA$H Payment Gateway</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP','ssl' => true), $this);?>
" class="button-create-acount">Create free acount</a>
            </div>
            <div class="right-banner">
                <form action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
" method="post" > 
                    <div class="heading blue">
                        Member login
                    </div>
                    <div class="login-form-header">
                        <input type="hidden" value="process" name="action">
                        <input type="text" name="account_number" id="account_number" autocomplete="off" placeholder="Acount number" class="input-login"/>
                        <input type="password" name="password" size="20" autocomplete="off" placeholder="Password" class="input-login"/>
                        <a class="forgot" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
">Forgot password?</a>
                        <input type="submit" class="btn-login" value="Login"/>
                    </div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php else: ?>
<div id="header-login">
    <div class="top-header">
        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
" class="logo"><img src="images/logo.png"/></a>
        <ul class="top-nav">
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
">Home</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP','ssl' => true), $this);?>
">Create Account</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
">Log in</a>
            </li>
        </ul>
    </div>
    <div class="nav">
        <div class="nav-content">
            <ul>
                <li><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
" <?php if (( $_GET['page'] == 'index' ) && empty ( $_GET['module'] )): ?> class="active" <?php endif; ?>>Home</a></li>

                <li><a href="#">Business</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Make money</a></li>
            </ul>
            <div class="search">
                <form method="GET" action="">
                    <span>Search</span>
                    <input type="text" name="search" class="search-inut"/>
                    <input type="submit" value="Go" class="btn-search"/>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
</div>
<?php endif; ?>
<?php endif; ?>

