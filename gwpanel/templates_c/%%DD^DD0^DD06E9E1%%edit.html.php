<?php /* Smarty version 2.6.18, created on 2012-03-25 07:33:53
         compiled from emailtemplates/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'emailtemplates/edit.html', 14, false),array('function', 'dev_get_image_source', 'emailtemplates/edit.html', 23, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['langs']['HEADING_EDIT_EMAILTEMPLATE']; ?>
</h2>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo $this->_tpl_vars['link_edit_emailtemplate']; ?>
" method="post" name="frmEdit" >
	<input type="hidden"  name="action" value="process" />
 	<table width="100%" cellpadding="2" cellspacing="2" >	
		<tr>
		  <td width="120"><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_KEY']; ?>
</td>
		  <td><input name="emailtemplate_key" type="text" id="emailtemplate_key" value="<?php echo $this->_tpl_vars['emailtemplate_key']; ?>
" size="50"></td>
	  </tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_STATUS']; ?>
</td>
		  <td><?php echo smarty_function_html_radios(array('name' => 'emailtemplate_status','options' => $this->_tpl_vars['status_options'],'selected' => $this->_tpl_vars['emailtemplate_status'],'separator' => "<br /><br />"), $this);?>
</td>
	  </tr>    
	<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_IS_HTML_EMAIL']; ?>
</td>
		  <td><?php echo smarty_function_html_radios(array('name' => 'is_html_email','options' => $this->_tpl_vars['yesno_status_options'],'selected' => $this->_tpl_vars['is_html_email'],'separator' => "<br /><br />"), $this);?>
</td>
	  </tr>    	  
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
		     <tr><td class="main"  width="120"><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_TITLE']; ?>
*</td>
				<td><input name="emailtemplates_title[<?php echo $this->_tpl_vars['langid']; ?>
]" type="text" value="<?php echo $this->_tpl_vars['emailtemplates_title'][$this->_tpl_vars['langid']]; ?>
" size="30"  /></td>
			</tr>
		     <tr><td class="main"  width="120"><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_SUBJECT']; ?>
*</td>
				<td><input name="emailtemplates_subject[<?php echo $this->_tpl_vars['langid']; ?>
]" type="text" value="<?php echo $this->_tpl_vars['emailtemplates_subject'][$this->_tpl_vars['langid']]; ?>
" size="100"  /></td>
			</tr>

			<tr><td class="main"><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_CONTENT']; ?>
</td>
				<td><textarea name="emailtemplates_content[<?php echo $this->_tpl_vars['langid']; ?>
]" cols="50" rows="15" id="emailtemplates_content[<?php echo $this->_tpl_vars['langid']; ?>
]"  class="tinymce" ><?php echo $this->_tpl_vars['emailtemplates_content'][$this->_tpl_vars['langid']]; ?>
</textarea></td>
			</tr>
			<tr><td class="main"><?php echo $this->_tpl_vars['langs']['TEXT_EMAILTEMPLATE_USAGE']; ?>
</td>
				<td><textarea name="emailtemplates_usage[<?php echo $this->_tpl_vars['langid']; ?>
]" cols="80" rows="5" id="emailtemplates_usage[<?php echo $this->_tpl_vars['langid']; ?>
]"  ><?php echo $this->_tpl_vars['emailtemplates_usage'][$this->_tpl_vars['langid']]; ?>
</textarea></td>
			</tr>
		</table>
		</div>
		<?php endfor; endif; ?>
		</div>
	  </td></tr>
	  		
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