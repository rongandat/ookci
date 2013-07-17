<?php /* Smarty version 2.6.18, created on 2010-02-28 18:34:24
         compiled from currencies/list.html */ ?>
<h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h2><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/feedback_messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div> <a href="<?php echo $this->_tpl_vars['link_new_currency']; ?>
" class="linkButton" ><?php echo $this->_tpl_vars['langs']['LINK_NEW_CURRENCY']; ?>
</a></div><br /><div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_CURRENCY_NAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_CURRENCY_CODE']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_CURRENCY_SYMBOL']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_CURRENCY_STATUS']; ?>
</td>			  
			  <td class="tableHeading" align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
			  </tr>
		<?php unset($this->_sections['currencyidx']);
$this->_sections['currencyidx']['name'] = 'currencyidx';
$this->_sections['currencyidx']['loop'] = is_array($_loop=$this->_tpl_vars['currencies']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['currencyidx']['show'] = true;
$this->_sections['currencyidx']['max'] = $this->_sections['currencyidx']['loop'];
$this->_sections['currencyidx']['step'] = 1;
$this->_sections['currencyidx']['start'] = $this->_sections['currencyidx']['step'] > 0 ? 0 : $this->_sections['currencyidx']['loop']-1;
if ($this->_sections['currencyidx']['show']) {
    $this->_sections['currencyidx']['total'] = $this->_sections['currencyidx']['loop'];
    if ($this->_sections['currencyidx']['total'] == 0)
        $this->_sections['currencyidx']['show'] = false;
} else
    $this->_sections['currencyidx']['total'] = 0;
if ($this->_sections['currencyidx']['show']):

            for ($this->_sections['currencyidx']['index'] = $this->_sections['currencyidx']['start'], $this->_sections['currencyidx']['iteration'] = 1;
                 $this->_sections['currencyidx']['iteration'] <= $this->_sections['currencyidx']['total'];
                 $this->_sections['currencyidx']['index'] += $this->_sections['currencyidx']['step'], $this->_sections['currencyidx']['iteration']++):
$this->_sections['currencyidx']['rownum'] = $this->_sections['currencyidx']['iteration'];
$this->_sections['currencyidx']['index_prev'] = $this->_sections['currencyidx']['index'] - $this->_sections['currencyidx']['step'];
$this->_sections['currencyidx']['index_next'] = $this->_sections['currencyidx']['index'] + $this->_sections['currencyidx']['step'];
$this->_sections['currencyidx']['first']      = ($this->_sections['currencyidx']['iteration'] == 1);
$this->_sections['currencyidx']['last']       = ($this->_sections['currencyidx']['iteration'] == $this->_sections['currencyidx']['total']);
?>	
			<?php if (( $this->_sections['currencyidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr>
			  <td width="22%" height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['title']; ?>
</td>
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['code']; ?>
</td>
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['symbol_left'] != ''): ?> <?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['symbol_left']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['symbol_right']; ?>
 <?php endif; ?>&nbsp;</td>			  
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['status'] == 1): ?> <?php echo $this->_tpl_vars['langs']['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['langs']['TEXT_INACTIVE']; ?>
 <?php endif; ?> </td>			  
			  <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="<?php echo $this->_tpl_vars['link_currency_edit']; ?>
&cID=<?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['currencies_id']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['currencies'][$this->_sections['currencyidx']['index']]['currencies_id']; ?>
);"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>
</td>
</tr>
</table>
</div>
<?php if (count ( $this->_tpl_vars['currencies'] ) > 0): ?> 
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>