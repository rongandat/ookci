<?php /* Smarty version 2.6.18, created on 2010-03-15 22:22:16
         compiled from admins/list.html */ ?>
<h2><?php echo $this->_tpl_vars['HEADING_LIST_ADMIN_ACCOUNTS']; ?>
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

<div> <a href="<?php echo $this->_tpl_vars['link_new_admin']; ?>
" class="linkButton" ><?php echo $this->_tpl_vars['LINK_NEW_ADMIN']; ?>
</a></div><br /><div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<form name="frmAdmins" action="<?php echo $this->_tpl_vars['action_admins']; ?>
" method="post" >

		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['HEADER_ADMIN_USERNAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['HEADER_ADMIN_NAME']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['HEADER_ADMIN_EMAIL']; ?>
</td>
			  <td class="tableHeading"><div align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</div></td>
			  </tr>
		<?php unset($this->_sections['adminidx']);
$this->_sections['adminidx']['name'] = 'adminidx';
$this->_sections['adminidx']['loop'] = is_array($_loop=$this->_tpl_vars['admins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['adminidx']['show'] = true;
$this->_sections['adminidx']['max'] = $this->_sections['adminidx']['loop'];
$this->_sections['adminidx']['step'] = 1;
$this->_sections['adminidx']['start'] = $this->_sections['adminidx']['step'] > 0 ? 0 : $this->_sections['adminidx']['loop']-1;
if ($this->_sections['adminidx']['show']) {
    $this->_sections['adminidx']['total'] = $this->_sections['adminidx']['loop'];
    if ($this->_sections['adminidx']['total'] == 0)
        $this->_sections['adminidx']['show'] = false;
} else
    $this->_sections['adminidx']['total'] = 0;
if ($this->_sections['adminidx']['show']):

            for ($this->_sections['adminidx']['index'] = $this->_sections['adminidx']['start'], $this->_sections['adminidx']['iteration'] = 1;
                 $this->_sections['adminidx']['iteration'] <= $this->_sections['adminidx']['total'];
                 $this->_sections['adminidx']['index'] += $this->_sections['adminidx']['step'], $this->_sections['adminidx']['iteration']++):
$this->_sections['adminidx']['rownum'] = $this->_sections['adminidx']['iteration'];
$this->_sections['adminidx']['index_prev'] = $this->_sections['adminidx']['index'] - $this->_sections['adminidx']['step'];
$this->_sections['adminidx']['index_next'] = $this->_sections['adminidx']['index'] + $this->_sections['adminidx']['step'];
$this->_sections['adminidx']['first']      = ($this->_sections['adminidx']['iteration'] == 1);
$this->_sections['adminidx']['last']       = ($this->_sections['adminidx']['iteration'] == $this->_sections['adminidx']['total']);
?>	
			<?php if (( $this->_sections['adminidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr>
			  <td width="22%" height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><a href="<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_url']; ?>
" ><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_username']; ?>
</a></td>
			  <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_contactname']; ?>
</td>
			  <td width="35%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_email']; ?>
</td>
			  <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_url']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_id']; ?>
);"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>

        </form>	

</td>
</tr>
</table>
</div>
<?php if (count ( $this->_tpl_vars['admins'] ) > 0): ?>
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>