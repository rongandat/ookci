<?php /* Smarty version 2.6.18, created on 2012-05-07 01:47:40
         compiled from account/history.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/history.html', 16, false),array('function', 'html_options', 'account/history.html', 35, false),array('modifier', 'date_format', 'account/history.html', 100, false),)), $this); ?>
<div align="right">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1" height="20">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
  </table>
</div>
<div align="center">
  <center>
  <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
	<tr> <td  class="pageHeading" height="50" valign="top"><b>
      <font face="Tahoma" color="#6666FF">Transaction History</font></b></td></tr>
</table>
  </center>
</div>
<form name="frmSearch"  action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
"   method="post">
<div  id="ajaxSearchContent" <?php if ($this->_tpl_vars['action'] != 'process_search'): ?> style="display:none" <?php endif; ?>>
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber2">
    <tr>
      <td width="100%" height="30" valign="top"><b><font size="2" face="Tahoma">Search Filter</font></b></td>
    </tr>
  </table>
  </center>
</div>
<font face="Tahoma">
<input type="hidden" name="action" value="process_search" >
</font>
<div align="center">
  <center>
<table width="580" cellpadding="2" cellspacing="0"  border="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr><td><font size="2" face="Tahoma">From Date</font></td><td>
      <font face="Tahoma"><select name="fromdateMonth" >
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['fromdateMonth']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><select name="fromdateDay">
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['fromdateDay']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;&nbsp;
      </font><font face="Tahoma">
<select name="fromdateYear">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['fromdateYear']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;(mm/dd/yy)</font></td></tr>
<tr><td><font size="2" face="Tahoma">To Date</font></td><td><font face="Tahoma"><select name="todateMonth" >
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['todateMonth']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><select name="todateDay">
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['todateDay']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;&nbsp;
  </font><font face="Tahoma">
<select name="todateYear">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['todateYear']), $this);?>
</select></font><font size="2" face="Tahoma">&nbsp;(mm/dd/yy)</font></td></tr>
<tr><td>&nbsp;</td><td><font face="Tahoma"><input name="search_date_filter"    type="checkbox" value="1"  <?php if ($this->_tpl_vars['search_date_filter']): ?> checked="checked" <?php endif; ?>></font><font size="2" face="Tahoma"> Search using dates filter</font></td></tr>
<tr><td><font size="2" face="Tahoma">Batch Number#</font></td><td>
  <font face="Tahoma"><input name="batch_number"   size="12" maxlength="12"  value="<?php echo $this->_tpl_vars['batch_number']; ?>
"  type="text"></font><font size="2" face="Tahoma">
  </font> </td></tr>
<tr><td><font size="2" face="Tahoma">From Account</font></td><td>
  <font face="Tahoma">
  <input name="from_account"   type="text" value="<?php echo $this->_tpl_vars['from_account']; ?>
" size="20" ></font><font size="2" face="Tahoma">
  </font> </td></tr>
<tr><td><font size="2" face="Tahoma">To Account</font></td><td>
  <font face="Tahoma">
  <input name="to_account"   type="text" value="<?php echo $this->_tpl_vars['to_account']; ?>
" size="20"></font><font size="2" face="Tahoma">
  </font> </td></tr>
<tr><td><font size="2" face="Tahoma">Transaction Reference</font></td><td>
  <font face="Tahoma"><input name="transaction_note"   value="<?php echo $this->_tpl_vars['transaction_note']; ?>
" type="text" size="50"></font><font size="2" face="Tahoma">
  </font> </td></tr>
</table>
  </center>
</div>
<p><font size="2" face="Tahoma">
<br>
</font>
</div>
<table width="100%" cellpadding="0" cellspacing="0"  border="0">
	<tr><td>
      <p align="center"><font face="Tahoma"><input type="button"  class="button" id="buttonSearch"  value="Search Transaction" /></font></td></tr>
</table>
<font size="2" face="Tahoma">
<br>
</font>
<div align="center">
<center>
<div  id="ajaxDetailsContent" style="display:none"  ></div>
</center></div>
<div align="right">
<table width="650" cellpadding="0" cellspacing="0"  border="0" style="border-collapse: collapse" bordercolor="#111111">
<tr><td valign="top">
		&nbsp;<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><font size="2" face="Tahoma">Date</font></td>
			  <td class="tableHeading"><font size="2" face="Tahoma">Batch#</font></td>
			  <td class="tableHeading"><font size="2" face="Tahoma">From Account</font></td>			  			  
			  <td class="tableHeading"><font size="2" face="Tahoma">To Account</font></td>			  
			  <td class="tableHeading"><font size="2" face="Tahoma">Amount</font></td>			
			  <td class="tableHeading"><font size="2" face="Tahoma">Fee</font></td>			
			  <td class="tableHeading" align="center">
              <font size="2" face="Tahoma">Currency</font></td>			  			  			    			    			  			    
			  <td class="tableHeading" align="center">
              <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</font></td>
			  </tr>
		    <font size="2" face="Tahoma"><?php unset($this->_sections['transactionidx']);
$this->_sections['transactionidx']['name'] = 'transactionidx';
$this->_sections['transactionidx']['loop'] = is_array($_loop=$this->_tpl_vars['transactions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['transactionidx']['show'] = true;
$this->_sections['transactionidx']['max'] = $this->_sections['transactionidx']['loop'];
$this->_sections['transactionidx']['step'] = 1;
$this->_sections['transactionidx']['start'] = $this->_sections['transactionidx']['step'] > 0 ? 0 : $this->_sections['transactionidx']['loop']-1;
if ($this->_sections['transactionidx']['show']) {
    $this->_sections['transactionidx']['total'] = $this->_sections['transactionidx']['loop'];
    if ($this->_sections['transactionidx']['total'] == 0)
        $this->_sections['transactionidx']['show'] = false;
} else
    $this->_sections['transactionidx']['total'] = 0;
if ($this->_sections['transactionidx']['show']):

            for ($this->_sections['transactionidx']['index'] = $this->_sections['transactionidx']['start'], $this->_sections['transactionidx']['iteration'] = 1;
                 $this->_sections['transactionidx']['iteration'] <= $this->_sections['transactionidx']['total'];
                 $this->_sections['transactionidx']['index'] += $this->_sections['transactionidx']['step'], $this->_sections['transactionidx']['iteration']++):
$this->_sections['transactionidx']['rownum'] = $this->_sections['transactionidx']['iteration'];
$this->_sections['transactionidx']['index_prev'] = $this->_sections['transactionidx']['index'] - $this->_sections['transactionidx']['step'];
$this->_sections['transactionidx']['index_next'] = $this->_sections['transactionidx']['index'] + $this->_sections['transactionidx']['step'];
$this->_sections['transactionidx']['first']      = ($this->_sections['transactionidx']['iteration'] == 1);
$this->_sections['transactionidx']['last']       = ($this->_sections['transactionidx']['iteration'] == $this->_sections['transactionidx']['total']);
?>	
			<?php if (( $this->_sections['transactionidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>
            </font>		  
			<tr>
			  <td width="22%" height="25"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
">
              <font size="2" face="Tahoma"><?php echo ((is_array($_tmp=$this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</font></td>
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['batch_number']; ?>
</font></td>
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['from_account']; ?>
</font></td>			  			  			  
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><strong><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['to_account']; ?>
</font></strong></td>			  			  
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font face="Tahoma"><font size="2"><?php if ($this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['from_userid'] == $_SESSION['login_userid']): ?><font color="red">-<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['amount_text']; ?>
</font><?php else: ?></font><font size="2" color="green"> +<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['amount_text']; ?>
<?php endif; ?></font></font></td>			  
			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['fee_text']; ?>
&nbsp;</font></td>			  			  
			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center">
              <font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_currency']; ?>
</font></td>			  			  			  
			  <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="javascript:getTransactionDetails(<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_id']; ?>
);" class="linkButton">
              <font size="2" face="Tahoma">Details</font></a></td>
		    </tr>
		    <font size="2" face="Tahoma"><?php endfor; endif; ?> </font>
		</table>
</td>
</tr>
</table>
</div>
</div>
<font size="2" face="Tahoma"><?php if (count ( $this->_tpl_vars['transactions'] ) > 0): ?> </font> 
<div align="center"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</font></div>
<font size="2" face="Tahoma"><?php endif; ?> </font>
</form>