<?php /* Smarty version 2.6.18, created on 2012-05-18 06:36:53
         compiled from home/reset_password_success.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/reset_password_success.html', 1, false),)), $this); ?>
<form name="frmReset" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD'), $this);?>
" method="post" >
<input name="action" value="process" type="hidden" />
<table cellpadding="2" cellspacing="2" border="0" width="100%" >
	<tr>
	  <td  class="pageHeading">Account Reset Succeeded

</td>
	</tr>
	<tr><td>Thank you. Your account access info has been successfully changed. Please use new credentials to login to your account.</td></tr>	
</table>
<br />

</form>