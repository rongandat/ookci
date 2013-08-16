<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:38:05
         compiled from "application\views\templates\login\balance.html" */ ?>
<?php /*%%SmartyHeaderCode:302185209aa1df04369-20615703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44240c05504328542a646cc1c6e642e2eb5517f0' => 
    array (
      0 => 'application\\views\\templates\\login\\balance.html',
      1 => 1376363568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302185209aa1df04369-20615703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'balances' => 0,
    'rowstyle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209aa1e0af980_42815779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209aa1e0af980_42815779')) {function content_5209aa1e0af980_42815779($_smarty_tpl) {?><div class="simple-form">
    <h1>Login: Step 3</h1>
    <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="loginbalance">
        <p>You may use your OOKCASH wallet to send payments more quickly without logging in to your main account. </p>
        <p><strong>Wallet balances (wallet is disabled)</strong></p>
        <div class="buttons">
            <input type="button" value="Pay from your wallet" class="button" disabled="disabled" name="buttonPaywallet">
        </div>
        <p>To view your history, messages, change your settings, add funds to wallet or make payments please login to your main account.</p>
        <h3>Main account balances</h3>
        <table border="0">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['name'] = 'balanceidx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['balances']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['balanceidx']['total']);
?>	
            <?php if (($_smarty_tpl->getVariable('smarty')->value['section']['balanceidx']['index']%2)==0){?> <?php $_smarty_tpl->tpl_vars["rowstyle"] = new Smarty_variable("tableNormalRow", null, 0);?> <?php }else{ ?>  <?php $_smarty_tpl->tpl_vars["rowstyle"] = new Smarty_variable("tableAltRow", null, 0);?>  <?php }?>
            <tr>
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
" width="250"><font face="Tahoma" size="2"><strong><?php echo $_smarty_tpl->tpl_vars['balances']->value[$_smarty_tpl->getVariable('smarty')->value['section']['balanceidx']['index']]['balance_name'];?>
</strong></font></td>
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
"><font face="Tahoma" size="2"><?php echo $_smarty_tpl->tpl_vars['balances']->value[$_smarty_tpl->getVariable('smarty')->value['section']['balanceidx']['index']]['balance_text'];?>
</font></td>			 
            </tr>
            <?php endfor; endif; ?>
        </table>
        <div class="buttons">
            <input  type="button" id="buttonLoginPIN" class="button"  value="Login PIN" onclick="redirect('<?php echo site_url('login/pin');?>
');" />
            <input  type="button" name="buttonOneTime"  disabled="disabled"  class="button"  value="One Time PIN">
        </div>
    </div>
</div>
<?php }} ?>