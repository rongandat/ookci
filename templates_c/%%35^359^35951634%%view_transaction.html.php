<?php /* Smarty version 2.6.18, created on 2010-03-16 01:48:29
         compiled from account/view_transaction.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'account/view_transaction.html', 6, false),)), $this); ?>
<font size="2" face="Tahoma"><strong>Transaction Details: #<?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</strong></font>
<table cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
	<tr><td width="120"><font size="2" face="Tahoma">Batch Number#</font></td><td>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</font></td></tr>
	<tr><td><font size="2" face="Tahoma">Date</font></td><td>
      <font size="2" face="Tahoma"><?php echo ((is_array($_tmp=$this->_tpl_vars['transaction_data']['transaction_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</font></td></tr>	
	<tr><td><font size="2" face="Tahoma">From Account</font></td><td><strong>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['from_account']; ?>
</font></strong></td></tr>						
	<tr><td><font size="2" face="Tahoma">To Account</font></td><td><strong>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['to_account']; ?>
</font></strong></td></tr>			
	<tr><td><font size="2" face="Tahoma">Balance Currency</font></td><td>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['transaction_currency']; ?>
</font></td></tr>				
	<tr><td><font size="2" face="Tahoma">Amount</font></td><td>
      <font face="Tahoma"><font size="2"><?php if ($this->_tpl_vars['transaction_data']['from_userid'] == $_SESSION['login_userid']): ?><font color="red">-<?php echo $this->_tpl_vars['transaction_data']['amount_text']; ?>
</font><?php else: ?></font><font size="2" color="green"> +<?php echo $this->_tpl_vars['transaction_data']['amount_text']; ?>
<?php endif; ?></font></font></td></tr>			
	<font size="2" face="Tahoma"><?php if ($this->_tpl_vars['transaction_data']['fee_text'] != ''): ?> </font>
	<tr><td><font size="2" face="Tahoma">Fee</font></td><td>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['fee_text']; ?>
</font></td></tr>					
	<font size="2" face="Tahoma"><?php endif; ?> </font>
	<tr><td><font size="2" face="Tahoma">Transaction Status</font></td><td><strong>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['transaction_status']; ?>
</font></strong></td></tr>						
	<font size="2" face="Tahoma"><?php if ($this->_tpl_vars['transaction_data']['transaction_memo'] != ''): ?>
    </font>	
	<tr><td><font size="2" face="Tahoma">Transaction Memo</font></td><td>
      <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['transaction_memo']; ?>
</font></td></tr>							
	<font size="2" face="Tahoma"><?php endif; ?> </font>
</table>
<font size="2" face="Tahoma">
<br>
</font>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td><a href="javascript: closeTransactionDetailsContent();" class="linkButton">
  <font size="2" face="Tahoma">Close</font></a></td></tr>
</table>