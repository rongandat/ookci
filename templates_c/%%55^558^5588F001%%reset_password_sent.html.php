<?php /* Smarty version 2.6.18, created on 2012-03-29 05:32:48
         compiled from home/reset_password_sent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password_sent.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
" method="post" >
<input name="action" value="process2" type="hidden" />
<input name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" type="hidden" /><input name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" type="hidden" />
<div align="right">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1">
    <tr>
      <td width="100%"></td>
    </tr>
  </table>
</div>
<div align="center">
  <center>
  <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr>
	  <td  class="pageHeading" height="50" valign="top"><b>
      <font face="Tahoma" color="#6666FF">Account Reset Wizard: Step 2/3</font></b></td>
	</tr>
	<tr><td><font size="2" face="Tahoma">Your account login reset code has been successfully sent to <strong><?php echo $this->_tpl_vars['email']; ?>
</strong>.</font>
    <i><?php echo $this->_tpl_vars['message_err']; ?>
</i>
    </td></tr>
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
		  <td class="form_label">Your account number:</td>
		  <td class="form_field"><?php echo $this->_tpl_vars['account_number']; ?>
</td>
		  </tr>	
		<tr>
		  <td class="form_label">Your E-mail address:</td>
		  <td class="form_field"><?php echo $this->_tpl_vars['email']; ?>
</td>
	</tr>
		<tr>
        <td class="form_label"><i>*</i>Reset Code:</td>
		  <td class="form_field"><input  name="reset_code" type="text"  value=""  class="inputtext"  /></td>		
		</tr>
        <tr>
        <td class="form_label"><i>*</i><?php echo $this->_tpl_vars['security_question']; ?>
:</td>
		  <td class="form_field"><input  name="security_question" type="text"  value=""  class="inputtext"  /></td>		
		</tr>
        <tr>        
	</table>	  
  </center>
</div>
<font size="2" face="Tahoma">	  
<br />
</font>
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
<tr ><td align="center"  class="contenButtons"><font face="Tahoma">
<input  type="submit" name="buttonNext" class="button"  value="Next"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_GET_PASSWORD','ssl' => true), $this);?>
')"/></font></td></tr>
</table>
</form>