<?php /* Smarty version Smarty-3.1.14, created on 2013-08-14 10:19:24
         compiled from "application\views\templates\transfer\index.html" */ ?>
<?php /*%%SmartyHeaderCode:11691520b3095417449-46708353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2d324f40b48490ada4fb616a605feeb37a6786' => 
    array (
      0 => 'application\\views\\templates\\transfer\\index.html',
      1 => 1376468363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11691520b3095417449-46708353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520b3095418c00_84139565',
  'variables' => 
  array (
    'balance_currencies' => 0,
    'balance_currency' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b3095418c00_84139565')) {function content_520b3095418c00_84139565($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\ookcash\\system\\Smarty\\libs\\plugins\\function.html_options.php';
?><form action="" method="post">
    <div class="simple-form">
        <h1>Transfer</h1>
        <p>Please use this form to transfer funds from your OOKCASH to another member.</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Currency:</span>
            <select name="balance_currency" >
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['balance_currencies']->value,'selected'=>$_smarty_tpl->tpl_vars['balance_currency']->value),$_smarty_tpl);?>

            </select>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> To Account:</span>
            <input  name="to_account" type="text"  value="<?php if (!empty($_smarty_tpl->tpl_vars['info']->value['to_account'])){?><?php echo $_smarty_tpl->tpl_vars['info']->value['to_account'];?>
<?php }?>"  class="inputtext" size="20"  />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Amount:</span>
            <input  name="amount" type="text" id="amount"  value="<?php if (!empty($_smarty_tpl->tpl_vars['info']->value['to_account'])){?><?php echo $_smarty_tpl->tpl_vars['info']->value['amount'];?>
<?php }?>"  size="10" />
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Transaction Memo:</span>
            <textarea name="transaction_memo"  cols="50" rows="3"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['to_account'])){?><?php echo $_smarty_tpl->tpl_vars['info']->value['transaction_memo'];?>
<?php }?></textarea>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Master Key(3 digits)</span>
            <input  name="master_key" type="password" id="master_key"  value=""  size="4"  maxlength="3"/> 
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input  type="submit" name="buttonPreview" class="button"  value="Preview" />
        </div>
    </div>
</form><?php }} ?>