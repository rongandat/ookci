<?php /* Smarty version 2.6.18, created on 2013-07-23 10:06:30
         compiled from users/view.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'users/view.html', 44, false),array('function', 'dev_get_state_name', 'users/view.html', 52, false),array('function', 'dev_get_country_name', 'users/view.html', 53, false),)), $this); ?>
<h4>User Details: #<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</h4>

<table width="100%" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <td class="tableHeading">Curency</td>
            <?php unset($this->_sections['balanceidx']);
$this->_sections['balanceidx']['name'] = 'balanceidx';
$this->_sections['balanceidx']['loop'] = is_array($_loop=$this->_tpl_vars['balances']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['balanceidx']['show'] = true;
$this->_sections['balanceidx']['max'] = $this->_sections['balanceidx']['loop'];
$this->_sections['balanceidx']['step'] = 1;
$this->_sections['balanceidx']['start'] = $this->_sections['balanceidx']['step'] > 0 ? 0 : $this->_sections['balanceidx']['loop']-1;
if ($this->_sections['balanceidx']['show']) {
    $this->_sections['balanceidx']['total'] = $this->_sections['balanceidx']['loop'];
    if ($this->_sections['balanceidx']['total'] == 0)
        $this->_sections['balanceidx']['show'] = false;
} else
    $this->_sections['balanceidx']['total'] = 0;
if ($this->_sections['balanceidx']['show']):

            for ($this->_sections['balanceidx']['index'] = $this->_sections['balanceidx']['start'], $this->_sections['balanceidx']['iteration'] = 1;
                 $this->_sections['balanceidx']['iteration'] <= $this->_sections['balanceidx']['total'];
                 $this->_sections['balanceidx']['index'] += $this->_sections['balanceidx']['step'], $this->_sections['balanceidx']['iteration']++):
$this->_sections['balanceidx']['rownum'] = $this->_sections['balanceidx']['iteration'];
$this->_sections['balanceidx']['index_prev'] = $this->_sections['balanceidx']['index'] - $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['index_next'] = $this->_sections['balanceidx']['index'] + $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['first']      = ($this->_sections['balanceidx']['iteration'] == 1);
$this->_sections['balanceidx']['last']       = ($this->_sections['balanceidx']['iteration'] == $this->_sections['balanceidx']['total']);
?>	
            <td class="tableHeading"><strong><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_code']; ?>
</strong></td>
            <?php endfor; endif; ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="tableNormalRow">Account</td>
            <?php unset($this->_sections['balanceidx']);
$this->_sections['balanceidx']['name'] = 'balanceidx';
$this->_sections['balanceidx']['loop'] = is_array($_loop=$this->_tpl_vars['balances']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['balanceidx']['show'] = true;
$this->_sections['balanceidx']['max'] = $this->_sections['balanceidx']['loop'];
$this->_sections['balanceidx']['step'] = 1;
$this->_sections['balanceidx']['start'] = $this->_sections['balanceidx']['step'] > 0 ? 0 : $this->_sections['balanceidx']['loop']-1;
if ($this->_sections['balanceidx']['show']) {
    $this->_sections['balanceidx']['total'] = $this->_sections['balanceidx']['loop'];
    if ($this->_sections['balanceidx']['total'] == 0)
        $this->_sections['balanceidx']['show'] = false;
} else
    $this->_sections['balanceidx']['total'] = 0;
if ($this->_sections['balanceidx']['show']):

            for ($this->_sections['balanceidx']['index'] = $this->_sections['balanceidx']['start'], $this->_sections['balanceidx']['iteration'] = 1;
                 $this->_sections['balanceidx']['iteration'] <= $this->_sections['balanceidx']['total'];
                 $this->_sections['balanceidx']['index'] += $this->_sections['balanceidx']['step'], $this->_sections['balanceidx']['iteration']++):
$this->_sections['balanceidx']['rownum'] = $this->_sections['balanceidx']['iteration'];
$this->_sections['balanceidx']['index_prev'] = $this->_sections['balanceidx']['index'] - $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['index_next'] = $this->_sections['balanceidx']['index'] + $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['first']      = ($this->_sections['balanceidx']['iteration'] == 1);
$this->_sections['balanceidx']['last']       = ($this->_sections['balanceidx']['iteration'] == $this->_sections['balanceidx']['total']);
?>	
            <td class="tableNormalRow"><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</td>
            <?php endfor; endif; ?>
        </tr>
        <tr>
            <td class="tableNormalRow">Wallet</td>
            <?php unset($this->_sections['walletidx']);
$this->_sections['walletidx']['name'] = 'walletidx';
$this->_sections['walletidx']['loop'] = is_array($_loop=$this->_tpl_vars['wallets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['walletidx']['show'] = true;
$this->_sections['walletidx']['max'] = $this->_sections['walletidx']['loop'];
$this->_sections['walletidx']['step'] = 1;
$this->_sections['walletidx']['start'] = $this->_sections['walletidx']['step'] > 0 ? 0 : $this->_sections['walletidx']['loop']-1;
if ($this->_sections['walletidx']['show']) {
    $this->_sections['walletidx']['total'] = $this->_sections['walletidx']['loop'];
    if ($this->_sections['walletidx']['total'] == 0)
        $this->_sections['walletidx']['show'] = false;
} else
    $this->_sections['walletidx']['total'] = 0;
if ($this->_sections['walletidx']['show']):

            for ($this->_sections['walletidx']['index'] = $this->_sections['walletidx']['start'], $this->_sections['walletidx']['iteration'] = 1;
                 $this->_sections['walletidx']['iteration'] <= $this->_sections['walletidx']['total'];
                 $this->_sections['walletidx']['index'] += $this->_sections['walletidx']['step'], $this->_sections['walletidx']['iteration']++):
$this->_sections['walletidx']['rownum'] = $this->_sections['walletidx']['iteration'];
$this->_sections['walletidx']['index_prev'] = $this->_sections['walletidx']['index'] - $this->_sections['walletidx']['step'];
$this->_sections['walletidx']['index_next'] = $this->_sections['walletidx']['index'] + $this->_sections['walletidx']['step'];
$this->_sections['walletidx']['first']      = ($this->_sections['walletidx']['iteration'] == 1);
$this->_sections['walletidx']['last']       = ($this->_sections['walletidx']['iteration'] == $this->_sections['walletidx']['total']);
?>	
            <td class="tableNormalRow"><?php echo $this->_tpl_vars['wallets'][$this->_sections['walletidx']['index']]['balance_text']; ?>
</td>
            <?php endfor; endif; ?>	
        </tr>
        <tr>
            <td class="tableNormalRow"><strong>Totals</strong></td>
            <?php unset($this->_sections['totalidx']);
$this->_sections['totalidx']['name'] = 'totalidx';
$this->_sections['totalidx']['loop'] = is_array($_loop=$this->_tpl_vars['totals']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['totalidx']['show'] = true;
$this->_sections['totalidx']['max'] = $this->_sections['totalidx']['loop'];
$this->_sections['totalidx']['step'] = 1;
$this->_sections['totalidx']['start'] = $this->_sections['totalidx']['step'] > 0 ? 0 : $this->_sections['totalidx']['loop']-1;
if ($this->_sections['totalidx']['show']) {
    $this->_sections['totalidx']['total'] = $this->_sections['totalidx']['loop'];
    if ($this->_sections['totalidx']['total'] == 0)
        $this->_sections['totalidx']['show'] = false;
} else
    $this->_sections['totalidx']['total'] = 0;
if ($this->_sections['totalidx']['show']):

            for ($this->_sections['totalidx']['index'] = $this->_sections['totalidx']['start'], $this->_sections['totalidx']['iteration'] = 1;
                 $this->_sections['totalidx']['iteration'] <= $this->_sections['totalidx']['total'];
                 $this->_sections['totalidx']['index'] += $this->_sections['totalidx']['step'], $this->_sections['totalidx']['iteration']++):
$this->_sections['totalidx']['rownum'] = $this->_sections['totalidx']['iteration'];
$this->_sections['totalidx']['index_prev'] = $this->_sections['totalidx']['index'] - $this->_sections['totalidx']['step'];
$this->_sections['totalidx']['index_next'] = $this->_sections['totalidx']['index'] + $this->_sections['totalidx']['step'];
$this->_sections['totalidx']['first']      = ($this->_sections['totalidx']['iteration'] == 1);
$this->_sections['totalidx']['last']       = ($this->_sections['totalidx']['iteration'] == $this->_sections['totalidx']['total']);
?>	
            <td class="tableNormalRow"><strong><?php echo $this->_tpl_vars['totals'][$this->_sections['totalidx']['index']]['balance_text']; ?>
</strong></td>
            <?php endfor; endif; ?>	
        </tr>
    </tbody>

</table>

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