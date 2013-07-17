<?php /* Smarty version 2.6.18, created on 2012-03-26 22:31:54
         compiled from transactions/addfunds.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'transactions/addfunds.html', 5, false),array('function', 'html_options', 'transactions/addfunds.html', 82, false),)), $this); ?>
<h2>Add Funds</h2>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_ADD_FUNDS'), $this);?>
" method="post" name="frmNew" >
	<input type="hidden"  name="action" value="process" />
	<input type="hidden" name="step" value="<?php echo $this->_tpl_vars['step']; ?>
"  />
<?php if ($this->_tpl_vars['step'] == 'confirm'): ?>
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
		<tr><td>Please make sure you want to <strong>add funds</strong> to account <strong><?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
</strong> with the follow informations:</td></tr>
	</table>
	<br />
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
		<tr>
			  <td width="120">Amount Name</td>
			  <td><?php echo $this->_tpl_vars['transfer_info']['account_name']; ?>
</td>
		  </tr>			

	<tr>
			  <td>First Name</td>
			  <td><?php echo $this->_tpl_vars['transfer_info']['firstname']; ?>
</td>
		  </tr>			

	<tr>
			  <td>Last Name</td>
			  <td><?php echo $this->_tpl_vars['transfer_info']['lastname']; ?>
</td>
		  </tr>			
	  <tr>	  
	</table>
	<br />
	<h4>Transfer Informations</h4>
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
	<td width="120">Account Number:</td>
			  <td><strong><?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
</strong></td>
		  </tr>
			<tr>
			  <td>Balance Currency</td>
			  <td><strong><?php echo $this->_tpl_vars['transfer_info']['balance_currency']; ?>
</strong></td>
		  </tr>	
	<tr>
			  <td>Amount(Funds)</td>
			  <td><strong><?php echo $this->_tpl_vars['transfer_info']['amount']; ?>
</strong></td>
		  </tr>		
	<tr>
			  <td>Transaction Memo</td>
			  <td><strong><?php echo $this->_tpl_vars['transfer_info']['transaction_memo']; ?>
</strong></td>
		  </tr>			  	
	</table>
	<br />
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
	<tr>  <td>
		    <input type="submit" name="btnTransfer" value="Transfer" class="button">
	        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="redirect('<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_ADD_FUNDS'), $this);?>
');" class="button">
		  </td>
	  </tr>	
	</table>
	<input type="hidden" name="account_number" value="<?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
"  />
	<input type="hidden" name="to_userid" value="<?php echo $this->_tpl_vars['transfer_info']['user_id']; ?>
"  />
	<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['transfer_info']['amount']; ?>
"  />
	<input type="hidden" name="transaction_memo" value="<?php echo $this->_tpl_vars['transfer_info']['transaction_memo']; ?>
"  />	
	<input type="hidden" name="balance_currency"	value="<?php echo $this->_tpl_vars['transfer_info']['balance_currency']; ?>
"  />
	
<?php elseif ($this->_tpl_vars['step'] == 'completed'): ?>	
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
		<tr><td colspan="2" class="success">You have done add funds transaction to account number<strong><?php echo $this->_tpl_vars['transaction_data']['to_account']; ?>
</strong> with the follow information:</td></tr>
		<tr><td width="120">Amount</td><td><?php echo $this->_tpl_vars['transaction_data']['amount_text']; ?>
</td></tr>
		<tr><td>Batch Number#</td><td><strong><?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</strong></td></tr>		
		<tr><td colspan="2">
	        <input type="button" name="btnBack" value="Transaction History" onClick="redirect('<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_TRANSACTIONS'), $this);?>
');" class="button">
		  </td>
		</tr>  
	</table>
<?php else: ?>
 	<table width="100%" cellpadding="2" cellspacing="2"  border="0">	
			<tr>
		  <td width="120">*Account Number:</td>
		  <td><input name="account_number" type="text" id="account_number" value="<?php echo $this->_tpl_vars['account_number']; ?>
" maxlength="8" size="10"> (please make sure you inputed correct account number that you want to add new funds to.)</td>
	  </tr>
		<tr>
		  <td>*Balance Currency</td>
		  <td><select name="balance_currency" >
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

			</select></td>
	  </tr>		
	<tr>
		  <td>*Amount</td>
		  <td><input name="amount" type="text" id="amount" value="<?php echo $this->_tpl_vars['amount']; ?>
" size="5" maxlength="5"></td>
	  </tr>		
<tr>
		  <td>Transaction Memo(optional)</td>
		  <td><textarea name="transaction_memo" type="text" id="transaction_memo" cols="50"  rows="3"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea></td>
	  </tr>		  	  		
		<tr>
		  <td>&nbsp;</td>
		  <td>
		    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_SUBMIT']; ?>
" class="button">
	        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="redirect('<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_TRANSACTIONS'), $this);?>
');" class="button">
		  </td>
	  </tr>
	</table>
<?php endif; ?>
</form>	
</div>