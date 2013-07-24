<?php /* Smarty version 2.6.18, created on 2013-07-24 04:18:56
         compiled from account/sci_transfer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/sci_transfer.html', 3, false),)), $this); ?>
<div class="simple-form">
    <?php if ($this->_tpl_vars['step_value'] == 'confirm'): ?>
    <form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','ssl' => true), $this);?>
"  >
        <input type="hidden" name="action" value="process"  />
        <input type="hidden" name="step" id="step" value="complete"  />
        <input  name="master_key" type="hidden" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/>
        <h1>Transfer Confirmation</h1>
        
        <div class="line"></div>
        
        <table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
            <tr>
                <td class="form_label">From Account:</td>
                <td class="form_field"><?php echo $_SESSION['login_account_number']; ?>
(<strong><?php echo $this->_tpl_vars['user_transfer']['account_name']; ?>
</strong>)</td>
            </tr>	
            <tr>
                <td class="form_label">To Account:</td>
                <td class="form_field"><?php echo $this->_tpl_vars['user_to_info']['account_number']; ?>
(<strong><?php echo $this->_tpl_vars['user_to_info']['account_name']; ?>
</strong>)</td>
            </tr>	
            <tr>
                <td class="form_label">Amount:</td>
                <td class="form_field"><?php echo $this->_tpl_vars['amount']; ?>
</td>

            </tr>	
            <tr>
                <td class="form_label">Fee:</td>
                <td class="form_field"><?php echo $this->_tpl_vars['fees_text']; ?>
</td>
            </tr>  
            <?php if ($this->_tpl_vars['transaction_memo'] != ''): ?>

            <tr>
                <td class="form_label">Transaction Memo:</td>
                <td class="form_field"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</td>
            </tr>  
            <?php endif; ?>   
            <textarea name="transaction_memo" style="display: none"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea>
            <input type="hidden" name="master_key" value="<?php echo $this->_tpl_vars['master_key']; ?>
"/>
        </table>	  

        <p>Please be aware that all OOKCASH payments are instant and irreversible. OOKCASH is not associated directly or indirectly with any other company or business. Our liability is limited to delivering your funds on time to the account of your choice specified above. Any issues that you may encounter as a result of this transaction that are not related to the transaction itself will have to be addressed and resolved with the recipient of your payment directly. Please confirm your payment details ONLY if you UNDERSTAND and AGREE with statements made in this paragraph and ACCEPT our <a href="http://docs.ookcash.com/tos/" target="_blank">Terms Of Service</a></p>
        <div class="buttons">
            <input  type="submit" name="buttonConfirm" class="button"  value="Confirm" />.
            <?php if (! empty ( $this->_tpl_vars['cancel_url'] )): ?>
            <input  type="button" name="buttonCancel" class="button"  value="Cancel" onclick="redirect('<?php echo $this->_tpl_vars['cancel_url']; ?>
');" />
            <?php endif; ?>
        </div>

        <?php elseif ($this->_tpl_vars['step_value'] == 'complete'): ?>
        <h1>Errors</h1>
        <div class="line"></div>
        <div class="error">
            <ul>
                <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['foo']):
?>
                <li><?php echo $this->_tpl_vars['error_code'][$this->_tpl_vars['foo']]; ?>
</li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
        <?php else: ?>
        <form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','ssl' => true), $this);?>
"  >
            <input type="hidden" name="action" value="process"  />
            <input type="hidden" name="step" id="step" value="confirm"  />
            <h1>Transfer</h1>

            <p>Please use this form to transfer funds from your Gwebcash to another member.</p>
            <p>Fields marked with asterisk (<i>*</i>) are required.</p>
            <div class="line"></div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <table class="form">

                <tr>
                    <td class="form_label"><i>*</i> To Account:</td>
                    <td class="form_field">
                        <?php echo $this->_tpl_vars['to_acount']; ?>

                </tr>		  
                <tr>
                    <td class="form_label"><i>*</i> Amount (<?php echo $this->_tpl_vars['currency']; ?>
)</td>
                    <?php if (empty ( $this->_tpl_vars['checkout_amount'] )): ?>
                    <td class="form_field"><input type="text" name="checkout_amount" class="inputtext"/></td>
                    <?php else: ?>
                    <td class="form_field"><?php echo $this->_tpl_vars['amount']; ?>
</td>
                    <?php endif; ?>
                </tr>	  
                <tr>
                    <td class="form_label">Transaction Memo:</td>
                    <td  class="form_field"><textarea name="transaction_memo"  cols="50" rows="3"><?php echo $this->_tpl_vars['transaction_memo']; ?>
</textarea> </td>
                </tr>
                <tr>
                    <td class="form_label"><i>*</i> Master Key:</td>
                    <td  class="form_field"><input  name="master_key" type="password" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/> (3 digits)</td>
                </tr>		  	  	  
                <tr>
                    <td class="form_label"></td>
                    <td  class="form_field"><input  type="submit" name="buttonPreview" class="button"  value="Preview" /></td>
                </tr>		  	  	  
            </table>

        </form>
        <?php endif; ?>

</div>