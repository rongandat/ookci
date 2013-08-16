<?php /* Smarty version Smarty-3.1.14, created on 2013-08-14 09:15:49
         compiled from "application\views\templates\account\history.html" */ ?>
<?php /*%%SmartyHeaderCode:7528520af3b2038cd9-51765389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b14ad9ee3ce92efa3dbe2ebffebdd72b52e536f9' => 
    array (
      0 => 'application\\views\\templates\\account\\history.html',
      1 => 1376464547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7528520af3b2038cd9-51765389',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520af3b22cf7a8_49067203',
  'variables' => 
  array (
    'posts' => 0,
    'months_array' => 0,
    'fromdateMonth' => 0,
    'days_array' => 0,
    'fromdateDay' => 0,
    'years_array' => 0,
    'fromdateYear' => 0,
    'todateMonth' => 0,
    'todateDay' => 0,
    'todateYear' => 0,
    'transactions' => 0,
    'rowstyle' => 0,
    'user_session' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520af3b22cf7a8_49067203')) {function content_520af3b22cf7a8_49067203($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\ookcash\\system\\Smarty\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'F:\\ookcash\\system\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="simple-form">
    <h1>Transaction History</h1>
    <div class="line"></div>
    <div class="clear"></div>
    <form name="frmSearch"  action="" method="post">
      
        <div  id="ajaxSearchContent" <?php if (empty($_smarty_tpl->tpl_vars['posts']->value)){?> style="display:none" <?php }?> >
              <h3>Search Filter</h3>
            <input type="hidden" name="action" value="process_search" >
            <table class="form">
                <tr>
                    <td>
                        From Date</td><td>
                        <select name="fromdateMonth" >
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['months_array']->value,'selected'=>$_smarty_tpl->tpl_vars['fromdateMonth']->value),$_smarty_tpl);?>
</select>&nbsp;<select name="fromdateDay">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['days_array']->value,'selected'=>$_smarty_tpl->tpl_vars['fromdateDay']->value),$_smarty_tpl);?>
</select>&nbsp;&nbsp;

                        <select name="fromdateYear">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['years_array']->value,'selected'=>$_smarty_tpl->tpl_vars['fromdateYear']->value),$_smarty_tpl);?>
</select>&nbsp;(mm/dd/yy)</td></tr>
                <tr><td>To Date</td><td><select name="todateMonth" >
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['months_array']->value,'selected'=>$_smarty_tpl->tpl_vars['todateMonth']->value),$_smarty_tpl);?>
</select>&nbsp;<select name="todateDay">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['days_array']->value,'selected'=>$_smarty_tpl->tpl_vars['todateDay']->value),$_smarty_tpl);?>
</select>&nbsp;&nbsp;

                        <select name="todateYear">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['years_array']->value,'selected'=>$_smarty_tpl->tpl_vars['todateYear']->value),$_smarty_tpl);?>
</select>&nbsp;(mm/dd/yy)</td></tr>
                <tr><td>&nbsp;</td><td><input name="search_date_filter"    type="checkbox" value="1"  <?php if (!empty($_smarty_tpl->tpl_vars['posts']->value['search_date_filter'])){?> checked="checked" <?php }?>> Search using dates filter</td></tr>
                <tr><td>Batch Number#</td><td>
                        <input name="batch_number"   size="12" maxlength="12"  value="<?php if (!empty($_smarty_tpl->tpl_vars['posts']->value['batch_number'])){?><?php echo $_smarty_tpl->tpl_vars['posts']->value['batch_number'];?>
<?php }?>"  type="text">
                    </td></tr>
                <tr><td>From Account</td><td>

                        <input name="from_account"   type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['posts']->value['from_account'])){?><?php echo $_smarty_tpl->tpl_vars['posts']->value['from_account'];?>
<?php }?>" size="20" >
                    </td></tr>
                <tr><td>To Account</td><td>

                        <input name="to_account"   type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['posts']->value['to_account'])){?><?php echo $_smarty_tpl->tpl_vars['posts']->value['to_account'];?>
<?php }?>" size="20">
                    </td></tr>
                <tr><td>Transaction Reference</td><td>
                        <input name="transaction_note"   value="<?php if (!empty($_smarty_tpl->tpl_vars['posts']->value['transaction_note'])){?><?php echo $_smarty_tpl->tpl_vars['posts']->value['transaction_note'];?>
<?php }?>" type="text" size="50">
                    </td></tr>
            </table>
        </div>
        <table class="form">
            <tr><td></td>
                <td>
                    <input type="button"  class="button" id="buttonSearch"  value="Search Transaction" />
                </td>
            </tr>
        </table>
    </form>


    <div  id="ajaxDetailsContent" style="display:none"  ></div>
    <table width="100%" class="list">
        <thead>
            <tr>
                <td height="28" class="tableHeading">Date</td>
                <td class="tableHeading">Batch#</td>
                <td class="tableHeading">From Account</td>			  			  
                <td class="tableHeading">To Account</td>			  
                <td class="tableHeading">Amount</td>			
                <td class="tableHeading">Fee</td>			
                <td class="tableHeading">Memo</td>			
                <td class="tableHeading" align="center">
                    Currency</td>			  			  			    			    			  			    

            </tr>
        </thead>
        <tbody>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['name'] = 'transactionidx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['transactions']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['transactionidx']['total']);
?>	
            <?php if (($_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']%2)==0){?> <?php $_smarty_tpl->tpl_vars["rowstyle"] = new Smarty_variable("tableNormalRow", null, 0);?> <?php }else{ ?>  <?php $_smarty_tpl->tpl_vars["rowstyle"] = new Smarty_variable("tableAltRow", null, 0);?>  <?php }?>

            <tr>
                <td width="22%" height="25"  class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['transaction_time'],"%m/%d/%Y %l:%M %p");?>
</td>
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['batch_number'];?>
</td>
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['from_account'];?>
</td>			  			  			  
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
"><strong><?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['to_account'];?>
</strong></td>			  			  
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
 currentcy" ><?php if ($_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['from_userid']==$_smarty_tpl->tpl_vars['user_session']->value['user_id']){?><span class="red">-<?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['amount_text'];?>
</span><?php }else{ ?> <span class="green">+<?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['amount_text'];?>
</span><?php }?></td>			  
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
 currentcy" ><?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['fee_text'];?>
&nbsp;</td>	
                <td class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
" align="center">
                    <?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['transaction_currency'];?>
</td>			  			  			  
                <td width="17%"  class="<?php echo $_smarty_tpl->tpl_vars['rowstyle']->value;?>
"  align="center"><a href="javascript:getTransactionDetails(<?php echo $_smarty_tpl->tpl_vars['transactions']->value[$_smarty_tpl->getVariable('smarty')->value['section']['transactionidx']['index']]['transaction_id'];?>
);" class="linkButton">
                        Details</a></td>
            </tr>
            <?php endfor; endif; ?> 
        </tbody>
    </table>

    <?php if (count($_smarty_tpl->tpl_vars['transactions']->value)>0){?>  
    <div align="right"><?php echo $_smarty_tpl->tpl_vars['links']->value;?>
</div>
    <?php }?> 
</div>

<script type="text/javascript">
//    
    $(document).ready(function(){  
        $("#buttonSearch").click(function() {
            if ($("#ajaxSearchContent").css("display") =='none')  {
                $("#ajaxDetailsContent").hide();				 				 				 
                $("#ajaxSearchContent").fadeIn();
            } else {
                document.frmSearch.submit();
            }
        });	
    });
//    
    function getTransactionDetails(transactionid)
    {
        var url = '<?php echo site_url("ajax/transaction_detail");?>
/'+transactionid;
//        
        $.post(url,{transaction_id:transactionid}, function(data)
        {
            $("#ajaxSearchContent").hide();
            $("#ajaxDetailsContent").html(data);
            $("#ajaxDetailsContent").fadeIn();
        }
//        
    );
    }
	
    // close delete new confirmform
    function closeTransactionDetailsContent()
    {

        $("#ajaxDetailsContent").hide();
        if ($("#ajaxSearchContent").css("display") !='none')  {		
            $("#ajaxSearchContent").fadeIn();
        }
    }
	
    // get Progcess Form
    function getProcessForm(transactionid)
    {
    }
	
</script><?php }} ?>