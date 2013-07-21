<?php /* Smarty version 2.6.18, created on 2013-07-18 04:50:29
         compiled from account/transfer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/transfer.html', 1, false),array('function', 'html_options', 'account/transfer.html', 111, false),)), $this); ?>
<form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <input type="hidden" name="step" id="step" value="<?php echo $this->_tpl_vars['step']; ?>
"  />

    <?php if ($this->_tpl_vars['step'] == 'confirm'): ?>
    <div class="simple-form">
        <h1>Transfer Confirmation</h1>
        <div class="st-form-line">
            <span class="st-labeltext">From Account:</span>
            <span class="transfer_info"><?php echo $_SESSION['login_account_number']; ?>
(<strong><?php echo $this->_tpl_vars['transfer_info']['login_account_name']; ?>
</strong>)</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">To Account:</span>
            <span><?php echo $this->_tpl_vars['transfer_info']['account_number']; ?>
(<strong><?php echo $this->_tpl_vars['transfer_info']['account_name']; ?>
</strong>)</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Account:</span>
            <span><?php echo $this->_tpl_vars['transfer_info']['amount_text']; ?>
</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Fee:</span>
            <span><?php echo $this->_tpl_vars['transfer_info']['fees_text']; ?>
</span>
            <div class="clear"></div>
        </div>
        <?php if ($this->_tpl_vars['transfer_info']['transaction_memo'] != ''): ?>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Transaction Memo:</span>
            <span><?php echo $this->_tpl_vars['transfer_info']['transaction_memo']; ?>
</span>
            <div class="clear"></div>
        </div>
        <?php endif; ?>
        <div class="st-form-line">
            <span>Please be aware that all GWebcash payments are instant and irreversible. GWebcash is not associated directly or indirectly with any other company or business. Our liability is limited to delivering your funds on time to the account of your choice specified above. Any issues that you may encounter as a result of this transaction that are not related to the transaction itself will have to be addressed and resolved with the recipient of your payment directly. Please confirm your payment details ONLY if you UNDERSTAND and AGREE with statements made in this paragraph and ACCEPT our <a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_TERMS','ssl' => true), $this);?>
" target="_blank">Terms Of Service</a></span>
            <div class="clear"></div>
        </div>

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
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info"></span>
            <input  type="submit" name="buttonConfirm" class="button"  value="Confirm" />
            <input  type="button" name="buttonChange" class="button"  value="Change"  onclick="changeTransfer();"/>
            <input  type="button" name="buttonCancel" class="button"  value="Cancel" onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT','ssl' => true), $this);?>
');" />
            <div class="clear"></div>
        </div>
        <?php echo '
        <script type="text/javascript">
            function changeTransfer()
            {
                document.getElementById(\'step\').value	=	\'\'; // go to default page
                document.frmTransfer.submit();
            }
        </script>
        '; ?>

    </div>
    <?php elseif ($this->_tpl_vars['step'] == 'completed'): ?>
    <div class="simple-form">
        <h1>Transfer Successful</h1>
        <p class="success">Your transfer was successful!</p>
        <div class="line"></div>
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
        <p>
            Thank you for choosing e-globalcash!
        </p>
        <div class="buttons">
            <input  type="button" name="buttonNew" class="button"  value="New Transfer"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER','ssl' => true), $this);?>
');" /><input  type="button" name="buttonBack" class="button"  value="Back to Account"  onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT','ssl' => true), $this);?>
');" />
        </div>
    </div>
    <?php else: ?>
    <div class="simple-form">
        <h1>Transfer</h1>
        <p>Please use this form to transfer funds from your Gwebcash to another member.</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Currency:</span>
            <select name="balance_currency" >
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

            </select>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> To Account:</span>
            <input  name="to_account" type="text"  value="<?php echo $this->_tpl_vars['to_account']; ?>
"  class="inputtext" size="20"  />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Amount:</span>
            <input  name="amount" type="text" id="amount"  value="<?php echo $this->_tpl_vars['amount']; ?>
"  size="10" />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Transaction Memo:</span>
            <textarea name="transaction_memo"  cols="50" rows="3"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea>
            <div class="clear"></div>
        </div>
        <tr>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Master Key(3 digits)</span>
            <input  name="master_key" type="text" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/> 
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input  type="submit" name="buttonPreview" class="button"  value="Preview" />
        </div>
    </div>
    <?php endif; ?>
</form>