<?php /* Smarty version 2.6.18, created on 2010-02-28 08:54:58
         compiled from home/login.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['admin_id'] > 0): ?>
	<div><?php echo $this->_tpl_vars['TEXT_LOGGED']; ?>
</div>
<?php else: ?>
	<div class="heading_title02"><?php echo $this->_tpl_vars['TEXT_LOGIN_NOTICE']; ?>
</div>
	<form name="frmLogin" action="<?php echo $this->_tpl_vars['action_login']; ?>
" method="post" >
			<table width="50%" cellpadding="2" cellspacing="2" >
					<tr><td><?php echo $this->_tpl_vars['LABEL_USERNAME']; ?>
</td><td><input name="username"  value="<?php echo $this->_tpl_vars['username']; ?>
" type="text" /></td></tr>
					<tr><td><?php echo $this->_tpl_vars['LABEL_PASSWORD']; ?>
</td><td><input name="password"  type="password"/></td></tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input type="checkbox" name="remember_me"  /><?php echo $this->_tpl_vars['LABEL_REMEMBER_ME']; ?>
&nbsp;</td>
			  </tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input type="submit" name="btnlogin" value="<?php echo $this->_tpl_vars['LABEL_ACCESS_ADMIN_PANEL']; ?>
"  class="button" />&nbsp;</td>
			 		 </tr>
			</table>
	</form>
<?php endif; ?>
