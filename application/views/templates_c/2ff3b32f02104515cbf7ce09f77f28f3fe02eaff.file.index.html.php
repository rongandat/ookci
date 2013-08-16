<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 06:22:22
         compiled from "application\views\templates\account\index.html" */ ?>
<?php /*%%SmartyHeaderCode:106535209b117444398-56709691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ff3b32f02104515cbf7ce09f77f28f3fe02eaff' => 
    array (
      0 => 'application\\views\\templates\\account\\index.html',
      1 => 1376367741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106535209b117444398-56709691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209b11747b1f9_15189254',
  'variables' => 
  array (
    'user_session' => 0,
    'balances' => 0,
    'wallets' => 0,
    'totals' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209b11747b1f9_15189254')) {function content_5209b11747b1f9_15189254($_smarty_tpl) {?><div class="simple-form">
    <h1>Account</h1>
    <div class="line"></div>
    <table class="form">
        <tr>
            <td  valign="top"><span class="contentTitle3">
                    Summary</span></td>
        </tr>
        <tr>
            <td>
                <table class="form">
                    <tr>
                        <td class="form_label">
                            Account Number</td>
                        <td class="form_field" ><strong>
                                <?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_number'];?>
</strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Account Name</td>
                        <td class="form_field" ><strong>
                                <?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_name'];?>
</strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Account Type</td>
                        <td class="form_field" ><strong>
                                <?php if ($_smarty_tpl->tpl_vars['user_session']->value['account_type']=='user'){?> User <?php }?></strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Referral Count </td>
                        <td class="form_field" ><strong>
                                <?php echo $_smarty_tpl->tpl_vars['user_session']->value['referral_count'];?>
</strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="list">
        <thead>
            <tr>
                <td >&nbsp;</td>
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
                <td><strong><?php echo $_smarty_tpl->tpl_vars['balances']->value[$_smarty_tpl->getVariable('smarty')->value['section']['balanceidx']['index']]['balance_code'];?>
</strong></td>
                <?php endfor; endif; ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td >Account</td>
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
                <td><?php echo $_smarty_tpl->tpl_vars['balances']->value[$_smarty_tpl->getVariable('smarty')->value['section']['balanceidx']['index']]['balance_text'];?>
</td>
                <?php endfor; endif; ?>
            </tr>
            <tr>
                <td >Wallet</td>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['name'] = 'walletidx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['wallets']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['walletidx']['total']);
?>	
                <td><?php echo $_smarty_tpl->tpl_vars['wallets']->value[$_smarty_tpl->getVariable('smarty')->value['section']['walletidx']['index']]['balance_text'];?>
</td>
                <?php endfor; endif; ?>	
            </tr>
            <tr>
                <td ><strong>Totals</strong></td>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['name'] = 'totalidx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['totals']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['totalidx']['total']);
?>	
                <td><strong><?php echo $_smarty_tpl->tpl_vars['totals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['totalidx']['index']]['balance_text'];?>
</strong></td>
                <?php endfor; endif; ?>	
            </tr>
        </tbody>

    </table>
    <?php if (isset($_smarty_tpl->tpl_vars['user_session']->value['payee_account'])){?>
    <a class="button" href="<?php echo site_url('sci/transfer');?>
">Confirm</a>
    <?php }?>
</div>


<?php }} ?>