<?php /* Smarty version 2.6.18, created on 2013-07-03 02:24:42
         compiled from account/sci_transfer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/sci_transfer.html', 2, false),)), $this); ?>
<?php if ($this->_tpl_vars['step_value'] == 'confirm'): ?>
<form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <input type="hidden" name="step" id="step" value="complete"  />
    <input  name="master_key" type="hidden" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/>
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
                    <td  class="pageHeading"><b><font size="2" face="Tahoma" color="#800000">Transfer Confirmation</font></b></td>
                </tr>
            </table>
        </center>
    </div>
    <font size="2" face="Tahoma">
    <br />
    </font>
    <div align="center">
        <center>
            <table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">From Account:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $_SESSION['login_account_number']; ?>
(<strong><?php echo $this->_tpl_vars['user_transfer']['account_name']; ?>
</strong>)</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">To Account:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['user_to_info']['account_number']; ?>
(<strong><?php echo $this->_tpl_vars['user_to_info']['account_name']; ?>
</strong>)</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Amount:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['amount']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Fee:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['fees_text']; ?>
</font></td>
                </tr>  
                <font size="2" face="Tahoma"><?php if ($this->_tpl_vars['transaction_memo'] != ''): ?>
                </font>  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</font></td>
                </tr>  
                <font size="2" face="Tahoma"><?php endif; ?> </font>  
                <textarea name="transaction_memo" style="display: none"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea>
                <input type="hidden" name="master_key" value="<?php echo $this->_tpl_vars['master_key']; ?>
"/>
            </table>	  
        </center>
    </div>
    <font face="Tahoma">	  

    </font><font size="2" face="Tahoma">
    <br />
    </font>
    <div align="center">
        <center>
            <table width="580"	  cellspacing="0" cellpadding="2" border="0" style="border-collapse: collapse" bordercolor="#111111">
                <tr><td><font size="2" face="Tahoma">Please be aware that all GWebcash payments are instant and irreversible. GWebcash is not associated directly or indirectly with any other company or business. Our liability is limited to delivering your funds on time to the account of your choice specified above. Any issues that you may encounter as a result of this transaction that are not related to the transaction itself will have to be addressed and resolved with the recipient of your payment directly. Please confirm your payment details ONLY if you UNDERSTAND and AGREE with statements made in this paragraph and ACCEPT our <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_TERMS','ssl' => true), $this);?>
" target="_blank">Terms Of Service</a>.
                        </font> </td></tr>
            </table>
        </center>
    </div>
    <font size="2" face="Tahoma">
    <br />
    </font>
    <table cellpadding="2" cellspacing="2" border="0" width="100%" >
        <tr >
            <td align="center" class="contenButtons" >
                <font face="Tahoma"><input  type="submit" name="buttonConfirm" class="button"  value="Confirm" /></font>.
                <?php if (! empty ( $this->_tpl_vars['cancel_url'] )): ?>
                <font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonCancel" class="button"  value="Cancel" onclick="redirect('<?php echo $this->_tpl_vars['cancel_url']; ?>
');" /></font></td></tr>
        <?php endif; ?>
    </table>	
</form>

<?php elseif ($this->_tpl_vars['step_value'] == 'complete'): ?>
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
<?php else: ?>
<form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <input type="hidden" name="step" id="step" value="confirm"  />
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
                    <td  class="pageHeading" height="50" valign="top"><b>
                            <font face="Tahoma" color="#6666FF">Transfer</font></b></td>
                </tr>
                <tr><td><font size="2" face="Tahoma">Please use this form to transfer funds from your Gwebcash to another member.</font></td></tr>
                <tr><td><font size="2" face="Tahoma">Fields marked with asterisk (*) are required.</font></td></tr>
            </table>
        </center>
    </div>
    <font size="2" face="Tahoma">
    <br />
    </font>
    <div align="center">
        <center>
            <table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
                <tr>
                    <td  colspan="2"><font size="2" face="Tahoma"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></font></td>
                </tr>

                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">*To Account:</font></td>
                    <td class="form_field"><font face="Tahoma">
                        <?php echo $this->_tpl_vars['to_acount']; ?>

                </tr>		  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">*Amount</font></td>
                    <td  class="form_field">
                        <font face="Tahoma"><?php echo $this->_tpl_vars['amount']; ?>
</font>
                    </td>
                </tr>	  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td  class="form_field"><font face="Tahoma"><textarea name="transaction_memo"  cols="50" rows="3"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea></font> </td>
                </tr>
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">*Master Key:</font></td>
                    <td  class="form_field"><font face="Tahoma"><input  name="master_key" type="text" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/></font><font size="2" face="Tahoma"> (3 digits)</font></td>
                </tr>		  	  	  
            </table>	
        </center>
    </div>
    <font size="2" face="Tahoma">	
    <br />
    </font>
    <table cellpadding="2" cellspacing="2" border="0" width="100%" >
        <tr ><td align="center" class="contenButtons" ><font face="Tahoma"><input  type="submit" name="buttonPreview" class="button"  value="Preview" /></font></td></tr>
    </table>
</form>
<?php endif; ?>
