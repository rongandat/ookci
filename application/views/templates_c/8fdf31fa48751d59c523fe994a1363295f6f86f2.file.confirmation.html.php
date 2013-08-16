<?php /* Smarty version Smarty-3.1.14, created on 2013-08-14 10:26:08
         compiled from "application\views\templates\transfer\confirmation.html" */ ?>
<?php /*%%SmartyHeaderCode:16369520b3ad083cd13-84571006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fdf31fa48751d59c523fe994a1363295f6f86f2' => 
    array (
      0 => 'application\\views\\templates\\transfer\\confirmation.html',
      1 => 1376468530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16369520b3ad083cd13-84571006',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520b3ad09228f7_46944049',
  'variables' => 
  array (
    'user_session' => 0,
    'transfer_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b3ad09228f7_46944049')) {function content_520b3ad09228f7_46944049($_smarty_tpl) {?><form action="" method="post">
    <div class="simple-form">

        <h1>Transfer Confirmation</h1>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="st-form-line">
            <span class="st-labeltext">From Account:</span>
            <span class="transfer_info"><?php echo $_smarty_tpl->tpl_vars['user_session']->value['user_id'];?>
(<strong><?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_name'];?>
</strong>)</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">To Account:</span>
            <span><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['account_number'];?>
(<strong><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['account_name'];?>
</strong>)</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Account:</span>
            <span><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['amount_text'];?>
</span>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Fee:</span>
            <span><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['fees_text'];?>
</span>
            <div class="clear"></div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['transfer_info']->value['transaction_memo']!=''){?>
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info">Transaction Memo:</span>
            <span><?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['transaction_memo'];?>
</span>
            <div class="clear"></div>
        </div>
        <?php }?>
        <p>
            Please be aware that all OOKCASH payments are instant and irreversible. OOKCASH is not associated directly or indirectly with any other company or business. Our liability is limited to delivering your funds on time to the account of your choice specified above. Any issues that you may encounter as a result of this transaction that are not related to the transaction itself will have to be addressed and resolved with the recipient of your payment directly. Please confirm your payment details ONLY if you UNDERSTAND and AGREE with statements made in this paragraph and ACCEPT our <a href="http://docs.ookcash.com/tos/" target="_blank">Terms Of Service</a>
        </p>

        <input type="hidden" name="to_account" value="<?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['account_number'];?>
"  />
        <input type="hidden" name="to_userid" value="<?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['user_id'];?>
"  />
        <input type="hidden" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['amount'];?>
"  />
        <input type="hidden" name="transaction_memo" value="<?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['transaction_memo'];?>
"  />	
        <input type="hidden" name="balance_currency"	value="<?php echo $_smarty_tpl->tpl_vars['transfer_info']->value['balance_currency'];?>
"  />
        <div class="st-form-line">
            <span class="st-labeltext" class="transfer_info"></span>
            <input  type="button" name="buttonConfirm" class="button"  value="Confirm" onclick="redirect('<?php echo site_url('transfer/success');?>
');"/>
            <input  type="button" name="buttonChange" class="button"  value="Change"  onclick="redirect('<?php echo site_url('transfer');?>
');"/>
            <input  type="button" name="buttonCancel" class="button"  value="Cancel" onclick="redirect('<?php echo site_url('home');?>
');" />
            <div class="clear"></div>
        </div>
        
        <script type="text/javascript">
            function changeTransfer()
            {
                document.getElementById('step').value	=	''; // go to default page
                document.frmTransfer.submit();
            }
        </script>
        
    </div>
</form><?php }} ?>