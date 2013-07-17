<?php /* Smarty version 2.6.18, created on 2010-02-28 08:55:10
         compiled from transactions/view.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'transactions/view.html', 4, false),)), $this); ?>
<h4>Transaction Details: #<?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</h4>
<table width="100%" cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
	<tr><td width="100">Batch Number#</td><td><?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</td></tr>
	<tr><td>Date</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['transaction_data']['transaction_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</td></tr>	
	<tr><td>From Account</td><td><?php echo $this->_tpl_vars['transaction_data']['from_account']; ?>
</td></tr>		
	<tr><td>To Account</td><td><strong><?php echo $this->_tpl_vars['transaction_data']['to_account']; ?>
</strong></td></tr>			
	<tr><td>Amount</td><td><?php echo $this->_tpl_vars['transaction_data']['amount_text']; ?>
</td></tr>			
	<?php if ($this->_tpl_vars['transaction_data']['fee_text'] != ''): ?>
	<tr><td>Fee</td><td><?php echo $this->_tpl_vars['transaction_data']['fee_text']; ?>
</td></tr>					
	<?php endif; ?>
	<tr><td>Transaction Status</td><td><strong><?php echo $this->_tpl_vars['transaction_data']['transaction_status']; ?>
</strong></td></tr>						
	<?php if ($this->_tpl_vars['transaction_data']['transaction_memo'] != ''): ?>	
	<tr><td>Transaction Memo</td><td><?php echo $this->_tpl_vars['transaction_data']['transaction_memo']; ?>
</td></tr>							
	<?php endif; ?>
</table>
<br>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td><a href="javascript: closeTransactionDetailsContent();" class="linkButton">Close</a></td></tr>
</table>