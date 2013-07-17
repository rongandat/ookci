<?php /* Smarty version 2.6.18, created on 2012-06-05 09:36:29
         compiled from users/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'users/edit.html', 2, false),)), $this); ?>
<h4>User Details: #<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</h4>
<form name="frmEdit" action="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_USERS'), $this);?>
" method="post" >
<input type="hidden" name="action" value="save"  />
<input type="hidden" value="<?php echo $this->_tpl_vars['user_data']['user_id']; ?>
" name="user_id" />
<input type="hidden" value="<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
" name="account_number" />

<table width="100%" cellpadding="2" cellspacing="2"  border="0">
	<tr><td width="7%">First Name</td><td width="93%"><input name="firstname" value="<?php echo $this->_tpl_vars['user_data']['firstname']; ?>
" type="input"  /></td></tr>
	<tr><td>Last Name</td><td><input name="lastname" value="<?php echo $this->_tpl_vars['user_data']['lastname']; ?>
" type="input"  /></td></tr>
 	<tr><td>E-mail</td><td><input name="email" value="<?php echo $this->_tpl_vars['user_data']['email']; ?>
" type="input"  /></td></tr>
	<tr><td>Mobile</td><td><input name="mobile" value="<?php echo $this->_tpl_vars['user_data']['mobile']; ?>
" type="input"  /></td></tr>
	<tr><td>Phone</td><td><input name="phone" value="<?php echo $this->_tpl_vars['user_data']['phone']; ?>
" type="input"  /></td></tr>
  	<tr><td colspan="2">Additional Information<br /><textarea name="additional_information" rows="3"  cols="80"><?php echo $this->_tpl_vars['user_data']['additional_information']; ?>
</textarea></td></tr>
 
	<tr><td colspan="2"><input class="button" type="submit" value="Save"  /></td></tr>
</table>
</form>
<br>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td><a href="javascript: closeUserDetailsContent();" class="linkButton">Close</a></td></tr>
</table>