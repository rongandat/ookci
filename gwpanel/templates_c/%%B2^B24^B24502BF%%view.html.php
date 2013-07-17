<?php /* Smarty version 2.6.18, created on 2010-03-01 19:05:33
         compiled from users/view.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'users/view.html', 10, false),array('function', 'dev_get_state_name', 'users/view.html', 18, false),array('function', 'dev_get_country_name', 'users/view.html', 19, false),)), $this); ?>
<h4>User Details: #<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</h4>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td width="45%" valign="top">
	<table width="100%" cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
		<tr><td width="100">Account Number#</td><td><?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</td></tr>
		<tr><td width="100">Account Type</td><td><?php if ($this->_tpl_vars['user_data']['account_type'] == 'user'): ?> User <?php endif; ?></td></tr>		
		<tr><td>First Name</td><td><?php echo $this->_tpl_vars['user_data']['firstname']; ?>
</td></tr>		
		<tr><td>Last Name</td><td><?php echo $this->_tpl_vars['user_data']['lastname']; ?>
</td></tr>	
		<tr><td>Account Name</td><td><strong><?php echo $this->_tpl_vars['user_data']['account_name']; ?>
</strong></td></tr>						
		<tr><td>Signup date</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['user_data']['signup_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</td></tr>				
		<tr><td>Date of Birth</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['user_data']['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y") : smarty_modifier_date_format($_tmp, "%m/%d/%Y")); ?>
</td></tr>			
	</table>
</td>
<td width="45%" valign="top">
	<table width="100%" cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
		<tr><td width="100">Address</td><td><?php echo $this->_tpl_vars['user_data']['address']; ?>
</td></tr>
		<tr><td>City</td><td><?php echo $this->_tpl_vars['user_data']['city']; ?>
</td></tr>		
		<tr><td>State</td><td><?php echo smarty_function_dev_get_state_name(array('state' => $this->_tpl_vars['user_data']['state']), $this);?>
</td></tr>	
		<tr><td>Country</td><td><strong><?php echo smarty_function_dev_get_country_name(array('country' => $this->_tpl_vars['user_data']['country']), $this);?>
</strong></td></tr>						
		<tr><td>Zip/Post Code</td><td><?php echo $this->_tpl_vars['user_data']['postcode']; ?>
</td></tr>			
	</table>
</td>
</tr>

<tr><td width="45%"  valign="top">
	<table width="100%" cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
		<tr><td width="100">E-mail</td><td><strong><?php echo $this->_tpl_vars['user_data']['email']; ?>
</strong></td></tr>
		<tr><td>Welcome Message</td><td><?php echo $this->_tpl_vars['user_data']['welcome_message']; ?>
</td></tr>		
		<tr><td>Company</td><td><?php echo $this->_tpl_vars['user_data']['company']; ?>
</td></tr>	
		<tr><td>Phone</td><td><?php echo $this->_tpl_vars['user_data']['phone']; ?>
</td></tr>						
		<tr><td>Mobile</td><td><?php echo $this->_tpl_vars['user_data']['mobile']; ?>
</td></tr>				
	</table>
</td>
<td width="45%" valign="top">
	<table width="100%" cellpadding="2" cellspacing="2"  border="0"   class="confirmContent">
		<tr><td width="100">Security Question</td><td><?php echo $this->_tpl_vars['user_data']['security_question']; ?>
</td></tr>
		<tr><td>Security Answer</td><td><strong><?php echo $this->_tpl_vars['user_data']['security_answer']; ?>
</strong></td></tr>	
		<tr><td colspan="2"><hr s size="1" /></td></tr>		
		<tr><td width="100">Referral Count</td><td><?php echo $this->_tpl_vars['user_data']['referral_count']; ?>
</td></tr>
		<tr><td>Additional Information</td><td><strong><?php echo $this->_tpl_vars['user_data']['additional_information']; ?>
</strong></td></tr>	
			
	</table>
</td>
</tr>
</table>
<br>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td><a href="javascript: closeUserDetailsContent();" class="linkButton">Close</a></td></tr>
</table>