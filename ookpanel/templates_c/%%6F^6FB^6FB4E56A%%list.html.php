<?php /* Smarty version 2.6.18, created on 2010-02-28 18:35:06
         compiled from faqs/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'faqs/list.html', 8, false),)), $this); ?>
<table width="100%" cellpadding="0" cellspacing="0"  border="0">
<tr><td><h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h2></td><td align="right" width="40%">
	<form name="frmcfgGroup" action="<?php echo $this->_tpl_vars['link_faqs']; ?>
" method="post" >
	<table width="100%" cellpadding="0" cellspacing="0"  border="0" >
		<tr>
		  <td width="120"><?php echo $this->_tpl_vars['langs']['TEXT_SELECT_FAQ']; ?>
</td>
			<td><select name="parent_id" onchange="this.form.submit();">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['faqs_tree'],'selected' => $this->_tpl_vars['parent_id']), $this);?>

			</select></td>
		</tr>	
	</table>
	</form>	
	</td></tr>
</table>
<br />
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
<div> <a href="<?php echo $this->_tpl_vars['link_faq_new']; ?>
" class="linkButton" ><?php echo $this->_tpl_vars['langs']['LINK_NEW_FAQ']; ?>
</a></div><br /><div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HEADING_FAQ_NAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_FAQ_STATUS']; ?>
</td>		
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_FAQ_SORT_ORDER']; ?>
</td>			  			  	  
			  <td class="tableHeading" align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
			  </tr>
		<?php unset($this->_sections['faqidx']);
$this->_sections['faqidx']['name'] = 'faqidx';
$this->_sections['faqidx']['loop'] = is_array($_loop=$this->_tpl_vars['faqs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['faqidx']['show'] = true;
$this->_sections['faqidx']['max'] = $this->_sections['faqidx']['loop'];
$this->_sections['faqidx']['step'] = 1;
$this->_sections['faqidx']['start'] = $this->_sections['faqidx']['step'] > 0 ? 0 : $this->_sections['faqidx']['loop']-1;
if ($this->_sections['faqidx']['show']) {
    $this->_sections['faqidx']['total'] = $this->_sections['faqidx']['loop'];
    if ($this->_sections['faqidx']['total'] == 0)
        $this->_sections['faqidx']['show'] = false;
} else
    $this->_sections['faqidx']['total'] = 0;
if ($this->_sections['faqidx']['show']):

            for ($this->_sections['faqidx']['index'] = $this->_sections['faqidx']['start'], $this->_sections['faqidx']['iteration'] = 1;
                 $this->_sections['faqidx']['iteration'] <= $this->_sections['faqidx']['total'];
                 $this->_sections['faqidx']['index'] += $this->_sections['faqidx']['step'], $this->_sections['faqidx']['iteration']++):
$this->_sections['faqidx']['rownum'] = $this->_sections['faqidx']['iteration'];
$this->_sections['faqidx']['index_prev'] = $this->_sections['faqidx']['index'] - $this->_sections['faqidx']['step'];
$this->_sections['faqidx']['index_next'] = $this->_sections['faqidx']['index'] + $this->_sections['faqidx']['step'];
$this->_sections['faqidx']['first']      = ($this->_sections['faqidx']['iteration'] == 1);
$this->_sections['faqidx']['last']       = ($this->_sections['faqidx']['iteration'] == $this->_sections['faqidx']['total']);
?>	
			<?php if (( $this->_sections['faqidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr height="20">
			  <td width="40%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['is_topic']): ?> <strong><?php echo $this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['faqs_name']; ?>
</strong> <?php else: ?> <?php echo $this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['faqs_name']; ?>
<?php endif; ?></td>
			  <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['faqs_status'] == 1): ?> <?php echo $this->_tpl_vars['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['TEXT_INACTIVE']; ?>
 <?php endif; ?></td>			  			  <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center"><?php echo $this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['sort_order']; ?>
</td>

			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center" style="padding-right:10px"><a href="<?php echo $this->_tpl_vars['link_faq_edit']; ?>
&action=edit&faqID=<?php echo $this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['faqs_id']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['faqs'][$this->_sections['faqidx']['index']]['faqs_id']; ?>
);"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>
</td>
</tr>
</table>
<?php if (count ( $this->_tpl_vars['faqs'] ) > 0): ?>
<br />
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>