<?php /* Smarty version 2.6.18, created on 2013-07-15 05:06:28
         compiled from account/personal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/personal.html', 1, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
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
                <tr>
                    <td class="pageHeading" height="50" valign="top"><b>
                            <font face="Tahoma" color="#6666FF">Account Personal Information</font></b></td>
                </tr>
                <tr><td  valign="top" height="49"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'account/modules/account_header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td></tr>			    
                <tr>
                    <td height="49" valign="top"><font size="2" face="Tahoma">The following section can only be viewed after you enter your master key.</font></td>
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
        </center>
    </div>
    <div align="center">
        <center>
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" height="136">
                <tr>
                    <td width="138" valign="top" height="32">
                        <p align="center">
                        <font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key:</font></td>
                    <td width="442" valign="top" height="32"><font face="Tahoma">
                        <input class="inputtext" type="password" name="master_key" size="5" maxlength="3"</font></td>
                </tr>  
            </table>
            <table border="0" cellSpacing="2" cellPadding="2" width="100%">
                <tr>
                    <td class="contenButtons" align="middle">
                        <input class="button" value="Next" type="submit" name="buttonNext"></td>
                </tr>
            </table>
        </center>
    </div>
</form>