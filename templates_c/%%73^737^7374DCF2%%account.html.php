<?php /* Smarty version 2.6.18, created on 2013-06-28 06:39:05
         compiled from account/account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/account.html', 104, false),)), $this); ?>
  <div align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber37" height="20">
              <tr>
                <td width="100%">&nbsp;</td>
              </tr>
            </table>
</div>
<div align="center">
  <center>
  <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr> <td  class="pageHeading" height="50" valign="top"><b>
      <font face="Tahoma" color="#6666FF">Account</font></b></td></tr>
	<tr><td><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/modules/account_header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td></tr>
	
</table>
  </center>
</div>
<p>&nbsp;</p>
<div align="center">
  <center>
  <table class="form_content" border="0" cellSpacing="0" cellPadding="0" style="border-collapse: collapse" bordercolor="#111111" height="143">
	<tr>
	  <td vAlign="top" width="100%" height="143">
	  <div align="center">
		<center>
		<table border="0" cellSpacing="0" cellPadding="0" width="100%" style="border-collapse: collapse" bordercolor="#111111">
		  <tr>
			<td height="25" valign="top"><span class="contentTitle3">
			<font size="2" face="Tahoma">Summary</font></span></td>
		  </tr>
		  <tr>
			<td>
			<table border="0" cellSpacing="0" cellPadding="0" width="434">
			  <tr>
				<td class="form_label" height="25" valign="top" width="117">
				<font size="2" face="Tahoma">Account Number</font></td>
				<td class="form_field" height="25" valign="top" width="317"><strong>
				<font size="2" face="Tahoma"><?php echo $_SESSION['login_account_number']; ?>
</font></strong></td>
			  </tr>
			  <tr>
				<td class="form_label" height="25" valign="top" width="117">
				<font size="2" face="Tahoma">Account Name</font></td>
				<td class="form_field" height="25" valign="top" width="317"><strong>
				<font size="2" face="Tahoma"><?php echo $this->_tpl_vars['account_info']['account_name']; ?>
</font></strong></td>
			  </tr>
			  <tr>
				<td class="form_label" height="25" valign="top" width="117">
				<font size="2" face="Tahoma">Account Type</font></td>
				<td class="form_field" height="25" valign="top" width="317"><strong>
				<font size="2" face="Tahoma"><?php if ($this->_tpl_vars['account_info']['account_type'] == 'user'): ?> User <?php endif; ?></font></strong></td>
			  </tr>
			  <tr>
				<td class="form_label" height="25" valign="top" width="117">
				<font size="2" face="Tahoma">Referral Count </font></td>
				<td class="form_field" height="25" valign="top" width="317"><strong>
				<font size="2" face="Tahoma"><?php echo $this->_tpl_vars['account_info']['referral_count']; ?>
</font></strong></td>
			  </tr>
			</table>
			</td>
		  </tr>
		</table>
		</center>
	  </div>
	  </td>
	</tr>
  </table>
  </center>
</div>

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber13" height="39">
    <tr>
      <td height="30" valign="top"><span class="contentTitle3"><font size="2" face="Tahoma">Balances</font></span></td>
    </tr>
    <tr>
      <td height="141">
      <table border="0" cellSpacing="5" cellPadding="5" width="100%">
        <tr>
          <td height="25">&nbsp;</td>
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
			<td><font size="2" face="Tahoma"><strong><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_code']; ?>
</strong></font></td>
		<?php endfor; endif; ?>
        </tr>
        <tr>
          <td height="25"><font size="2" face="Tahoma">Account</font></td>
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
						<td><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</font></td>
					<?php endfor; endif; ?>
        </tr>
        <tr>
          <td height="25"><font size="2" face="Tahoma">Wallet</font></td>
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
						<td><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['wallets'][$this->_sections['walletidx']['index']]['balance_text']; ?>
</font></td>
					<?php endfor; endif; ?>	
        </tr>
        <tr>
          <td height="25"><font size="2" face="Tahoma"><strong>Totals</strong></font></td>
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
						<td><font size="2" face="Tahoma"><strong><?php echo $this->_tpl_vars['totals'][$this->_sections['totalidx']['index']]['balance_text']; ?>
</strong></font></td>
					<?php endfor; endif; ?>	
        </tr>
        <tr>
            <td height="25" colspan="11" align="center"><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','module' => 'acount','ssl' => true), $this);?>
">Confirm</a></td>
			
        </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td width="100%" valign="top" height="39">&nbsp;</td>
    </tr>
  </table>
  </center>
</div>