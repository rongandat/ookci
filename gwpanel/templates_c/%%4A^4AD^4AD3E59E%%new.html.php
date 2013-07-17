<?php /* Smarty version 2.6.18, created on 2012-06-03 07:00:36
         compiled from admins/new.html */ ?>
<h2><?php echo $this->_tpl_vars['HEADING_NEW_ADMIN_ACCOUNT']; ?>
</h2>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo $this->_tpl_vars['action_link']; ?>
" method="post" name="frmAdmin" >
 	<table width="100%" cellpadding="2" cellspacing="2" >
	
		<tr>
		  <td width="22%"><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_USERNAME']; ?>
*</td>
		  <td width="78%"><input name="admin_username" type="text" id="admin_username" value="<?php echo $this->_tpl_vars['admin_username']; ?>
"></td>
	  </tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_NAME']; ?>
</td>
		  <td><input name="admin_contactname" type="text" id="admin_contactname" value="<?php echo $this->_tpl_vars['admin_contactname']; ?>
" size="30"></td>
	  </tr>
		
		<tr>
		  <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_EMAIL']; ?>
*</td>
		  <td><input name="admin_email" type="text" id="admin_email" value="<?php echo $this->_tpl_vars['admin_email']; ?>
"  size="30"></td>
	  </tr>
		
		<tr>
		  <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_PASSWORD']; ?>
*</td>
		  <td><input name="admin_password" type="text" id="admin_password" value="<?php echo $this->_tpl_vars['admin_password']; ?>
" size="30"></td>
	  </tr>
	
		<tr>
		  <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_CONFIRM_PASSWORD']; ?>
*</td>
		  <td><input name="confirm_password" type="text" id="confirm_password" value="<?php echo $this->_tpl_vars['confirm_password']; ?>
" size="30"></td>
	  </tr>
	    
	  		
		<tr>
		  <td>&nbsp;</td>
		  <td>
		    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_SUBMIT']; ?>
" class="button">
	        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="window.location	=	'<?php echo $this->_tpl_vars['back_link']; ?>
';" class="button">
		  </td>
	  </tr>
	</table>
</form>	
</div>