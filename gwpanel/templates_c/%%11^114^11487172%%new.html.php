<?php /* Smarty version 2.6.18, created on 2010-02-21 19:01:09
         compiled from langs/new.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'langs/new.html', 34, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['langs']['HEADING_NEW_LANGUAGE']; ?>
</h2>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo $this->_tpl_vars['link_new_language']; ?>
" method="post" name="frmNew" >
	<input type="hidden"  name="action" value="process" />
 	<table width="100%" cellpadding="2" cellspacing="2" >
	
		<tr>
		  <td width="120"><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_NAME']; ?>
*</td>
		  <td><input name="language_name" type="text" id="language_name" value="<?php echo $this->_tpl_vars['language_name']; ?>
"></td>
	  </tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_CODE']; ?>
*</td>
		  <td><input name="language_code" type="text" id="language_code" value="<?php echo $this->_tpl_vars['language_code']; ?>
" size="5" maxlength="5"></td>
	  </tr>
		
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_DIRECTORY']; ?>
*</td>
		  <td><input name="language_directory" type="text" id="language_directory" value="<?php echo $this->_tpl_vars['language_directory']; ?>
"  size="30"></td>
	  </tr>
		
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_IMAGE']; ?>
*</td>
		  <td><input name="language_image" type="text" id="language_image" value="<?php echo $this->_tpl_vars['language_image']; ?>
" size="30"></td>
	  </tr>
	
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_SORT_ORDER']; ?>
</td>
		  <td><input name="sort_order" type="text" id="sort_order" value="<?php echo $this->_tpl_vars['sort_order']; ?>
" size="5"></td>
	  </tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['langs']['TEXT_LANGUAGE_STATUS']; ?>
</td>
		  <td><?php echo smarty_function_html_radios(array('name' => 'language_status','options' => $this->_tpl_vars['status_options'],'selected' => $this->_tpl_vars['language_status'],'separator' => "<br /><br />"), $this);?>
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