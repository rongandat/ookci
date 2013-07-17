<?php /* Smarty version 2.6.18, created on 2013-07-15 09:35:34
         compiled from account/settings.html */ ?>


<div align="right">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber37">
        <tr>
            <td width="100%">&nbsp;</td>
        </tr>
    </table>
</div>
<div align="center">
    <center>
        <table border="0" cellPadding="2" width="580" style="border-collapse: collapse" bordercolor="#111111" cellspacing="0" height="160">
            <tr><td  valign="top" height="49"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/modules/account_header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td></tr>			    
            <tr>
                <td class="pageHeading" height="50" valign="top"><b>
                        <font face="Tahoma" color="#6666FF">Settings</font></b></td>
            </tr>

            <tr><td  valign="top" height="49"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/modules/setting_header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td></tr>			    
            <tr>
                <td height="49" valign="top"><font size="2" face="Tahoma">The following section can only be viewed after you enter your master key.</font></td>
            </tr>
            <font size="2" face="Tahoma"><?php if ($this->_tpl_vars['step'] == 'updated'): ?> </font> 
            <tr>
                <td valign="top"><font size="2" face="Tahoma" color="green"><strong>Your changes have been successfully saved.</strong></font></td>
            </tr>
            <font size="2" face="Tahoma"><?php endif; ?> </font>
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
    </center>
</div>
<?php echo $this->_tpl_vars['html_content']; ?>
