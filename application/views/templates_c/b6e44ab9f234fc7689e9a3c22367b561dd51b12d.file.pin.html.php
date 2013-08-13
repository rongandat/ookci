<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:38:07
         compiled from "application\views\templates\login\pin.html" */ ?>
<?php /*%%SmartyHeaderCode:323795209aa1f3ca995-39461409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6e44ab9f234fc7689e9a3c22367b561dd51b12d' => 
    array (
      0 => 'application\\views\\templates\\login\\pin.html',
      1 => 1376364798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323795209aa1f3ca995-39461409',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209aa1f41e349_35008588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209aa1f41e349_35008588')) {function content_5209aa1f41e349_35008588($_smarty_tpl) {?><form name="frmLoginPIN" action="" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1>Login: Step 4</h1>
        <p>You must enter your login PIN in order to access your main account. </p>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="line"></div>
        <div class="st-form-line">
            <span class="st-labeltext"><span class="required">*</span>Login PIN (4-5 digits):</span>
            <input type="password" autocomplete="off" size="6" maxlength="5" value="" class="st-forminput medium"  name="login_pin">
            <div class="clear"></div>
        </div>
        <div class="st-form-line padding0">
            <span class="st-labeltext"><a href="<?php echo site_url('acount/forgot');?>
">(forgot it?)</a></span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Login" />
        </div>
    </div>
</form>
<?php }} ?>