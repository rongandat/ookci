<?php /* Smarty version 2.6.18, created on 2012-03-29 05:37:51
         compiled from home/login_balance.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_balance.html', 69, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div align="center">
  <center>
  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse" bordercolor="#111111" >
	<tr>
	  <td  class="pageHeading" valign="top">
      <div align="right">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber2" height="20">
          <tr>
            <td width="100%">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div align="center">
        <center>
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber1">
          <tr>
            <td width="100%" valign="top" height="53">
            <p align="left"><b><font face="Tahoma" color="#6666FF">Login: Step 3</font></b></td>
          </tr>
          <tr>
            <td width="100%" valign="top"><font face="Tahoma" size="2">You may use your 
            Global Cash wallet to send payments more quickly without logging in to your main account.&nbsp; 
            	<br>
<strong>Wallet balances (wallet is disabled)</strong></font></td>
          </tr>
        </table>
        </center>
      </div>
      </td>
	</tr>
	</table>
  </center>
</div>
<br />
<div align="center">
  <center>
<table cellpadding="0" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
<tr ><td align="center"  class="contenButtons"><input  type="button" name="buttonPaywallet"  disabled="disabled"  class="button"  value="Pay from your wallet"></td></tr>
</table>
  </center>
</div>
<br />
<div align="center">
  <center>
<table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111" height="152">
	<tr><td height="60" valign="top"><font face="Tahoma" size="2">To view your history, messages, change your settings, add funds to wallet or make payments please login to your main account.</font></td></tr>
	<tr><td height="50" valign="top">
      <font face="Tahoma" size="2" color="#800000"><strong><span class="contentTitle2">Main account balances</span></strong></font></td></tr>
	<tr><td height="78">
		<table width="100%" cellpadding="2" cellspacing="5"  border="0">
		<font face="Tahoma" size="2"><?php unset($this->_sections['balanceidx']);
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
			<?php if (( $this->_sections['balanceidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>
        </font>		  
			<tr>
			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" width="100"><font face="Tahoma" size="2"><strong><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_name']; ?>
</strong></font></td>
			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font face="Tahoma" size="2"><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</font></td>			 
		    </tr>
		<font face="Tahoma" size="2"><?php endfor; endif; ?> </font>
		</table>
	</td></tr>	
</table>
  </center>
</div>
<br />
<div align="center">
  <center>
<table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" height="100" >
<tr ><td align="center"  class="contenButtons" height="100" valign="top"><input  type="button" id="buttonLoginPIN" class="button"  value="Login PIN" onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_PIN','ssl' => true), $this);?>
');" />&nbsp;<input  type="button" name="buttonOneTime"  disabled="disabled"  class="button"  value="One Time PIN"></td></tr>
</table></center>
</div>