<?php /* Smarty version 2.6.18, created on 2013-07-22 11:03:47
         compiled from right.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'right.html', 9, false),)), $this); ?>
<?php if ($_SESSION['login_main_account_info']): ?>
<div class="box blue">
    <div class="heading-title">
        Acount Setting
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account'): ?> class="active" <?php endif; ?>>Account Summary</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'personal'): ?> class="active" <?php endif; ?>>Personal Information</a>
            </li>
            <li <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_SETTINGS','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?> class="active" <?php endif; ?>>Settings</a>
                <ul>
                    <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_PERSONAL','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stpersonal'): ?> class="active" <?php endif; ?>>Personal</a>
                    </li>
                    <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_VERIFICATION','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stverification'): ?> class="active" <?php endif; ?>>Verification</a>
                    </li>
                   <!-- <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_CKI_IPN','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stcki_ipn'): ?> class="active" <?php endif; ?>>CKI/IPN</a>
                    </li>-->
                    <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_API','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stapi'): ?> class="active" <?php endif; ?>>API</a>
                    </li>
                    <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_PASSWORD','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stchange_password'): ?> class="active" <?php endif; ?>>Password</a>
                    </li>
                    <li>
                        <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_SECURE_PIN','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stsecure_pin'): ?> class="active" <?php endif; ?>>Secure PIN</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PUBLIC','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'public'): ?> class="active" <?php endif; ?>>Public Information</a>
            </li>
            
        </ul>
    </div>
</div>
<?php endif; ?>
<div class="box red">
    <div class="heading-title">
        Merchant tool
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="#">Checkout Interface (CI)</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_GENERAL_FORM','ssl' => true), $this);?>
">CI Form/Button Generate</a>
            </li>
            <li>
                <a href="#">Merchant API</a>
            </li>
            <li>
                <a href="#">API Test Key</a>
            </li>
            <li>
                <a href="#">Intergration Resouces</a>
            </li>
        </ul>
    </div>
</div>

<div class="box blue">
    <div class="heading-title">
        Payment
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'history'): ?> class="active" <?php endif; ?>>Transaction History</a>
            </li>
            <li>
                <a href="#">Deposit Money</a>
            </li>
            <li>
                <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
" <?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'transfer'): ?> class="active" <?php endif; ?>>Transfer Money</a>
            </li>
            <li>
                <a href="#">Escrow Money</a>
            </li>
            <li>
                <a href="#">Withdraw Money</a>
            </li>
        </ul>
    </div>
</div>