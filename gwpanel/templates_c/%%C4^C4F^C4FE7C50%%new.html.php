<?php /* Smarty version 2.6.18, created on 2010-03-16 01:58:17
         compiled from security_questions/new.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_image_source', 'security_questions/new.html', 11, false),array('function', 'html_radios', 'security_questions/new.html', 33, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['langs']['HEADING_NEW_SECURITY_QUESTION']; ?>
</h2>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo $this->_tpl_vars['link_new_security_question']; ?>
" method="post" name="frmNew" >
	<input type="hidden"  name="action" value="process" />
 	<table width="100%" cellpadding="2" cellspacing="2" >	
		 <tr><td colspan="2">
				<ul id="infotabs" class="shadetabs">
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
					<li><a href="#" rel="language<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['id']; ?>
" <?php if (languageudx == 0): ?> class="selected" <?php endif; ?> ><img src="<?php echo smarty_function_dev_get_image_source(array('name' => $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['image']), $this);?>
"  alt="<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['name']; ?>
" border="0"/></a></li>
				<?php endfor; endif; ?>		
			</ul>
			
				<div style="border: 1px solid green; padding: 10px; width: 100%; margin-bottom: 1em;">
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
				<?php $this->assign('langid', $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['id']); ?>
				<div style="display: none;" id="language<?php echo $this->_tpl_vars['langid']; ?>
" class="tabcontent">
				 <table width="100%" border="0"  cellpadding="2" cellspacing="5">
					 <tr><td class="main"  width="100"><?php echo $this->_tpl_vars['langs']['TEXT_SECURITY_QUESTION_NAME']; ?>
*</td>
					<td><input name="security_questions_name[<?php echo $this->_tpl_vars['langid']; ?>
]" type="text" value="<?php echo $this->_tpl_vars['security_questions_name'][$this->_tpl_vars['langid']]; ?>
" size="30"  /></td></tr>			
				</table>
				</div>
				<?php endfor; endif; ?>
				</div>
			  </td></tr>	
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_SECURITY_QUESTION_SORT_ORDER']; ?>
</td>
		  <td><input name="sort_order" type="text" id="sort_order" value="<?php echo $this->_tpl_vars['sort_order']; ?>
" size="5"></td>
	  </tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_SECURITY_QUESTION_STATUS']; ?>
</td>
		  <td><?php echo smarty_function_html_radios(array('name' => 'status','options' => $this->_tpl_vars['status_options'],'selected' => $this->_tpl_vars['status'],'separator' => "<br /><br />"), $this);?>
</td>
	  </tr>     	 
	  		
		<tr>
		  <td>&nbsp;</td>
		  <td>
		    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_SUBMIT']; ?>
" class="button">
	        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="window.location	='<?php echo $this->_tpl_vars['back_link']; ?>
';" class="button">
		  </td>
	  </tr>
	</table>
</form>	
</div>

<?php echo '
<script type="text/javascript">
var infos=new ddtabcontent("infotabs")
	infos.setpersist(true)
	infos.setselectedClassTarget("link") //"link" or "linkparent"
	infos.init()
</script>
'; ?>