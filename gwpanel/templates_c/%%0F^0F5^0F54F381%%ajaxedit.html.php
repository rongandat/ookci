<?php /* Smarty version 2.6.18, created on 2010-02-28 18:35:21
         compiled from settings/ajaxedit.html */ ?>
<h4><?php echo $this->_tpl_vars['langs']['HEADING_EDIT_TITLE']; ?>
</h4>
<form name="frmedit" action="<?php echo $this->_tpl_vars['link_settings']; ?>
" method="post">
	<input type="hidden" value="update" name="action" />
	<input type="hidden" value="<?php echo $this->_tpl_vars['configinfo']['configuration_id']; ?>
" name="cID" />	
	<table width="100%" cellpadding="2" cellspacing="2" border="0" class="editContent">
	<tr><td class="mainText" width="150"><?php echo $this->_tpl_vars['langs']['TEXT_CONFIGURATION_TITLE']; ?>
</td>
		<td><strong><?php echo $this->_tpl_vars['configinfo']['configuration_title']; ?>
</strong></td></tr>
	<tr><td class="mainText"><?php echo $this->_tpl_vars['langs']['TEXT_CONFIGURATION_DESC']; ?>
</td>
		<td><strong><?php echo $this->_tpl_vars['configinfo']['configuration_description']; ?>
</strong></td></tr>
	<tr><td class="mainText"><?php echo $this->_tpl_vars['langs']['TEXT_CONFIGURATION_VALUE']; ?>
</td>
		<td><?php echo $this->_tpl_vars['configuration_value_field_html']; ?>
</td></tr>
	<tr><td  colspan="2">
	    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_CONFIRM']; ?>
" class="button">
        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onclick="closeConfirmForm()"  class="button">
	</td></tr>
</table>
</form>