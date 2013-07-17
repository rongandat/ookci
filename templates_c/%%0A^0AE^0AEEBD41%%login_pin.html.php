<?php /* Smarty version 2.6.18, created on 2013-07-16 08:57:42
         compiled from home/login_pin.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_pin.html', 1, false),)), $this); ?>
<form name="frmLoginPIN" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_PIN','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
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
                <tr>
                    <td  class="pageHeading" height="53" valign="top">
                        <font color="#6666FF" face="Tahoma"><b>Login: Step 4</b></font></td>
                </tr>
                <tr><td><font size="2" face="Tahoma">You must enter your login PIN in order to access your main account.
                        </font> </td></tr>
            </table>
        </center>
    </div>
    <br />
    <div align="center">
        <center>
            <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
                <tr>
                    <td  colspan="2" width="580"><font face="Tahoma" size="2"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
                </tr>
                <tr>
                    <td class="form_label" width="132">
                        <p align="center"><font face="Tahoma" size="2">*Login PIN: <br /><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_RESET_PASSWORD','ssl' => true), $this);?>
">(forgot it?)</a></font></td>
                    <td class="form_field" width="448"><font face="Tahoma"><input  name="login_pin" type="password"  value="<?php echo $this->_tpl_vars['login_pin']; ?>
"   maxlength="5" size="6" /><font size="2"> (4-5 digits)
                        </font></font> </td>
                </tr>	
            </table>
        </center>
    </div>
    <br />
    <table cellpadding="2" cellspacing="2" border="0" width="100%" >
        <tr ><td align="center"  class="contenButtons"><input  type="submit" id="buttonContinue" class="button"  value="Login"  /></td></tr>
    </table>
</form>