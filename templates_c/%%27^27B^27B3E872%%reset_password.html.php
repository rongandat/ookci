<?php /* Smarty version 2.6.18, created on 2013-07-17 10:28:21
         compiled from home/reset_password.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1>Account Reset Wizard: Step 1/3</h1>
        <p>This form will send you a 10 digit reset code to the email associated with your account. 
            Please do not use this form if your email account is not safe or compromised.</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i>Your account number:</span>
            <input  name="account_number" autocomplete="off" class="st-forminput medium" type="text"  value="<?php echo $this->_tpl_vars['account_number']; ?>
"/>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i>Your E-mail address:</span>
            <input  name="email" type="text" value="<?php echo $this->_tpl_vars['email']; ?>
" autocomplete="off" class="st-forminput medium" />
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"><i>*</i>Enter the code (turing number) shown on the image :</span>
            <div class="security_code">
                <a href="javascript: refreshSecureImage();"><img src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE','ssl' => true), $this);?>
"   border="0" id="secure_image" /></a>
                <input type="text" name="security_code" class="st-forminput medium" id="security_code" value="">
                <a  href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US','ssl' => true), $this);?>
" class="link">Cannot see Turing number at all?</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Send Me Code" />
        </div>
    </div>
</form>