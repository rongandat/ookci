<?php /* Smarty version 2.6.18, created on 2013-08-16 05:07:24
         compiled from home/login_confirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_confirm.html', 1, false),)), $this); ?>
<form name="frmLoginConfirm" accept-charset="utf-8" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_CONFIRM','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
         <h1>Login: Step 2</h1>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="one-third">
            <h5>Your personal welcome message is:</h5>
            <p><?php echo $this->_tpl_vars['personal_welcome_message']; ?>
</p>
            <fieldset>          
                <?php if (! empty ( $this->_tpl_vars['mss_flag'] )): ?>
                <p class="required">Please check your email to get verification code</p>
                <div class="st-form-line">
                    <span class="st-labeltext">Verification Code</span>
                    <input type="text" value="" id="verification_key" autocomplete="off" class="st-forminput medium" size="20" name="verification_key">
                    <div class="clear"></div>
                </div>
                <?php endif; ?>
                <div class="st-form-line">
                    <input  name="confirm_message" id="confirm_message" type="checkbox" value="1"  onchange="checkConfirm();" />
                    <span>I confirm that my custom welcome message is correct</span>
                </div>
                <input  type="submit" id="buttonContinue" class="button"  value="Continue"  disabled="disabled" />
            </fieldset>           
        </div>
        <div class="one-third-big last" style="z-index: 870;">
            <p>Only OOKCASH knows your custom welcome message. Fake web sites that want you to enter your login information on their fake login pages will not be able to show it.</p><br>    
            <p>Close your browser and scan your computer for viruses if you do not see your custom welcome message during the login process</p>
        </div>
    </div>
</form>