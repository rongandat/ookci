<?php /* Smarty version 2.6.18, created on 2010-02-20 08:53:03
         compiled from security_questions/deleteform.html */ ?>
<form name="frmdeleteconfirm" action="<?php echo $this->_tpl_vars['link_security_questions']; ?>
" method="post">
	<input type="hidden"  name="action" value="deleteconfirm"  />
	<input type="hidden"  name="security_questionID" value="<?php echo $this->_tpl_vars['security_questioninfo']['security_questions_id']; ?>
"  />	
	<table width="100%" cellpadding="2" cellspacing="2" border="0"  class="confirmContent">
		<tr><td class="maintext"><strong><?php echo $this->_tpl_vars['security_questioninfo']['question']; ?>
</strong></td></tr>
		<tr><td class="error"><?php echo $this->_tpl_vars['langs']['TEXT_DELETE_CONFIRM_MESSAGE']; ?>
</td></tr>
		<tr><td>
	    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_CONFIRM']; ?>
" class="button">
        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onclick="closeConfirmForm()"  class="button">
		</td></tr>
	</table>	
</form>