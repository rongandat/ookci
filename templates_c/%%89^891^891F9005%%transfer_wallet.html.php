<?php /* Smarty version 2.6.18, created on 2013-08-16 05:08:14
         compiled from account/transfer_wallet.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/transfer_wallet.html', 1, false),array('function', 'html_options', 'account/transfer_wallet.html', 14, false),)), $this); ?>
<form name="frmTransfer" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSFER_WALLET','ssl' => true), $this);?>
"  >
    <div class="simple-form">
        <h1>Transfer To Wallet</h1>
        <p>Please use this form to transfer funds to wallet</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php if ($this->_tpl_vars['success']): ?>
        <div class="success">Transfer success</div>
        <?php endif; ?>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Currency:</span>
            <select name="balance_currency" >
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

            </select>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Amount:</span>
            <input  name="amount" type="text" id="amount"  value="<?php echo $this->_tpl_vars['amount']; ?>
"  size="10" />
            <div class="clear"></div>
        </div>
       
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Master Key(3 digits)</span>
            <input  name="master_key" type="password" id="master_key"  value="<?php echo $this->_tpl_vars['master_key']; ?>
"  size="4"  maxlength="3"/> 
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input  type="submit" class="button"  value="Transfer" />
        </div>
    </div>
</form>