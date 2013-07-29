<?php /* Smarty version 2.6.18, created on 2010-02-20 04:45:38
         compiled from news/deleteform.html */ ?>
<span class="maintext"><strong><?php echo $this->_tpl_vars['newsinfo']['news_title']; ?>
</strong></span><br />	
<form name="frmdeletenew" action="<?php echo $this->_tpl_vars['link_news']; ?>
&action=deleteconfirm&news_id=<?php echo $this->_tpl_vars['newsinfo']['news_id']; ?>
" method="post">
	<table width="100%" cellpadding="2" cellspacing="2" border="0"  class="confirmContent">
		<tr><td class="error"><?php echo $this->_tpl_vars['langs']['TEXT_DELETE_CONFIRM_MESSAGE']; ?>
</td></tr>
		<tr><td>
	    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['langs']['BUTTON_CONFIRM']; ?>
" class="button">
        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onclick="closeConfirmForm()"  class="button">
		</td></tr>
	</table>	
</form>