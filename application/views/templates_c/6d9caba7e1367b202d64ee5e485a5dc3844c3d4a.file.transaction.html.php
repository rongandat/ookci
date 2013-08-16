<?php /* Smarty version Smarty-3.1.14, created on 2013-08-14 09:17:37
         compiled from "application\views\templates\ajax\transaction.html" */ ?>
<?php /*%%SmartyHeaderCode:2441520b2e84994f98-29453387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d9caba7e1367b202d64ee5e485a5dc3844c3d4a' => 
    array (
      0 => 'application\\views\\templates\\ajax\\transaction.html',
      1 => 1376464653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2441520b2e84994f98-29453387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520b2e84a858a9_26332753',
  'variables' => 
  array (
    'transaction_data' => 0,
    'user_session' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b2e84a858a9_26332753')) {function content_520b2e84a858a9_26332753($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\ookcash\\system\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="transaction_detail">
    <h3>Transaction Details: #<?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['batch_number'];?>
</h3>
    <table class="form">
        <tr><td >Batch Number#</td><td>
                <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['batch_number'];?>
</td></tr>
        <tr><td>Date</td><td>
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['transaction_data']->value['transaction_time'],"%m/%d/%Y %l:%M %p");?>
</td></tr>	
        <tr><td>From Account</td><td><strong>
                    <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['from_account'];?>
</strong></td></tr>						
        <tr><td>To Account</td><td><strong>
                    <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['to_account'];?>
</strong></td></tr>			
        <tr><td>Balance Currency</td><td>
                <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['transaction_currency'];?>
</td></tr>				
        <tr><td>Amount</td><td>
                <?php if ($_smarty_tpl->tpl_vars['transaction_data']->value['from_userid']==$_smarty_tpl->tpl_vars['user_session']->value['user_id']){?>-<?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['amount_text'];?>
<?php }else{ ?> +<?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['amount_text'];?>
<?php }?></td></tr>			
        <?php if ($_smarty_tpl->tpl_vars['transaction_data']->value['fee_text']!=''){?> 
        <tr><td>Fee</td><td>
                <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['fee_text'];?>
</td></tr>					
        <?php }?> 
        <tr><td>Transaction Status</td><td><strong>
                    <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['transaction_status'];?>
</strong></td></tr>						
        <?php if ($_smarty_tpl->tpl_vars['transaction_data']->value['transaction_memo']!=''){?>

        <tr><td>Transaction Memo</td><td>
                <?php echo $_smarty_tpl->tpl_vars['transaction_data']->value['transaction_memo'];?>
</td></tr>							
        <?php }?> 
        <tr><td></td><td>
                <a href="javascript: closeTransactionDetailsContent();" class="button">
                    Close
                </a>
            </td>
        </tr>	
    </table>
    <div class="clear"></div>
</div><?php }} ?>