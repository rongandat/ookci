<?php /* Smarty version Smarty-3.1.14, created on 2013-08-14 09:55:28
         compiled from "application\views\templates\common\validate_error.html" */ ?>
<?php /*%%SmartyHeaderCode:19775209a9fe8ebad7-62410470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f53a573a9179d9e538b7027080e44bbd1d0e752' => 
    array (
      0 => 'application\\views\\templates\\common\\validate_error.html',
      1 => 1376466927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19775209a9fe8ebad7-62410470',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209a9fe93c533_95175606',
  'variables' => 
  array (
    'validerrors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209a9fe93c533_95175606')) {function content_5209a9fe93c533_95175606($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['validerrors']->value)&&count($_smarty_tpl->tpl_vars['validerrors']->value)>0){?>
<div class="error">
    <div class="message">Error(s) Ocurred! Please check again your inputed fields.</div>
    <ul>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['name'] = 'error_index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['validerrors']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['error_index']['total']);
?>
    <li><strong><?php echo $_smarty_tpl->tpl_vars['validerrors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['error_index']['index']]['field'];?>
:</strong><?php echo $_smarty_tpl->tpl_vars['validerrors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['error_index']['index']]['message'];?>
</li>
    <?php endfor; endif; ?>
    </ul>
</div>
<?php }?><?php }} ?>