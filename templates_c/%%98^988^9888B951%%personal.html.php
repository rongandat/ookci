<?php /* Smarty version 2.6.18, created on 2013-07-26 05:52:44
         compiled from account/personal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/personal.html', 1, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <div class="simple-form">
        <h1>Account Personal Information</h1>
        <p>The following section can only be viewed after you enter your master key.</p>
        <p>Fields 
            marked with asterisk (<i>*</i>) are 
            required.</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i>Master Key:</span>
            <input type="password" autocomplete="off" name="master_key" size="5" maxlength="3" class="st-forminput medium">
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Next" />
        </div>
    </div>
</form>