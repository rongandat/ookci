<?php /* Smarty version 2.6.18, created on 2010-03-01 21:11:19
         compiled from services/search_user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'services/search_user.html', 1, false),array('function', 'dev_get_state_name', 'services/search_user.html', 143, false),array('function', 'dev_get_country_name', 'services/search_user.html', 143, false),array('modifier', 'date_format', 'services/search_user.html', 113, false),)), $this); ?>
<form name="frmSearchUser" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SERVICE_SEARCH_USER'), $this);?>
" method="post" >
<input name="action" value="process" type="hidden" />
          <div align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber35">
              <tr>
                <td width="100%" height="20">&nbsp;</td>
              </tr>
              </table>
          </div>
          <div align="center">
            <center>
            <table border="0" cellPadding="2" width="580" style="border-collapse: collapse" bordercolor="#111111" cellspacing="0" height="160">
              <tr>
                <td class="pageHeading" height="53" valign="top"><b>
                <font face="Tahoma" color="#6666FF">Account Public Info</font></b></td>
              </tr>
              <tr>
                <td height="49" valign="top"><font size="2" face="Tahoma">View public information of any account in our system. To edit your own information please login to your account and click on "Public Information Summary."</font></td>
              </tr>
              <tr>
                <td height="46" valign="top"><font size="2" face="Tahoma">Fields 
                marked with asterisk (<font color="#FF0000">*</font>) are 
                required.</font></td>
              </tr>
			<tr>
			  <td ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
			</tr>			  
            </table>
            </center>
          </div>
	<?php if ($this->_tpl_vars['found_account']): ?>		  
		 <div align="center">
            <center><font face="Tahoma" size="2"><font color="green"><strong>We have found the account.</strong></font></font></center></div>
		<br />	
	<?php endif; ?>
					  
          <div align="center">
            <center>
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" >
              <tr>
                <td width="138" valign="top" height="32"><font face="Tahoma">
                <font size="2">*Account Number:</td>
                <td width="442" valign="top" height="32"><font face="Tahoma">
                <input class="inputtext" type="text" name="account_number" value="<?php echo $this->_tpl_vars['account_number']; ?>
" size="20"></font></td>
              </tr>
            </table>
            </center>
          </div>
          <div align="center">
            <center>
            </center>
          </div>
          <div align="center">
            <center>
            <table border="0" cellPadding="2" width="580" style="border-collapse: collapse" bordercolor="#111111" cellspacing="0" height="176">
              <tr>
                <td height="172" valign="top">
                <p align="left"><font face="Tahoma"><strong><font size="2">Enter 
                the code (turing number) shown on the image</font></strong><font size="2">
                <br>
                Cannot read the numbers? Click on it to get a new one.<br>
                <a href="javascript: refreshSecureImage();">
                <img id="secure_image" border="0" src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE'), $this);?>
"></a><br>
                </font><input class="inputtext" name="security_code" size="20"></font><font size="2" face="Tahoma">
                <br>
                <a class="link" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US'), $this);?>
">
                Cannot see Turing number at all?</a> </font></td>
              </tr>
            </table>
            </center>
          </div>
		  <div align="center">
		  <center>
          <table border="0" cellSpacing="2" cellPadding="2" width="100%">
            <tr>
              <td class="contenButtons" align="middle">
              <input class="button" value="Submit" type="submit" name="buttonSearch"></td>
            </tr>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber14">
            <tr>
              <td width="100%">&nbsp;</td>
            </tr>
          </table>
		  </center>
		  </div>
	<?php if ($this->_tpl_vars['found_account']): ?>				
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
			<?php if ($this->_tpl_vars['user_settings']['name']): ?>
              <tr>
                <td width="138" valign="top"><font face="Tahoma">
                <font size="2">Full Name:</font></font></td>
                <td ><font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['firstname']; ?>
 <?php echo $this->_tpl_vars['account_info']['lastname']; ?>
</font></font></td>
              </tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['user_settings']['email']): ?>			
		      <tr>
                <td  ><font face="Tahoma">
                <font size="2">E-mail:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['email']; ?>
</font></font></td>
              </tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['user_settings']['address']): ?>			
		    <tr>
                <td  ><font face="Tahoma">
                <font size="2">Address:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['address']; ?>
,<?php echo $this->_tpl_vars['account_info']['city']; ?>
 <?php echo $this->_tpl_vars['account_info']['postcode']; ?>
 <?php echo smarty_function_dev_get_state_name(array('state' => $this->_tpl_vars['account_info']['state']), $this);?>
 <?php echo smarty_function_dev_get_country_name(array('country' => $this->_tpl_vars['account_info']['country']), $this);?>
</font></font></td>
              </tr>			
			<?php endif; ?>
			<?php if ($this->_tpl_vars['user_settings']['company']): ?>			
			 <tr>
                <td  ><font face="Tahoma">
                <font size="2">Company:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['company']; ?>
</font></font></td>
              </tr>					    			  
			<?php endif; ?>
			<?php if ($this->_tpl_vars['user_settings']['phone']): ?>						
			 <tr>
                <td  ><font face="Tahoma">
                <font size="2">Phone:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['phone']; ?>
</font></font></td>
              </tr>		         
			<?php endif; ?>			  
			
			<?php if ($this->_tpl_vars['user_settings']['mobile']): ?>									
			 <tr>
                <td  ><font face="Tahoma">
                <font size="2">Mobile:</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['account_info']['mobile']; ?>
</font></font></td>
              </tr>				       
			<?php endif; ?>
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
			<?php if (in_array ( $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_code'] , $this->_tpl_vars['balance_settings'] )): ?>
				 <tr>
                <td  ><font face="Tahoma">
                <font size="2">Balance(<?php echo $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_name']; ?>
):</font></font></td>
                <td  valign="top"> <font face="Tahoma">
                <font size="2"><?php echo $this->_tpl_vars['balances_list'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</font></font></td>
              </tr>			
			<?php endif; ?>
		<?php endfor; endif; ?>
			  
            </table>
            </center>
          </div> 		      	
	<?php endif; ?>
</form>