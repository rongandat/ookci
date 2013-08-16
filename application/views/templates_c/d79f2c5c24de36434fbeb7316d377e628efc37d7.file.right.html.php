<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:37:34
         compiled from "application\views\templates\common\right.html" */ ?>
<?php /*%%SmartyHeaderCode:29115209a9feb70419-21896345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd79f2c5c24de36434fbeb7316d377e628efc37d7' => 
    array (
      0 => 'application\\views\\templates\\common\\right.html',
      1 => 1376282751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29115209a9feb70419-21896345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_session' => 0,
    'class' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209a9fed6c515_49251881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209a9fed6c515_49251881')) {function content_5209a9fed6c515_49251881($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_session']->value){?>
<div class="box blue">
    <div class="heading-title">
        Acount Setting
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="<?php echo site_url('acount');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='account'&&$_smarty_tpl->tpl_vars['action']->value=='index'){?> class="active" <?php }?>>Account Summary</a>
            </li>
            <li>
                <a href="<?php echo site_url('account/personal');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='account'&&$_smarty_tpl->tpl_vars['action']->value=='personal'){?> class="active" <?php }?>>Personal Information</a>
            </li>
            <li <?php if ($_smarty_tpl->tpl_vars['class']->value=='settings'){?> class="active" <?php }?>>
                <a href="<?php echo site_url('setting');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='settings'){?> class="active" <?php }?>>Settings</a>
                <ul>
                    <li>
                        <a href="<?php echo site_url('setting/personal');?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value=='personal'){?> class="active" <?php }?>>Personal</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('setting/verification');?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value=='verification'){?> class="active" <?php }?>>Verification</a>
                    </li>
                   
                    <li>
                        <a href="<?php echo site_url('setting/api');?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value=='api'){?> class="active" <?php }?>>API</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('setting/password');?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value=='password'){?> class="active" <?php }?>>Change Password</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('setting/secure_pin');?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value=='secure_pin'){?> class="active" <?php }?>>Secure PIN</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('account/public');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='account'&&$_smarty_tpl->tpl_vars['action']->value=='public'){?> class="active" <?php }?>>Public Information</a>
            </li>
            
        </ul>
    </div>
</div>
<?php }?>
<div class="box red">
    <div class="heading-title">
        Merchant tool
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="http://docs.ookcash.com/sci">Shopping Cart Interface(SCI)</a>
            </li>
            <li <?php if ($_smarty_tpl->tpl_vars['class']->value=='sci'&&$_smarty_tpl->tpl_vars['action']->value=='general'){?> class="active" <?php }?>>
                <a href="<?php echo site_url('sci/general');?>
">SCI Form/Button Generator</a>
            </li>
            <li>
                <a href="http://docs.ookcash.com/merchantapi">Merchant API</a>
            </li>
            <li <?php if ($_smarty_tpl->tpl_vars['class']->value=='transfer'&&$_smarty_tpl->tpl_vars['action']->value=='quick_payment'){?> class="active" <?php }?>>
                <a href="<?php echo site_url('transfer/quick_payment');?>
">Quick Payment</a>
            </li>
            <li>
                <a href="#">API Test Key</a>
            </li>
            <li>
                <a href="#">Intergration Resouces</a>
            </li>
        </ul>
    </div>
</div>

<div class="box blue">
    <div class="heading-title">
        Payment
    </div>
    <div class="content">
        <ul>
            <li>
                <a href="<?php echo site_url('transaction/history');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='transaction'&&$_smarty_tpl->tpl_vars['action']->value=='history'){?> class="active" <?php }?>>Transaction History</a>
            </li>
            <li>
                <a href="#">Deposit Money</a>
            </li>
            <li>
                <a href="<?php echo site_url('transfer');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='transfer'&&$_smarty_tpl->tpl_vars['action']->value=='index'){?> class="active" <?php }?>>Transfer Money</a>
            </li>
            <li>
                <a href="<?php echo site_url('transfer/wallet');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='transfer'&&$_smarty_tpl->tpl_vars['action']->value=='wallet'){?> class="active" <?php }?>>Transfer To Wallet</a>
            </li>
           
            <li>
                <a href="#">Withdraw Money</a>
            </li>
        </ul>
    </div>
</div><?php }} ?>