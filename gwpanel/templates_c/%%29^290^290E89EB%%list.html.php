<?php /* Smarty version 2.6.18, created on 2010-03-15 22:21:19
         compiled from emailtemplates/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'emailtemplates/list.html', 7, false),)), $this); ?>
<table width="100%" cellpadding="0" cellspacing="0"  border="0">
<tr><td><h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h2></td></tr>
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
<div> <a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_EMAILTEMPLATE_NEW'), $this);?>
" class="linkButton" ><?php echo $this->_tpl_vars['langs']['LINK_NEW_EMAILTEMPLATE']; ?>
</a></div><br /><div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HEADING_EMAILTEMPLATE_NAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_EMAILTEMPLATE_STATUS']; ?>
</td>		
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_EMAILTEMPLATE_IS_HTML_EMAIL']; ?>
</td>			  			  	  
			  <td class="tableHeading" align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
			  </tr>
		<?php unset($this->_sections['emailtemplateidx']);
$this->_sections['emailtemplateidx']['name'] = 'emailtemplateidx';
$this->_sections['emailtemplateidx']['loop'] = is_array($_loop=$this->_tpl_vars['emailtemplates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['emailtemplateidx']['show'] = true;
$this->_sections['emailtemplateidx']['max'] = $this->_sections['emailtemplateidx']['loop'];
$this->_sections['emailtemplateidx']['step'] = 1;
$this->_sections['emailtemplateidx']['start'] = $this->_sections['emailtemplateidx']['step'] > 0 ? 0 : $this->_sections['emailtemplateidx']['loop']-1;
if ($this->_sections['emailtemplateidx']['show']) {
    $this->_sections['emailtemplateidx']['total'] = $this->_sections['emailtemplateidx']['loop'];
    if ($this->_sections['emailtemplateidx']['total'] == 0)
        $this->_sections['emailtemplateidx']['show'] = false;
} else
    $this->_sections['emailtemplateidx']['total'] = 0;
if ($this->_sections['emailtemplateidx']['show']):

            for ($this->_sections['emailtemplateidx']['index'] = $this->_sections['emailtemplateidx']['start'], $this->_sections['emailtemplateidx']['iteration'] = 1;
                 $this->_sections['emailtemplateidx']['iteration'] <= $this->_sections['emailtemplateidx']['total'];
                 $this->_sections['emailtemplateidx']['index'] += $this->_sections['emailtemplateidx']['step'], $this->_sections['emailtemplateidx']['iteration']++):
$this->_sections['emailtemplateidx']['rownum'] = $this->_sections['emailtemplateidx']['iteration'];
$this->_sections['emailtemplateidx']['index_prev'] = $this->_sections['emailtemplateidx']['index'] - $this->_sections['emailtemplateidx']['step'];
$this->_sections['emailtemplateidx']['index_next'] = $this->_sections['emailtemplateidx']['index'] + $this->_sections['emailtemplateidx']['step'];
$this->_sections['emailtemplateidx']['first']      = ($this->_sections['emailtemplateidx']['iteration'] == 1);
$this->_sections['emailtemplateidx']['last']       = ($this->_sections['emailtemplateidx']['iteration'] == $this->_sections['emailtemplateidx']['total']);
?>	
			<?php if (( $this->_sections['emailtemplateidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr height="20">
			  <td width="40%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['emailtemplates'][$this->_sections['emailtemplateidx']['index']]['emailtemplate_title']; ?>
</td>
			  <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['emailtemplates'][$this->_sections['emailtemplateidx']['index']]['emailtemplate_status'] == 1): ?> <?php echo $this->_tpl_vars['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['TEXT_INACTIVE']; ?>
 <?php endif; ?></td>			  			  <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center"><?php echo $this->_tpl_vars['emailtemplates'][$this->_sections['emailtemplateidx']['index']]['sort_order']; ?>
</td>

			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center" style="padding-right:10px"><a href="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_EMAILTEMPLATE_EDIT'), $this);?>
&emailtemplateID=<?php echo $this->_tpl_vars['emailtemplates'][$this->_sections['emailtemplateidx']['index']]['emailtemplates_id']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['emailtemplates'][$this->_sections['emailtemplateidx']['index']]['emailtemplates_id']; ?>
);"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>
</td>
</tr>
</table>
<br />
<?php if (count ( $this->_tpl_vars['emailtemplates'] ) > 0): ?>
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>