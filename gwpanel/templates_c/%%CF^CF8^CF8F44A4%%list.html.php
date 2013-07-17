<?php /* Smarty version 2.6.18, created on 2011-09-11 10:36:34
         compiled from langs/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_image_source', 'langs/list.html', 22, false),)), $this); ?>
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

<div> <a href="<?php echo $this->_tpl_vars['link_new_language']; ?>
" class="linkButton" ><?php echo $this->_tpl_vars['langs']['LINK_NEW_LANGUAGE']; ?>
</a></div><br /><div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_NAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_CODE']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_IMAGE']; ?>
</td>			  
			  <td class="tableHeading"><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_STATUS']; ?>
</td>
			  <td class="tableHeading" align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
			  </tr>
		<?php unset($this->_sections['languageidx']);
$this->_sections['languageidx']['name'] = 'languageidx';
$this->_sections['languageidx']['loop'] = is_array($_loop=$this->_tpl_vars['languages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['languageidx']['show'] = true;
$this->_sections['languageidx']['max'] = $this->_sections['languageidx']['loop'];
$this->_sections['languageidx']['step'] = 1;
$this->_sections['languageidx']['start'] = $this->_sections['languageidx']['step'] > 0 ? 0 : $this->_sections['languageidx']['loop']-1;
if ($this->_sections['languageidx']['show']) {
    $this->_sections['languageidx']['total'] = $this->_sections['languageidx']['loop'];
    if ($this->_sections['languageidx']['total'] == 0)
        $this->_sections['languageidx']['show'] = false;
} else
    $this->_sections['languageidx']['total'] = 0;
if ($this->_sections['languageidx']['show']):

            for ($this->_sections['languageidx']['index'] = $this->_sections['languageidx']['start'], $this->_sections['languageidx']['iteration'] = 1;
                 $this->_sections['languageidx']['iteration'] <= $this->_sections['languageidx']['total'];
                 $this->_sections['languageidx']['index'] += $this->_sections['languageidx']['step'], $this->_sections['languageidx']['iteration']++):
$this->_sections['languageidx']['rownum'] = $this->_sections['languageidx']['iteration'];
$this->_sections['languageidx']['index_prev'] = $this->_sections['languageidx']['index'] - $this->_sections['languageidx']['step'];
$this->_sections['languageidx']['index_next'] = $this->_sections['languageidx']['index'] + $this->_sections['languageidx']['step'];
$this->_sections['languageidx']['first']      = ($this->_sections['languageidx']['iteration'] == 1);
$this->_sections['languageidx']['last']       = ($this->_sections['languageidx']['iteration'] == $this->_sections['languageidx']['total']);
?>	
			<?php if (( $this->_sections['languageidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr>
			  <td width="22%" height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_name']; ?>
</td>
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_code']; ?>
</td>
			  <td width="35%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><img src="<?php echo smarty_function_dev_get_image_source(array('name' => $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_image']), $this);?>
"  alt="<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_name']; ?>
"/></td>
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_status'] == 1): ?> <?php echo $this->_tpl_vars['langs']['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['langs']['TEXT_INACTIVE']; ?>
 <?php endif; ?> </td>			  
			  <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="<?php echo $this->_tpl_vars['link_language_edit']; ?>
&lID=<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_id']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_id']; ?>
);"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>
</td>
</tr>
</table>
</div>
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>