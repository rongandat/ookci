<?php /* Smarty version 2.6.18, created on 2013-07-16 09:50:08
         compiled from home/login_confirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_confirm.html', 2, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="frmLoginConfirm" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_CONFIRM','ssl' => true), $this);?>
" method="post" >
    <input name="action" value="process" type="hidden" />
    <div align="right">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1">
            <tr>
                <td width="100%" height="20">&nbsp;</td>
            </tr>
        </table>
    </div>
    <div align="center">
        <center>
            <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
                <tr>
                    <td  class="pageHeading" height="53" valign="top">
                        <font color="#6666FF" face="Tahoma"><b>Login: Step 2</b></font></td>
                </tr>
            </table>
        </center>
    </div>
    <br />
    <div align="center">
        <center>
            <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="500" style="border-collapse: collapse" bordercolor="#111111">
                <tr><td valign="top" width="281">

                        <table cellpadding="0" cellspacing="0" border="0"   width="100%" height="55" >
                            <tr><td height="28" valign="top"><font size="2" face="Tahoma">Your personal welcome message is:</font></td> </tr>			
                            <tr><td height="27"><font face="Tahoma"><b><span class="contentTitle3"><?php echo $this->_tpl_vars['personal_welcome_message']; ?>
</span></b></font></td> </tr>			
                        </table>
                    </td><td valign="middle" align="center" width="219" >
                        <table cellpadding="0" cellspacing="0" border="0"  width="100%" >
                            <tr><td><font size="2" face="Tahoma">Only Global Cash knows your custom welcome message. Fake web sites that want you to enter your login information on their fake login pages will not be able to show it.
                                    <br /><br />
                                    Close your browser and scan your computer for viruses if you do not see your custom welcome message during the login process.</font></td></tr>
                        </table>	
                    </td></tr>
            </table>
        </center>
    </div>
    <br />
    <table cellpadding="2" cellspacing="2" border="0" width="75%" height="98" >
        <tr>
                <td><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
            </tr>  
        <?php if (! empty ( $this->_tpl_vars['mss_flag'] )): ?>
        <tr >
            <td align="left"  class="contenButtons" height="30" valign="top"> 
                <font size="2" face="Tahoma" color="red"> Please check your email to get verification code</font>
            </td>
        </tr>
        <tr >
            <td align="left"  class="contenButtons" height="30" valign="top"> 
                <font size="2" face="Tahoma"> Verification Code &nbsp;</font>
                <font face="Tahoma"> <input  name="verification_key" id="verification_key" type="text"  value=""  /></font>
            </td>
        </tr>
        <?php endif; ?>
        <tr >
            <td align="left"  class="contenButtons" height="30" valign="top"> 
                <font face="Tahoma"> <input  name="confirm_message" id="confirm_message" type="checkbox"    value="1"  onchange="checkConfirm();" /></font>
                <font size="2" face="Tahoma"> I confirm that my custom welcome message is correct &nbsp;</font>
            </td>
        </tr>
        <tr >
            <td align="left"  class="contenButtons" height="30" valign="top"> 
                <input  type="submit" id="buttonContinue" class="button"  value="Continue"  disabled="disabled" />
            </td>

        </tr>
    </table>
</form>