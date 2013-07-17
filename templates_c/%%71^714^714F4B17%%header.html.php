<?php /* Smarty version 2.6.18, created on 2012-03-28 16:42:31
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'header.html', 13, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<font face="Tahoma" size="2"><?php if ($_SESSION['login_main_account_info']): ?> </font>	
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="830" id="AutoNumber2">
	<tr><td width="100" align="center">
		<table cellpadding="2" cellspacing="2" border="0" width="400">		
		<tr>
			<font face="Tahoma" size="2"><?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'account'): ?>
            </font>
			<td><font face="Tahoma" size="2">Account</font></td>		
			<font face="Tahoma" size="2"><?php else: ?> </font>
				<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
" >
                <font face="Tahoma" size="2">Account</font></a></td>
			<font face="Tahoma" size="2"><?php endif; ?>
			<?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'personal'): ?>
            </font>
			<td><font face="Tahoma" size="2">Profile</font></td>		
			<font face="Tahoma" size="2"><?php else: ?> </font>
				<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
" >
                <font face="Tahoma" size="2">Profile</font></a></td>
			<font face="Tahoma" size="2"><?php endif; ?>
			<?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'history'): ?>
            </font>
			<td><font face="Tahoma" size="2">History</font></td>		
			<font face="Tahoma" size="2"><?php else: ?> </font>
				<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
" >
                <font face="Tahoma" size="2">History</font></a></td>
			<font face="Tahoma" size="2"><?php endif; ?>			
			<?php if ($this->_tpl_vars['CURRENT_MODULE'] == 'account' && $this->_tpl_vars['CURRENT_PAGE'] == 'transfer'): ?>
            </font>
			<td><font face="Tahoma" size="2">Transfer</font></td>		
			<font face="Tahoma" size="2"><?php else: ?> </font>
				<td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
" >
                <font face="Tahoma" size="2">Transfer</font></a></td>
			<font face="Tahoma" size="2"><?php endif; ?> </font>			

		</tr>
	</table></td></tr>	
	<tr><td headers="50">&nbsp;</td></tr>
  </table>
  </center>
</div>
<div align="center">
  <center>
  <table border="0" cellpadding="10" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="830" id="AutoNumber3">
    <tr>
      <td width="100%"><font face="Tahoma" size="2"><?php endif; ?>	
<?php if ($_SESSION['login_userid'] != '' && $_SESSION['login_account_number'] != '' && $_SESSION['login_main_account_info']): ?>
      </font></td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>
   <table border="0" cellpadding="10" cellspacing="0"  bgcolor="#EEEEEE"  width="830" style="border-collapse: collapse" bordercolor="#111111">
    <tr><td><font face="Tahoma" size="2">Welcome <strong><?php echo $_SESSION['login_main_account_info']['firstname']; ?>
&nbsp;<?php echo $_SESSION['login_main_account_info']['lastname']; ?>
</strong>! You are now logged in to <strong><?php echo $_SESSION['login_account_number']; ?>
 (<?php echo $_SESSION['login_main_account_info']['account_name']; ?>
)</strong> | <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGOUT','ssl' => true), $this);?>
"><font color="red"><strong>Logout</strong></font></a></font></td></tr>
</table>	 
  </center>
</div>  
<font face="Tahoma" size="2"><?php endif; ?></font>