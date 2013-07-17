<?php /* Smarty version 2.6.18, created on 2012-03-29 02:22:31
         compiled from home/reset_password.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
" method="post" >
<input name="action" value="process" type="hidden" />
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
	<tr>
	  <td  class="pageHeading">Account Reset Wizard: Step 1/3</td>
	</tr>
	<tr><td>This form will send you a 10 digit reset code to the email associated with your account. Please do not use this form if your email account is not safe or compromised.</td></tr>
	<tr><td>Fields marked with asterisk (<i>*</i>) are required.</td></tr>	
</table>
<br />
	<table cellpadding="0" cellspacing="0" border="0" class="form_content">
		<tr>
		  <td  colspan="2"><i><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></i></td>
		</tr>
		<tr>
		  <td class="form_label"><i>*</i>Your account number:</td>
		  <td class="form_field"><input  name="account_number" type="text"  value="<?php echo $this->_tpl_vars['account_number']; ?>
"  class="inputtext"  /></td>
		  </tr>	
		<tr>
		  <td class="form_label"><i>*</i>Your E-mail address:</td>
		  <td class="form_field"><input  name="email" type="text"  value="<?php echo $this->_tpl_vars['email']; ?>
"  class="inputtext"  /></td>
		  </tr>	

	</table>	  
<br />	  
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
	<tr> <td ><strong>Enter the code (turing number) shown on the image</strong>	
<br />Cannot read the numbers? Click on it to get a new one.<br />
<a href="javascript: refreshSecureImage();"><img src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE','ssl' => true), $this);?>
"   border="0" id="secure_image" /></a><br />
<input name="security_code" class="inputtext"/>
<br /><a  href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US','ssl' => true), $this);?>
" class="link">Cannot see Turing number at all?</a> </td></tr>
</table>
<br />
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
<tr ><td align="center"  class="contenButtons"><input  type="submit" name="buttonSend" class="button"  value="Send Me Code" /></td></tr>
</table>
</form>