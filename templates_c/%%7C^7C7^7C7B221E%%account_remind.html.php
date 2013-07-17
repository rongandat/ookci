<?php /* Smarty version 2.6.18, created on 2012-03-29 00:03:40
         compiled from home/account_remind.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/account_remind.html', 1, false),)), $this); ?>
<form name="frmRemind" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_REMIND','ssl' => true), $this);?>
" method="post" >
<input name="action" value="process" type="hidden" />
<div align="right">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1">
    <tr>
      <td width="100%" height="20">&nbsp;</td>
    </tr>
  </table>
</div>
<div align="center">
  <center>
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr>
	  <td  class="pageHeading" height="50" valign="top"><b>
      <font face="Tahoma" color="#6666FF">Account Number Reminder</font></b></td>
	</tr>
	<tr><td><font size="2" face="Tahoma">Use this form if you have forgotten your account number, but you know your e-mail address. Please input your e-mail address in the field below and click Send and your account number will be sent via e-mail.</font></td></tr>
</table>
  </center>
</div>
<font size="2" face="Tahoma">
<br />
	</font>
<div align="center">
  <center>
	<table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
		<tr>
		  <td  colspan="2"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
		</tr>
		<tr>
		  <td class="form_label"><font size="2" face="Tahoma">*Email:</font></td>
		  <td class="form_field"><font face="Tahoma">
          <input  name="email" type="text"  value="<?php echo $this->_tpl_vars['email']; ?>
"  class="inputtext" size="20"  /></font></td>
		  </tr>	
	</table>	  
  </center>
</div>
<font size="2" face="Tahoma">	  
<br />	  
</font>
<div align="center">
  <center>	  
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr> <td ><font face="Tahoma"><strong><font size="2">Enter the code (turing number) shown on the image</font></strong><font size="2">	
<br />Cannot read the numbers? Click on it to get a new one.<br />
<a href="javascript: refreshSecureImage();"><img src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE','ssl' => true), $this);?>
"   border="0" id="secure_image" /></a><br />
</font>
<input   name="security_code"   class="inputtext" size="20"/></font><font size="2" face="Tahoma">
<br /><a  href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US','ssl' => true), $this);?>
" class="link">Cannot see Turing number at all?</a>
</font> </td></tr>
</table>
      </center>
    </div>
    <font size="2" face="Tahoma">
<br />
</font>
<table cellpadding="2" cellspacing="2" border="0" width="100%" height="87" >
<tr ><td align="center"  class="contenButtons" height="80" valign="top">
  <font face="Tahoma"><input  type="submit" name="buttonSend" class="button"  value="Send" /></font></td></tr>
</table>
</form>