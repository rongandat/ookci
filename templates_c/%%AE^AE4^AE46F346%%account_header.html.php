<?php /* Smarty version 2.6.18, created on 2010-02-25 20:20:08
         compiled from home/modules/account_header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/modules/account_header.html', 5, false),)), $this); ?>
<table width="500" cellpadding="2" cellspacing="2" border="0"><tr>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account'): ?>
<td>Account Summary</td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT'), $this);?>
">Account Summary</a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account_personal'): ?>
<td>Personal Information</td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL'), $this);?>
">Personal Information</a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account_settings'): ?>
<td>Settings</td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_SETTINGS'), $this);?>
">Settings</a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account_public'): ?>
<td>Public Information</td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PUBLIC'), $this);?>
">Public Information Summary</a></td>
<?php endif; ?>
</tr>
</table>