<?php /* Smarty version 2.6.18, created on 2013-07-15 06:22:23
         compiled from account/edit_account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/edit_account.html', 1, false),array('function', 'html_options', 'account/edit_account.html', 109, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <div align="center">
        <div align="right">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber38" height="20">
                <tr>
                    <td width="100%">&nbsp;</td>
                </tr>
            </table>
        </div>
        <table border="0" cellPadding="2" width="580" style="border-collapse: collapse" bordercolor="#111111" cellspacing="0">
            <tr>
                <td class="pageHeading" height="53" valign="top"><b>
                        <font face="Tahoma" color="#6666FF">Account Personal Information</font></b></td>
            </tr>
            <font size="2" face="Tahoma"><?php if ($this->_tpl_vars['step'] == 'updated'): ?> </font> 
            <tr>
                <td valign="top"><font size="2" face="Tahoma" color="green"><strong>Your changes have been successfully saved.</strong></font></td>
            </tr>
            <font size="2" face="Tahoma"><?php endif; ?> </font>
            <tr>
                <td valign="top"><font size="2" face="Tahoma">The following section can only be viewed after you enter your master key.</font></td>
            </tr>
            <tr>
                <td valign="top"><font size="2" face="Tahoma">Fields 
                    marked with asterisk (<font color="#FF0000">*</font>) are 
                    required.</font></td>
            </tr>
            <tr>
                <td><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
            </tr>    
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber37" height="30">
            <tr>
                <td width="100%">&nbsp;</td>
            </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr><td><h3><font size="2" face="Tahoma" color="#800000">Personal Information</font></h3></td>
            </tr>
        </table>  
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr>
                <td width="138" valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Account Name:</font></td>
                <td valign="top" ><font face="Tahoma">
                    <input type="text" name="account_name" value="<?php echo $this->_tpl_vars['account_name']; ?>
" size="20"></font></td>
            </tr>  
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>First Name:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="firstname" value="<?php echo $this->_tpl_vars['firstname']; ?>
" size="20"></font></td>
            </tr>  
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Last Name:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="lastname" value="<?php echo $this->_tpl_vars['lastname']; ?>
" size="20"></font></td>
            </tr>      
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma">Company Name:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="company" value="<?php echo $this->_tpl_vars['company']; ?>
" size="50"></font></td>
            </tr>  
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Phone:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" size="20"></font></td>
            </tr>  
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma">Mobile:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="mobile"  value="<?php echo $this->_tpl_vars['mobile']; ?>
" size="20"></font></td>
            </tr>          
        </table>

        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber37" height="30">
            <tr>
                <td width="100%">&nbsp;</td>
            </tr>
        </table>

        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr><td><h3><font size="2" face="Tahoma" color="#800000">Contact Information</font></h3></td>
            </tr>
        </table>  
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr>
                <td width="138" valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Address:</font></td>
                <td valign="top" ><font face="Tahoma">
                    <input type="text" name="address" value="<?php echo $this->_tpl_vars['address']; ?>
" size="50"></font></td>
            </tr>  
            <tr>
                <td width="138" valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>City:</font></td>
                <td valign="top" ><font face="Tahoma">
                    <input type="text" name="city" value="<?php echo $this->_tpl_vars['city']; ?>
" size="50"></font></td>
            </tr>    
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Country:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <select name="country"  class="inputselect"  onchange="getStates(this.value);">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries_array'],'selected' => $this->_tpl_vars['country']), $this);?>
</select></font></td>
            </tr>  
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>State:</font></td>
                <td  valign="top" ><font face="Tahoma"><select name="state"  id="state" class="state" >
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['zones_array'],'selected' => $this->_tpl_vars['state']), $this);?>
</select></font></td>
            </tr>      
            <tr>
                <td  valign="top" >
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Zip/Postal Code:</font></td>
                <td  valign="top" ><font face="Tahoma">
                    <input type="text" name="postcode" value="<?php echo $this->_tpl_vars['postcode']; ?>
" size="20"></font></td>
            </tr>    
        </table>

        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber37" height="30">
            <tr>
                <td width="100%">&nbsp;</td>
            </tr>
        </table>

        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr><td><h3><font size="2" face="Tahoma" color="#800000">Additional Information</font></h3></td>
            </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr>
                <td width="138" valign="top" >
                    <font size="2" face="Tahoma">Additional Information:</font></td>
                <td valign="top" ><font face="Tahoma">
                    <textarea  name="additional_information" value="<?php echo $this->_tpl_vars['additional_information']; ?>
" cols="40" rows="2"><?php echo $this->_tpl_vars['additional_information']; ?>
</textarea></font></td>
            </tr> 

        </table>    
        <font size="2" face="Tahoma">    
        <br>
        </font>
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
            <tr>
                <td width="138" valign="top" height="32">
                    <font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key:</font></td>
                <td width="442" valign="top" height="32"><font face="Tahoma">
                    <input class="inputtext" type="password" name="master_key" size="5" maxlength="3"></font></td>
            </tr>
        </table>
        <table border="0" cellSpacing="2" cellPadding="2" width="100%">
            <tr>
                <td class="contenButtons" align="middle">
                    <font face="Tahoma">
                    <input class="button" value="Apply Changes" type="submit" name="buttonUpdate"></font></td>
            </tr>
        </table>
        </center>
    </div>
</form>