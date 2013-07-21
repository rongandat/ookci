<?php /* Smarty version 2.6.18, created on 2013-07-19 06:47:50
         compiled from home/reset_password_sent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password_sent.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process2" type="hidden" />
    <input name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" type="hidden" />
    <input name="account_number" value="<?php echo $this->_tpl_vars['account_number']; ?>
" type="hidden" />
    <div class="simple-form">
        <h1>Account Reset Wizard: Step 2/3</h1>
        <p>Your account login reset code has been successfully sent to <strong>rongandat@gmail.com</strong></p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="st-form-line">
            <span class="st-labeltext">Your account number:</span>
            <span class="entry"><?php echo $this->_tpl_vars['account_number']; ?>
</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Your E-mail address:</span>
            <span class="entry"><?php echo $this->_tpl_vars['email']; ?>
</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Reset Code:</span>
            <input  name="reset_code" type="text"  value=""  class="st-forminput large" />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> <?php echo $this->_tpl_vars['security_question']; ?>
:</span>
            <input  name="security_question" type="text"  value=""  class="st-forminput large"  />
            <div class="clear"></div>
        </div>

        <div class="st-form-line">
            <span class="st-labeltext"></span>
            <input  type="submit" name="buttonNext" class="button"  value="Next"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_GET_PASSWORD','ssl' => true), $this);?>
')"/>
        </div>
    </div>

</form>