<?php /* Smarty version 2.6.18, created on 2013-06-28 10:32:55
         compiled from account/transfer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/transfer.html', 1, false),array('function', 'html_options', 'account/transfer.html', 168, false),)), $this); ?>
<form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <input type="hidden" name="step" id="step" value="<?php echo $this->_tpl_vars['step']; ?>
"  />
    <div align="right">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650" id="AutoNumber1" height="20">
            <tr>
                <td width="100%">&nbsp;</td>
            </tr>
        </table>
    </div>
    <p><font size="2" face="Tahoma"><?php if ($this->_tpl_vars['step'] == 'confirm'): ?> </font></p>
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
(<strong><?php echo $this->_tpl_vars['transfer_info']['login_account_name']; ?>
</strong>)</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">To Account:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
(<strong><?php echo $this->_tpl_vars['transfer_info']['account_name']; ?>
</strong>)</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Account:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transfer_info']['amount_text']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Fee:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transfer_info']['fees_text']; ?>
</font></td>
                </tr>  
                <font size="2" face="Tahoma"><?php if ($this->_tpl_vars['transfer_info']['transaction_memo'] != ''): ?>
                </font>  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transfer_info']['transaction_memo']; ?>
</font></td>
                </tr>  
                <font size="2" face="Tahoma"><?php endif; ?> </font>  

            </table>	  
        </center>
    </div>
    <font face="Tahoma">	  
    <input type="hidden" name="to_account" value="<?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
"  />
    <input type="hidden" name="to_userid" value="<?php echo $this->_tpl_vars['transfer_info']['user_id']; ?>
"  />
    <input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['transfer_info']['amount']; ?>
"  />
    <input type="hidden" name="transaction_memo" value="<?php echo $this->_tpl_vars['transfer_info']['transaction_memo']; ?>
"  />	
    <input type="hidden" name="balance_currency"	value="<?php echo $this->_tpl_vars['transfer_info']['balance_currency']; ?>
"  />
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
        <tr ><td align="center" class="contenButtons" ><font face="Tahoma"><input  type="submit" name="buttonConfirm" class="button"  value="Confirm" /></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonChange" class="button"  value="Change"  onclick="changeTransfer();"/></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonCancel" class="button"  value="Cancel" onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
');" /></font></td></tr>
    </table>	
    <font size="2" face="Tahoma"><?php echo '
    <script type="text/javascript">
        function changeTransfer()
        {
            document.getElementById(\'step\').value	=	\'\'; // go to default page
            document.frmTransfer.submit();
        }
        '; ?>

    </script>
    <?php elseif ($this->_tpl_vars['step'] == 'completed'): ?> </font>
    <div align="center">
        <center>

            <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
                <tr>
                    <td  class="pageHeading" valign="top"><b>
                            <font face="Tahoma" color="#800000" size="2">Transfer Successful</font></b></td>
                </tr>
                <tr><td><font size="2" face="Tahoma">Your transfer was successful!.</font></td></tr>
            </table>
        </center>
    </div>
    <font size="2" face="Tahoma">
    <br />
    <br />
    </font>
    <div align="center">
        <center>
            <table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Date:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['transaction_time']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Batch Number#:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['batch_number']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">From:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $_SESSION['login_account_number']; ?>
(<strong><?php echo $_SESSION['login_main_account_info']['account_name']; ?>
</strong>)</font></td>
                </tr>	    
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">To:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['to_account']; ?>
</font></td>
                </tr>	 
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Amount:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['amount_text']; ?>
</font></td>
                </tr>	 
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction_data']['memo']; ?>
</font></td>
                </tr>	       
            </table>  
        </center>
    </div>
    <div align="center">
        <center>  
            <table cellpadding="2" cellspacing="0" border="0" width="580" style="border-collapse: collapse" bordercolor="#111111" >
                <tr><td><font size="2" face="Tahoma">Thank you for choosing e-globalcash! </font>
                    </td></tr>
                <tr ><td align="center" class="contenButtons" ><font face="Tahoma"><input  type="button" name="buttonNew" class="button"  value="New Transfer"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
');" /></font><font size="2" face="Tahoma">&nbsp;</font><font face="Tahoma"><input  type="button" name="buttonBack" class="button"  value="Back to Account"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
');" /></font></td></tr>
            </table>
        </center>
    </div>
    <font size="2" face="Tahoma"><?php else: ?> </font>
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
                    <td class="form_label"><font size="2" face="Tahoma">*Currency:</font></td>
                    <td class="form_field">
                        <font face="Tahoma"><select name="balance_currency" >
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

                        </select>
                        </font>
                    </td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">*To Account:</font></td>
                    <td class="form_field"><font face="Tahoma">
                        <input  name="to_account" type="text"  value="<?php echo $this->_tpl_vars['to_account']; ?>
"  class="inputtext" size="20"  /></font></td>
                </tr>		  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">*Amount</font></td>
                    <td  class="form_field"><font face="Tahoma"><input  name="amount" type="text" id="amount"  value="<?php echo $this->_tpl_vars['amount']; ?>
"  size="10" /></font><font size="2" face="Tahoma">
                        </font> </td>
                </tr>	  
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td  class="form_field"><font face="Tahoma"><textarea name="transaction_memo"  cols="50" rows="3"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea></font><font size="2" face="Tahoma">
                        </font> </td>
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
    <font size="2" face="Tahoma"><?php endif; ?> </font>
</form>