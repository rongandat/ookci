<?php /* Smarty version 2.6.18, created on 2012-04-04 03:58:40
         compiled from home/account_remind_sent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/account_remind_sent.html', 29, false),)), $this); ?>
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
		  <td ><font size="2" face="Tahoma">Your account number has been successfully sent to <strong><?php echo $this->_tpl_vars['email']; ?>
</strong>.</font></td>
		</tr>
	</table>	  
  </center>
</div>
<font size="2" face="Tahoma">	  
<br />
</font>
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
<tr ><td align="center"  class="contenButtons" height="80" valign="top">
  <font face="Tahoma"><input  type="submit" name="buttonLogin" class="button"  value="Login"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
')"/></font></td></tr>
</table>