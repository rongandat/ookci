<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:51:49
         compiled from "application\views\templates\login\index.html" */ ?>
<?php /*%%SmartyHeaderCode:114535209ad55dc3394-29874460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0032dac236d929448f6ad35d7972b714fe04bdbd' => 
    array (
      0 => 'application\\views\\templates\\login\\index.html',
      1 => 1376297446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114535209ad55dc3394-29874460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_log_login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209ad55e341e9_37831038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209ad55e341e9_37831038')) {function content_5209ad55e341e9_37831038($_smarty_tpl) {?><form name="frmLogin" action="" method="post" >
    <div class="simple-form">
        <h1>Login: Step 1</h1>
        <p> You are now on the login page of your OOKCASH account. Please provide your login details to see your custom welcome message and to continue login process. </p>
        <p>Fields marked with asterisk
            <span class="required">(*)</span></p>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="line"></div>
        <div class="st-form-line">
            <span class="st-labeltext">Account Number <a href="<?php echo site_url('account/remind');?>
">(forgot it?)</a></span>
            <input type="text" value="" autocomplete="off" id="account_number" class="st-forminput medium" size="20" name="account_number">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Password  <a href="<?php echo site_url('account/forgot');?>
">(forgot it?)</a></span>
            <input type="password" value="" autocomplete="off" id="password" class="st-forminput medium" size="20" name="password">
            <div class="clear"></div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['error_log_login']->value>3){?>
        <div class="st-form-line captcha">
            <span class="st-labeltext">Enter the code (turing number) shown on the image </span>
            <div class="captcha-form">
                <a href="javascript: refreshSecureImage();">
                    <img id="secure_image" autocomplete="off" border="0" src="<?php echo site_url('secure_image?t=1');?>
">
                </a>
                <input type="text" value="" id="security_code" class="st-forminput medium" name="security_code">
            </div>
            <div class="clear"></div>
        </div>
        <?php }?>
        <div class="st-form-line captcha">
            <span class="st-labeltext"></span>
            <input class="button" type="submit" value="Login" />
        </div>
    </div>
</form><?php }} ?>