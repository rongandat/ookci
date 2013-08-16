<?php /* Smarty version 2.6.18, created on 2013-08-16 05:07:28
         compiled from home/login_pin.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_pin.html', 1, false),)), $this); ?>
<form name="frmLoginPIN" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_PIN','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1>Login: Step 4</h1>
        <p>You must enter your login PIN in order to access your main account. </p>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="line"></div>
        <div class="st-form-line">
            <span class="st-labeltext"><span class="required">*</span>Login PIN (4-5 digits):</span>
            <input type="password" autocomplete="off" size="6" maxlength="5" value="" class="st-forminput medium"  name="login_pin">
            <div class="clear"></div>
        </div>
        <div class="st-form-line padding0">
            <span class="st-labeltext"><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
">(forgot it?)</a></span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Login" />
        </div>
    </div>
</form>