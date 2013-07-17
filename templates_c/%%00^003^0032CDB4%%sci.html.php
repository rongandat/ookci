<?php /* Smarty version 2.6.18, created on 2013-07-04 22:48:24
         compiled from home/sci.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/sci.html', 28, false),)), $this); ?>
<div align="right">
    <table width="650" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber35" style="border-collapse: collapse">
        <tbody><tr>
                <td width="100%" height="20">&nbsp;</td>
            </tr>
            
            <?php if (empty ( $this->_tpl_vars['errors'] )): ?>
            <tr>
                <td width="100%" valign="top" height="70">
                    <font size="3" face="Tahoma" color="#800000"><b>Pay with a Eglobalcash Account</b>
                    </font></td>
            </tr>
            <tr>
                <td width="100%" valign="top" height="13">
                    <div align="center">
                        <center>
                            <table width="580" cellspacing="0" cellpadding="15" bordercolor="#111111" border="0" id="AutoNumber36" style="border-collapse: collapse">
                                <tbody><tr>
                                        <td width="100%" valign="top" bgcolor="#CCCCCC" rowspan="6">
                                            <input type="hidden" value="process" name="action">		  
                                            <table width="100%" height="53" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber37" style="border-collapse: collapse">
                                                <tbody>
                                                    <tr>
                                                        <td width="100%" valign="top" height="19">
                                                            <font size="2" face="Tahoma">Eglobalcash is the secure payment processor for your merchant.</font>

                                                            <div align="center">
                                                                <form action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
" method="post">
                                                                    <center>
                                                                        <table width="350" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber40" style="border-collapse: collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="100">
                                                                                        <font size="2" face="Tahoma" color="#800000">Pay to account</font>
                                                                                    </td>
                                                                                    <td width="250">
                                                                                        <font size="2" face="Tahoma" color="#800000"><?php echo $this->_tpl_vars['user_info']['account_number']; ?>
(<?php echo $this->_tpl_vars['user_info']['firstname']; ?>
 <?php echo $this->_tpl_vars['user_info']['lastname']; ?>
)</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="100">
                                                                                        <font size="2" face="Tahoma" color="#800000">Amount</font>
                                                                                    </td>
                                                                                    <td width="250">
                                                                                        <font size="2" face="Tahoma" color="#800000"><?php echo $this->_tpl_vars['amount']; ?>
</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="100">
                                                                                        <button type="submit">Login</button>
                                                                                    </td>
                                                                                    <td width="250">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </center>
                                                                </form>
                                                            </div>			  
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <tr>
                <td width="100%" valign="top" height="70">
                    <font size="3" face="Tahoma" color="#800000"><b>Errors:</b>
                    </font></td>
            </tr>
            <tr>
                <td width="100%" valign="top" height="57">
                    <div align="center">
                        <center>
                            <table width="580" cellspacing="0" cellpadding="15" bordercolor="#111111" border="0" id="" style="border-collapse: collapse">
                                <tbody><tr>
                                        <td width="100%" bgcolor="#CCCCCC">
                                            <input type="hidden" value="process" name="action">
                                            <table width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber39" style="border-collapse: collapse">
                                                <tbody>
                                                    <tr>
                                                        <td width="100%"><font size="2" face="Tahoma"> <div align="left">
                                                                <table width="350" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber40" style="border-collapse: collapse">
                                                                    <tbody>
                                                                        <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['foo']):
?>
                                                                        <tr>
                                                                            <td width="100%">
                                                                                <font size="2" face="Tahoma" style="color: red"><?php echo $this->_tpl_vars['error_code'][$this->_tpl_vars['foo']]; ?>
</font>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                    </tbody></table>

                                                            </div>

                                                        </td>
                                                    </tr>
                                                    
                                                </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </center>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        </tbody></table>
</div>
<div align="right">
    <table width="650" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" style="border-collapse: collapse" id="AutoNumber43">
        <tbody><tr>
                <td width="100%" height="80">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>