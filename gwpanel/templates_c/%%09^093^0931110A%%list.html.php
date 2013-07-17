<?php /* Smarty version 2.6.18, created on 2012-06-05 09:34:30
         compiled from users/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'users/list.html', 3, false),array('modifier', 'date_format', 'users/list.html', 40, false),)), $this); ?>
<h2>Users</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/feedback_messages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="frmSearch"  action="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_USERS'), $this);?>
"   method="post">
<div  id="ajaxSearchContent" <?php if ($this->_tpl_vars['action'] != 'process_search'): ?> style="display:none" <?php endif; ?>>
<h4>Search Filter</h4>
<input type="hidden" name="action" value="process_search" >
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td width="100">Account Number</td><td><input name="account_number"   size="12" maxlength="12"   type="text"> </td></tr>
<tr><td>Keyword</td><td><input name="keyword"   type="text"  size="50" > </td></tr>
</table>
<br>
</div>
<table width="100%" cellpadding="0" cellspacing="0"  border="0">
	<tr><td><input type="button"  class="button" id="buttonSearch"  value="Search User" /></td></tr>
</table>
<br>
<div  id="ajaxDetailsContent" style="display:none"></div>

<?php if ($this->_tpl_vars['feedback_message']): ?> 	
	<p><span class="success" ><?php echo $this->_tpl_vars['feedback_message']; ?>
</span></p>
<?php endif; ?>
<table width="100%" cellpadding="0" cellspacing="0"  border="0">
<tr><td valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading">First Name#</td>
			  <td class="tableHeading">Last Name </td>			  
			  <td class="tableHeading">Account Number </td>			  
			  <td class="tableHeading">Account Name </td>			
			  <td class="tableHeading">Signup Date </td>			
			  <td class="tableHeading" align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
		  </tr>
		<?php unset($this->_sections['useridx']);
$this->_sections['useridx']['name'] = 'useridx';
$this->_sections['useridx']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['useridx']['show'] = true;
$this->_sections['useridx']['max'] = $this->_sections['useridx']['loop'];
$this->_sections['useridx']['step'] = 1;
$this->_sections['useridx']['start'] = $this->_sections['useridx']['step'] > 0 ? 0 : $this->_sections['useridx']['loop']-1;
if ($this->_sections['useridx']['show']) {
    $this->_sections['useridx']['total'] = $this->_sections['useridx']['loop'];
    if ($this->_sections['useridx']['total'] == 0)
        $this->_sections['useridx']['show'] = false;
} else
    $this->_sections['useridx']['total'] = 0;
if ($this->_sections['useridx']['show']):

            for ($this->_sections['useridx']['index'] = $this->_sections['useridx']['start'], $this->_sections['useridx']['iteration'] = 1;
                 $this->_sections['useridx']['iteration'] <= $this->_sections['useridx']['total'];
                 $this->_sections['useridx']['index'] += $this->_sections['useridx']['step'], $this->_sections['useridx']['iteration']++):
$this->_sections['useridx']['rownum'] = $this->_sections['useridx']['iteration'];
$this->_sections['useridx']['index_prev'] = $this->_sections['useridx']['index'] - $this->_sections['useridx']['step'];
$this->_sections['useridx']['index_next'] = $this->_sections['useridx']['index'] + $this->_sections['useridx']['step'];
$this->_sections['useridx']['first']      = ($this->_sections['useridx']['iteration'] == 1);
$this->_sections['useridx']['last']       = ($this->_sections['useridx']['iteration'] == $this->_sections['useridx']['total']);
?>	
			<?php if (( $this->_sections['useridx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
			<tr>
			  <td height="25"   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['firstname']; ?>
</td>
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['lastname']; ?>
</td>			  			  
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><strong><?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['account_number']; ?>
</strong></td>			  			  
			  <td   class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['account_name']; ?>
</td>			  
			  <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_sections['useridx']['index']]['signup_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y %l:%M %p") : smarty_modifier_date_format($_tmp, "%m/%d/%Y %l:%M %p")); ?>
</td>			  			  
			  <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="javascript:editUser(<?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['user_id']; ?>
);" class="linkButton">Edit</a>&nbsp;<a href="javascript:getUserDetails(<?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['user_id']; ?>
);" class="linkButton"><?php echo $this->_tpl_vars['ACTION_VIEW']; ?>
</a>&nbsp;<a href="javascript:getProcessForm(<?php echo $this->_tpl_vars['users'][$this->_sections['useridx']['index']]['user_id']; ?>
);"  class="linkButton" >Change</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>
</td>
</tr>
</table>
</div>
<?php if (count ( $this->_tpl_vars['users'] ) > 0): ?> 
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>
</form>