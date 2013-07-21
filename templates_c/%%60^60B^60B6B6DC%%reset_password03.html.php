<?php /* Smarty version 2.6.18, created on 2013-07-19 06:48:23
         compiled from home/reset_password03.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password03.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process3" type="hidden" />
    <input name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" type="hidden" />
    <input name="account_number" value="<?php echo $this->_tpl_vars['account_number']; ?>
" type="hidden" />

    <div class="simple-form">
        <h1>Account Reset Wizard: Step 3/3</h1>
        <p><i>Please make sure this password is different than the one you use in your email. Do not use your email password on any web site!</i>
            <br />Please use strong passwords. Here is an example: Av&amp;6l@3sBp</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> New Password:</span>
            <input  name="Password" type="password"  maxlength="32" value="<?php echo $this->_tpl_vars['password']; ?>
" class="st-forminput large" />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Confirm New Password:</span>
            <input  name="Password2" type="password" maxlength="32" value="<?php echo $this->_tpl_vars['password2']; ?>
"  class="st-forminput large"/>
            <div class="clear"></div>
        </div>
        
        <div class="st-form-line">
            <span class="st-labeltext"></span>
            <input  type="submit" name="buttonNext" class="button"  value="Verify"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_GET_PASSWORD','ssl' => true), $this);?>
')"/>
        </div>
    </div>
</form>