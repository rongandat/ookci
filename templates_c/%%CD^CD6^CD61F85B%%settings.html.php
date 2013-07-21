<?php /* Smarty version 2.6.18, created on 2013-07-19 05:57:22
         compiled from account/settings.html */ ?>
<div class="simple-form">
    <h1>Settings</h1>
    <p>The following section can only be viewed after you enter your master key.</p>
    <p>Fields 
        marked with asterisk (<i>*</i>) are 
        required.</p>
    <div class="line"></div>
    <?php if ($this->_tpl_vars['step'] == 'updated'): ?>
    <div class="success">Your changes have been successfully saved.</div>
    <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="contents">
        <?php echo $this->_tpl_vars['html_content']; ?>

    </div>
</div>