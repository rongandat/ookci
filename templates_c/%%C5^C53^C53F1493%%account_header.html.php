<?php /* Smarty version 2.6.18, created on 2012-04-04 03:59:52
         compiled from account/modules/account_header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/modules/account_header.html', 8, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<table width="500" cellpadding="2" cellspacing="2" border="0"><tr>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'account'): ?>
<td><font size="2" face="Tahoma">Account Summary</font></td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
">
<font size="2" face="Tahoma">Account Summary</font></a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'personal'): ?>
<td><font size="2" face="Tahoma">Personal Information</font></td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
">
<font size="2" face="Tahoma">Personal Information</font></a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>
<td><font size="2" face="Tahoma">Settings</font></td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_SETTINGS','ssl' => true), $this);?>
">
<font size="2" face="Tahoma">Settings</font></a></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'public'): ?>
<td><font size="2" face="Tahoma">Public Information</font></td>
<?php else: ?>
<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PUBLIC','ssl' => true), $this);?>
">
<font size="2" face="Tahoma">Public Information Summary</font></a></td>
<?php endif; ?>
</tr>
</table>