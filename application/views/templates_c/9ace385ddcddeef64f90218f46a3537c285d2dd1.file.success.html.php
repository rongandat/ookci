<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 05:27:45
         compiled from "application\views\templates\transfer\success.html" */ ?>
<?php /*%%SmartyHeaderCode:19923520c499264ee59-56255388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ace385ddcddeef64f90218f46a3537c285d2dd1' => 
    array (
      0 => 'application\\views\\templates\\transfer\\success.html',
      1 => 1376537243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19923520c499264ee59-56255388',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520c499270cf49_20076360',
  'variables' => 
  array (
    'success' => 0,
    'transaction_data' => 0,
    'user_session' => 0,
    'transfer_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c499270cf49_20076360')) {function content_520c499270cf49_20076360($_smarty_tpl) {?>
<div class="simple-form">
    <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['success']->value)){?>
    <h1>Transfer Successful</h1>
    <p class="success">Your transfer was successful!</p>
    <div class="line"></div>
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" style="border-collapse: collapse" bordercolor="#111111">
        <tr>
            <td class="form_label">Date:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['transaction_time'];?>
</td>
        </tr>	
        <tr>
            <td class="form_label">Batch Number#:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['batch_number'];?>
</td>
        </tr>	
        <tr>
            <td class="form_label">From:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['user_session']->value['user_id'];?>
(<strong><?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_name'];?>
</strong>)</td>
        </tr>	    
        <tr>
            <td class="form_label">To:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['to_account'];?>
(<strong><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['account_name'];?>
</strong>)</td>
        </tr>	 
        <tr>
            <td class="form_label">Amount:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['amount_text'];?>
</td>
        </tr>	 
        <tr>
            <td class="form_label">Transaction Memo:</td>
            <td class="form_field"><?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['transaction_memo'];?>
</td>
        </tr>	       
    </table>  
    <p>
        Thank you for choosing OOKCASH!
    </p>
    <div class="buttons">
        <input  type="button" name="buttonNew" class="button"  value="New Transfer"  onclick="redirect('<?php echo site_url('transfer');?>
');" />
        <input  type="button" name="buttonBack" class="button"  value="Back to Account"  onclick="redirect('<?php echo site_url('account');?>
');" />
    </div>
    <?php }?>
</div><?php }} ?>