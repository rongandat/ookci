<?php /* Smarty version 2.6.18, created on 2013-08-01 06:09:55
         compiled from account/history.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/history.html', 5, false),array('function', 'html_options', 'account/history.html', 15, false),array('modifier', 'date_format', 'account/history.html', 76, false),)), $this); ?>
<div class="simple-form">
    <h1>Transaction History</h1>
    <div class="line"></div>
    <div class="clear"></div>
    <form name="frmSearch"  action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_TRANSACTIONS','ssl' => true), $this);?>
"   method="post">
        <div  id="ajaxSearchContent" <?php if ($this->_tpl_vars['action'] != 'process_search'): ?> style="display:none" <?php endif; ?> >
              <h3>Search Filter</h3>
            <input type="hidden" name="action" value="process_search" >

            <table class="form">
                <tr>
                    <td>
                        From Date</td><td>
                        <select name="fromdateMonth" >
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['fromdateMonth']), $this);?>
</select>&nbsp;<select name="fromdateDay">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['fromdateDay']), $this);?>
</select>&nbsp;&nbsp;

                        <select name="fromdateYear">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['fromdateYear']), $this);?>
</select>&nbsp;(mm/dd/yy)</td></tr>
                <tr><td>To Date</td><td><select name="todateMonth" >
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['todateMonth']), $this);?>
</select>&nbsp;<select name="todateDay">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['todateDay']), $this);?>
</select>&nbsp;&nbsp;

                        <select name="todateYear">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['todateYear']), $this);?>
</select>&nbsp;(mm/dd/yy)</td></tr>
                <tr><td>&nbsp;</td><td><input name="search_date_filter"    type="checkbox" value="1"  <?php if ($this->_tpl_vars['search_date_filter']): ?> checked="checked" <?php endif; ?>> Search using dates filter</td></tr>
                <tr><td>Batch Number#</td><td>
                        <input name="batch_number"   size="12" maxlength="12"  value="<?php echo $this->_tpl_vars['batch_number']; ?>
"  type="text">
                    </td></tr>
                <tr><td>From Account</td><td>

                        <input name="from_account"   type="text" value="<?php echo $this->_tpl_vars['from_account']; ?>
" size="20" >
                    </td></tr>
                <tr><td>To Account</td><td>

                        <input name="to_account"   type="text" value="<?php echo $this->_tpl_vars['to_account']; ?>
" size="20">
                    </td></tr>
                <tr><td>Transaction Reference</td><td>
                        <input name="transaction_note"   value="<?php echo $this->_tpl_vars['transaction_note']; ?>
" type="text" size="50">
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
                <td class="tableHeading" align="center">
                    <?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
            </tr>
        </thead>
        <tbody>
            <?php unset($this->_sections['transactionidx']);
$this->_sections['transactionidx']['name'] = 'transactionidx';
$this->_sections['transactionidx']['loop'] = is_array($_loop=$this->_tpl_vars['transactions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['transactionidx']['show'] = true;
$this->_sections['transactionidx']['max'] = $this->_sections['transactionidx']['loop'];
$this->_sections['transactionidx']['step'] = 1;
$this->_sections['transactionidx']['start'] = $this->_sections['transactionidx']['step'] > 0 ? 0 : $this->_sections['transactionidx']['loop']-1;
if ($this->_sections['transactionidx']['show']) {
    $this->_sections['transactionidx']['total'] = $this->_sections['transactionidx']['loop'];
    if ($this->_sections['transactionidx']['total'] == 0)
        $this->_sections['transactionidx']['show'] = false;
} else
    $this->_sections['transactionidx']['total'] = 0;
if ($this->_sections['transactionidx']['show']):

            for ($this->_sections['transactionidx']['index'] = $this->_sections['transactionidx']['start'], $this->_sections['transactionidx']['iteration'] = 1;
                 $this->_sections['transactionidx']['iteration'] <= $this->_sections['transactionidx']['total'];
                 $this->_sections['transactionidx']['index'] += $this->_sections['transactionidx']['step'], $this->_sections['transactionidx']['iteration']++):
$this->_sections['transactionidx']['rownum'] = $this->_sections['transactionidx']['iteration'];
$this->_sections['transactionidx']['index_prev'] = $this->_sections['transactionidx']['index'] - $this->_sections['transactionidx']['step'];
$this->_sections['transactionidx']['index_next'] = $this->_sections['transactionidx']['index'] + $this->_sections['transactionidx']['step'];
$this->_sections['transactionidx']['first']      = ($this->_sections['transactionidx']['iteration'] == 1);
$this->_sections['transactionidx']['last']       = ($this->_sections['transactionidx']['iteration'] == $this->_sections['transactionidx']['total']);
?>	
            <?php if (( $this->_sections['transactionidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>

            <tr>
                <td width="22%" height="25"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
">
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</td>
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['batch_number']; ?>
</td>
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['from_account']; ?>
</td>			  			  			  
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><strong><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['to_account']; ?>
</strong></td>			  			  
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
 currentcy" ><?php if ($this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['from_userid'] == $_SESSION['login_userid']): ?><span class="red">-<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['amount_text']; ?>
</span><?php else: ?> <span class="green">+<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['amount_text']; ?>
</span><?php endif; ?></td>			  
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
 currentcy" ><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['fee_text']; ?>
&nbsp;</td>	
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" ><?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_memo']; ?>
&nbsp;</td>	
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center">
                    <?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_currency']; ?>
</td>			  			  			  
                <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="javascript:getTransactionDetails(<?php echo $this->_tpl_vars['transactions'][$this->_sections['transactionidx']['index']]['transaction_id']; ?>
);" class="linkButton">
                        Details</a></td>
            </tr>
            <?php endfor; endif; ?> 
        </tbody>
    </table>

    <?php if (count ( $this->_tpl_vars['transactions'] ) > 0): ?>  
    <div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
    <?php endif; ?> 
</div>