<?php /* Smarty version 2.6.18, created on 2013-07-16 12:50:24
         compiled from home/login.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login.html', 1, false),)), $this); ?>
<form name="frmLogin" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1><?php echo $this->_tpl_vars['ENTRY_LOGIN']; ?>
</h1>
        <p><?php echo $this->_tpl_vars['TEXT_LOGIN_DESCRIPTION']; ?>
</p>
        <p><?php echo $this->_tpl_vars['TEXT_LOGIN_WANNING']; ?>
</p>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="line"></div>

        <div class="st-form-line">
            <span class="st-labeltext"><?php echo $this->_tpl_vars['ENTRY_ACOUNT_NUMBER']; ?>
</span>
            <input type="text" value="" id="account_number" class="st-forminput medium" size="20" name="account_number">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><?php echo $this->_tpl_vars['ENTRY_ACOUNT_PASSWORD']; ?>
</span>
            <input type="password" value="" id="password" class="st-forminput medium" size="20" name="password">
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"><?php echo $this->_tpl_vars['ENTRY_ACOUNT_CODE']; ?>
</span>
            <a href="javascript: refreshSecureImage();">
                <img id="secure_image" border="0" src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE','ssl' => true), $this);?>
">
            </a>
            <input type="text" value="" id="security_code" class="st-forminput medium" name="security_code">
            <div class="clear"></div>

        </div>

        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Login" />
        </div>
    </div>
</form>