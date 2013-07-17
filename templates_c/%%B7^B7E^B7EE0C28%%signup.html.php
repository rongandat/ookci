<?php /* Smarty version 2.6.18, created on 2012-03-05 03:13:24
         compiled from home/signup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/signup.html', 2, false),array('function', 'html_options', 'home/signup.html', 89, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="frmSignup" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP'), $this);?>
"  >
<input type="hidden" name="action" value="process"  />
<div align="right">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
  </table>
</div>
<div align="center">
  <center>
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr>
	  <td  class="pageHeading" height="50" valign="top"><b>
      <font face="Tahoma" color="#6666FF"><?php echo $this->_tpl_vars['langs']['signup']['SIGNUP_PAGE_HEADING']; ?>
</font></b></td>
	</tr>
	<tr><td><font size="2" face="Tahoma">Thank you for deciding to open a 
      Global Cash account. Please follow directions carefully to avoid mistakes and delays during the registration process.</font></td></tr>
	<tr><td><font size="2" face="Tahoma">Fields marked with asterisk (<font color="#FF0000">*</font>) are required.</font></td></tr>
</table>
  </center>
</div>
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber2" height="30">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>
<table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
	  <td  colspan="2"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
	</tr>
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>First Name:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="firstname" type="text"  value="<?php echo $this->_tpl_vars['firstname']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>	
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Last Name:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="lastname" type="text"  value="<?php echo $this->_tpl_vars['lastname']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		  
<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>E-mail:</font></td>
	  <td  class="form_field"><font face="Tahoma">
      <input  name="email" type="text" id="email"  value="<?php echo $this->_tpl_vars['email']; ?>
"   class="inputtext" size="20" /></font><font size="2" face="Tahoma">
      </font> </td>
	  </tr>	  
<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Re-enter e-mail:</font></td>
	  <td  class="form_field"><font face="Tahoma">
      <input  name="confirm_email" type="text" id="confirm_email"  value="<?php echo $this->_tpl_vars['confirm_email']; ?>
"   class="inputtext" size="20" /></font><font size="2" face="Tahoma">
      </font> </td>
	  </tr>	  	  
</table>	
  </center>
</div>
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber3" height="30">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>	
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr> <td  class="pageHeading" height="30" valign="top">
      <font size="2" face="Tahoma">Security Information </font> </td></tr>
	<tr><td height="30" valign="top"><font size="2" face="Tahoma">Password, login PIN and master key will be automatically generated for your account.
      </font> </td></tr>
</table>	
  </center>
</div>
<div align="center">
  <center>	
<table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Security Question:</font></td>
	  <td class="form_field"><font face="Tahoma"><select name="security_question" class="inputselect" onchange="checkSecurityQuestion(this.value);">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['security_questions_array'],'selected' => $this->_tpl_vars['security_question']), $this);?>
</select></font></td> </tr>	
	<tr id="content_custom_question" <?php if ($this->_tpl_vars['security_question'] != -1): ?> style="display: none;" <?php endif; ?>>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>or write your own:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="custom_question" type="text"  value="<?php echo $this->_tpl_vars['custom_question']; ?>
"  class="inputtext" size="20"  /></font></td> 
	 </tr>	
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Answer:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="security_answer" type="text"  value="<?php echo $this->_tpl_vars['security_answer']; ?>
"  class="inputtext" size="20"  /></font></td> </tr>		  
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Personal welcome message:</font></td>
	  <td class="form_field"><font face="Tahoma"><textarea  name="welcome_message" rows="3" cols="50" class="inputtextarea"><?php echo $this->_tpl_vars['welcome_message']; ?>
</textarea></font></td> </tr>
</table>	
  </center>
</div>
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber3" height="30">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>	
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr> <td ><font face="Tahoma"><strong><font size="2">Enter the code (turing number) shown on the image</font></strong><font size="2">	
<br />Cannot read the numbers? Click on it to get a new one.<br />
<a href="javascript: refreshSecureImage();"><img src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE'), $this);?>
"   border="0" id="secure_image" /></a><br />
</font>
<input   name="security_code"   class="inputtext" size="20"/></font><font size="2" face="Tahoma">
<br /><a  href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US'), $this);?>
" class="link">Cannot see Turing number at all?</a>
</font> </td></tr>
<tr><td height="30">&nbsp;</td></tr>
<tr><td>
  <p align="center"><font size="2" face="Tahoma">If you agree with <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_TERMS'), $this);?>
" target="_blank">Terms of Our Service</a> click "Agree" to continue the registration.</font></td></tr>
</table>	
      </center>
    </div>
    <font size="2" face="Tahoma">	
<br />
</font>
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
<tr ><td align="center" class="contenButtons" ><font face="Tahoma"><input  type="submit" name="buttonAgree" class="button"  value="Agree" /></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonDisagree" onclick="window.location='<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT'), $this);?>
';"  class="button"  value="Disagree"></font></td></tr>
</table>
</form>
    <font size="2" face="Tahoma">
<br /></font>