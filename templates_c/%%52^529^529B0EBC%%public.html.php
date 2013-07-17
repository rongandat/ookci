<?php /* Smarty version 2.6.18, created on 2012-05-24 01:16:51
         compiled from account/public.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/public.html', 2, false),array('function', 'dev_get_state_name', 'account/public.html', 77, false),array('function', 'dev_get_country_name', 'account/public.html', 77, false),array('modifier', 'date_format', 'account/public.html', 52, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="frmLogin" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PUBLIC','ssl' => true), $this);?>
" method="post" >
<input name="action" value="process" type="hidden" />
          <div align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber37" height="20">
              <tr>
                <td width="100%">&nbsp;</td>
              </tr>
            </table>
</div>
          <div align="center">
            <center>
            <table border="0" cellPadding="2" width="580" style="border-collapse: collapse" bordercolor="#111111" cellspacing="0" >
              <tr>
                <td class="pageHeading" height="53" valign="top"><b>
                <font face="Tahoma" color="#6666FF">Account Public Settings </font></b></td>
              </tr>
			<tr><td  height="49" valign="top"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/modules/account_header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td></tr>			  <?php if ($this->_tpl_vars['updated']): ?> 
	<tr><td  valign="top"> <font face="Tahoma" size="2"><font color="green"><strong>Your settings have been saved.</strong></font></font></td></tr>			
	<?php endif; ?>
              <tr>
                <td valign="top"><font face="Tahoma" size="2">Global Cash have a this function so that you can allow your account information be public and searchable.</font></td>
              </tr>					  
            </table>
            </center>
          </div>
          <div align="center">
            <center>
            <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36">
              <tr>
                <td width="138" valign="top"><font face="Tahoma">
                <font size="2">Account Name:</font></font></td>
                <td ><font face="Tahoma">
                <font size="2"><strong><?php echo $this->_tpl_vars['account_info']['account_name']; ?>
</strong></font></font></td>
              </tr>
		      <tr>
                <td  ><font face="Tahoma">
                <font size="2">Account Type:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><strong><?php if ($this->_tpl_vars['account_info']['account_type'] == 'user'): ?>User<?php endif; ?></strong></font></font></td>
              </tr>
    <tr>
                <td  ><font face="Tahoma">
                <font size="2">Account Number:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><strong><?php echo $this->_tpl_vars['account_info']['account_number']; ?>
</strong></font></font></td>
              </tr>			  			  
 <tr>
                <td  ><font face="Tahoma">
                <font size="2">Created on:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['account_info']['signup_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</strong></font></font></td>
              </tr>		              
            </table>
            </center>
          </div>      
	<br />	  
   <div align="center">
            <center>
            <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36">
              <tr>
                <td width="138" valign="top"><input type="checkbox" name="name" value="1" <?php if ($this->_tpl_vars['name']): ?> checked="checked"<?php endif; ?>/><font face="Tahoma">
                <font size="2">Full Name:</font></font></td>
                <td ><font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['firstname']; ?>
 <?php echo $this->_tpl_vars['account_info']['lastname']; ?>
</font></font></td>
              </tr>
		      <tr>
                <td  ><input type="checkbox" name="email" value="1" <?php if ($this->_tpl_vars['email']): ?> checked="checked"<?php endif; ?>/><font face="Tahoma">
                <font size="2">E-mail:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['email']; ?>
</font></font></td>
              </tr>
    <tr>
                <td  ><font face="Tahoma">
                <font size="2"><input type="checkbox" name="address" value="1" <?php if ($this->_tpl_vars['address']): ?> checked="checked"<?php endif; ?>/> Address:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['address']; ?>
,<?php echo $this->_tpl_vars['account_info']['city']; ?>
 <?php echo $this->_tpl_vars['account_info']['postcode']; ?>
 <?php echo smarty_function_dev_get_state_name(array('state' => $this->_tpl_vars['account_info']['state']), $this);?>
 <?php echo smarty_function_dev_get_country_name(array('country' => $this->_tpl_vars['account_info']['country']), $this);?>
</font></font></td>
              </tr>			
 <tr>
                <td  ><input type="checkbox" name="company" value="1" <?php if ($this->_tpl_vars['company']): ?> checked="checked"<?php endif; ?>/><font face="Tahoma">
                <font size="2">Company:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['company']; ?>
</font></font></td>
              </tr>					    			  
 <tr>
                <td  ><input type="checkbox" name="phone" value="1" <?php if ($this->_tpl_vars['phone']): ?> checked="checked"<?php endif; ?>/><font face="Tahoma">
                <font size="2">Phone:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['phone']; ?>
</font></font></td>
              </tr>		         
 <tr>
                <td  ><input type="checkbox" name="mobile" value="1" <?php if ($this->_tpl_vars['mobile']): ?> checked="checked"<?php endif; ?>/><font face="Tahoma">
                <font size="2">Mobile:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['mobile']; ?>
</font></font></td>
              </tr>				       
		<?php unset($this->_sections['balanceidx']);
$this->_sections['balanceidx']['name'] = 'balanceidx';
$this->_sections['balanceidx']['loop'] = is_array($_loop=$this->_tpl_vars['balances_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				 <tr>
                <td  ><input type="checkbox" name="balance_settings[]" value="<?php echo $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_code']; ?>
"  /><font face="Tahoma">
                <font size="2">Balance(<?php echo $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_name']; ?>
):</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</font></font></td>
              </tr>			
		<?php endfor; endif; ?>
			  
            </table>
            </center>
          </div> 		      
          <table border="0" cellSpacing="2" cellPadding="2" width="100%" height="59">
            <tr>
              <td class="contenButtons" align="middle" height="53" valign="bottom">
              <input class="button" value="Apply Changes" type="submit" name="buttonUpdate"></td>
            </tr>
          </table>
          <div align="center">
            <center>
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber34">
              <tr>
                <td width="100%">&nbsp;</td>
              </tr>
            </table>
            </center>
          </div>
          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber14">
            <tr>
              <td width="100%">&nbsp;</td>
            </tr>
          </table>
</form>