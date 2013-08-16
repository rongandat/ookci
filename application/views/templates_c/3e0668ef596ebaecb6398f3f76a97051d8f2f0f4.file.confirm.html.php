<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:38:02
         compiled from "application\views\templates\login\confirm.html" */ ?>
<?php /*%%SmartyHeaderCode:14085209a9fe8735f3-45899711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e0668ef596ebaecb6398f3f76a97051d8f2f0f4' => 
    array (
      0 => 'application\\views\\templates\\login\\confirm.html',
      1 => 1376365081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14085209a9fe8735f3-45899711',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209a9fe8e1473_38414307',
  'variables' => 
  array (
    'user' => 0,
    'mss_flag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209a9fe8e1473_38414307')) {function content_5209a9fe8e1473_38414307($_smarty_tpl) {?><form name="frmLoginConfirm" accept-charset="utf-8" action="" method="post" >
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1>Login: Step 2</h1>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="one-third">
            <h5>Your personal welcome message is:</h5>
            <p><?php echo $_smarty_tpl->tpl_vars['user']->value['welcome_message'];?>
</p>
            <fieldset>          
                <?php if (!empty($_smarty_tpl->tpl_vars['mss_flag']->value)){?>
                <p class="required">Please check your email to get verification code</p>
                <div class="st-form-line">
                    <span class="st-labeltext">Verification Code</span>
                    <input type="text" value="" id="verification_key" autocomplete="off" class="st-forminput medium" size="20" name="verification_key">
                    <div class="clear"></div>
                </div>
                <?php }?>
                <div class="st-form-line">
                    <input  name="confirm_message" id="confirm_message" type="checkbox" value="1"  onchange="checkConfirm();" />
                    <span>I confirm that my custom welcome message is correct</span>
                </div>
                <input  type="submit" id="buttonContinue" class="button"  value="Continue"  disabled="disabled" />
            </fieldset>           
        </div>
        <div class="one-third-big last" style="z-index: 870;">
            <p>Only OOKCASH knows your custom welcome message. Fake web sites that want you to enter your login information on their fake login pages will not be able to show it.</p><br>    
            <p>Close your browser and scan your computer for viruses if you do not see your custom welcome message during the login process</p>
        </div>
    </div>
</form>

<script  type="text/javascript">
    function checkConfirm()
    {
        if (document.getElementById('confirm_message').checked) {
            document.getElementById('buttonContinue').disabled	=	false;
        }else {
            document.getElementById('buttonContinue').disabled	=	true;	
        }
    }
</script>
<?php }} ?>