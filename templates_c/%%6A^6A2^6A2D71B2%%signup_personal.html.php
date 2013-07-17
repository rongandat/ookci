<?php /* Smarty version 2.6.18, created on 2010-03-11 17:31:57
         compiled from home/signup_personal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/signup_personal.html', 1, false),array('function', 'html_options', 'home/signup_personal.html', 55, false),)), $this); ?>
<form name="frmSignup" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP_PERSONAL'), $this);?>
"  >
<input type="hidden" name="action" value="process"  />
<div align="right">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1" height="20">
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
      <font face="Tahoma" color="#6666FF">Registration: Part 2 of 2 </font></b> </td>
	</tr>
	<tr><td><font size="2" face="Tahoma">Your account is not yet active. Please complete this form to activate your account.</font></td></tr>
	<tr><td><font size="2" face="Tahoma">Fields marked with asterisk (<font color="#FF0000">*</font>) are required.</font></td></tr>
	<tr><td height="30">&nbsp;</td></tr>
	<tr><td height="30" valign="top"><font face="Tahoma"><strong><span class="contentTitle2">
      <font size="2" color="#800000">Personal Information</font></span></strong><font size="2">
      </font></font> </td></tr>
</table>
  </center>
</div>
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
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Account Name:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="account_name" type="text"  value="<?php echo $this->_tpl_vars['account_name']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>	
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma">Company Name:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="company_name" type="text"  value="<?php echo $this->_tpl_vars['company_name']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		  
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Address:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="address" type="text"  value="<?php echo $this->_tpl_vars['address']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>	
<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>City:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="city" type="text"  value="<?php echo $this->_tpl_vars['city']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		   
	<tr> <td class="form_label"><font size="2" face="Tahoma">
      <font color="#FF0000">*</font>Country:</font></td>	  
	  <td class="form_field"><font face="Tahoma"><select name="country_id"  class="inputselect"  onchange="getStates(this.value);">
	  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries_array'],'selected' => $this->_tpl_vars['country_id']), $this);?>
</select></font><font size="2" face="Tahoma">
      </font>
	  </td></tr>	
	<tr> <td class="form_label"><font size="2" face="Tahoma">
      <font color="#FF0000">*</font>State/Region:</font></td>	  
	  <td class="form_field"><font face="Tahoma"><select name="state"  id="state" class="state" >
	  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['zones_array'],'selected' => $this->_tpl_vars['state']), $this);?>
</select></font><font size="2" face="Tahoma">
      </font>
	  </td></tr>	  
<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Zip/Post Code:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="postcode" type="text"  value="<?php echo $this->_tpl_vars['postcode']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		  
	<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Date of Birth:</font></td>
	  <td  class="form_field"><font face="Tahoma"><select name="dobMonth" class="inputselect">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['dobMonth']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><select name="dobDay" class="inputselect">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['dobDay']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;&nbsp;
      </font><font face="Tahoma">
<select name="dobYear" class="inputselect">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['dobYear']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;(mm/dd/yy)
      </font>
	</td></tr>	 	  		
<tr>
	  <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Phone:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="phone" type="text"  value="<?php echo $this->_tpl_vars['phone']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		  
<tr>
	  <td class="form_label"><font size="2" face="Tahoma">Mobile:</font></td>
	  <td class="form_field"><font face="Tahoma">
      <input  name="mobile" type="text"  value="<?php echo $this->_tpl_vars['mobile']; ?>
"  class="inputtext" size="20"  /></font></td>
	  </tr>		  
	
</table>
  </center>
</div>
<font size="2" face="Tahoma">
<br />
</font>
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
<tr ><td align="center"  class="contenButtons"><font face="Tahoma"><input  type="submit" name="buttonSubmit" class="button"  value="Submit" /></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonCancel" onclick="window.location='<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT'), $this);?>
';"  class="button"  value="Cancel"></font></td></tr>
</table>
</form>