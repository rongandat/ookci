<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 09:42:51
         compiled from "application\views\templates\master_key.html" */ ?>
<?php /*%%SmartyHeaderCode:159875209b7310e8cb1-05522267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76eda73c253d660e9a48b754be04a0225af4c0c9' => 
    array (
      0 => 'application\\views\\templates\\master_key.html',
      1 => 1376379769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159875209b7310e8cb1-05522267',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209b73113c911_44007294',
  'variables' => 
  array (
    'heading_title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209b73113c911_44007294')) {function content_5209b73113c911_44007294($_smarty_tpl) {?><form name="frmPersonal" method="post" action=""  >
    <div class="simple-form">
        <h1><?php echo $_smarty_tpl->tpl_vars['heading_title']->value;?>
</h1>
        <p>The following section can only be viewed after you enter your master key.</p>
        <p>Fields 
            marked with asterisk (<i>*</i>) are 
            required.</p>
        <div class="line"></div>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i>Master Key:</span>
            <input type="password" autocomplete="off" name="master_key" size="5" maxlength="3" class="st-forminput medium">
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Next" />
        </div>
    </div>
</form><?php }} ?>