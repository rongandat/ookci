<?php /* Smarty version 2.6.18, created on 2010-02-20 04:45:32
         compiled from news/new.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'news/new.html', 5, false),array('function', 'html_radios', 'news/new.html', 10, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['PAGE_HEADING']; ?>
</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<form action="<?php echo $this->_tpl_vars['action_link']; ?>
" method="post" name="frmNews" >
 	<label><?php echo $this->_tpl_vars['LABEL_NEWS_DATE']; ?>
*</label> <?php echo smarty_function_html_select_date(array('prefix' => 'news','end_year' => "+6",'time' => $this->_tpl_vars['news_date']), $this);?>
<br /><br />
	 <label><?php echo $this->_tpl_vars['LABEL_NEWS_TITLE']; ?>
*</label><input name="news_title" type="text" id="news_title" value="<?php echo $this->_tpl_vars['news_title']; ?>
" size="50"><br />
	 <label><?php echo $this->_tpl_vars['LABEL_NEWS_DESCRIPTION']; ?>
*</label><br /><br /><textarea name="news_description" cols="50" rows="20" id="news_description"  class="tinymce" ><?php echo $this->_tpl_vars['news_description']; ?>
</textarea><br /><br />
	 <label><?php echo $this->_tpl_vars['LABEL_NEWS_PATH']; ?>
*</label><input name="news_path" type="text" id="news_path" value="<?php echo $this->_tpl_vars['news_path']; ?>
" size="50"><br /><br />
	 <label>This is New news?</label><input type="checkbox" name="news_status"  value="1" <?php if ($this->_tpl_vars['news_status']): ?> checked="checked" <?php endif; ?> /><img src="images/new.gif"  alt="set this news to new" /><br /><br />	
	 <label><?php echo $this->_tpl_vars['LABEL_NEWS_TYPE']; ?>
*</label><div style="float:left"><?php echo smarty_function_html_radios(array('name' => 'news_type','options' => $this->_tpl_vars['news_type_options'],'selected' => $this->_tpl_vars['news_type'],'separator' => "<br /><br />"), $this);?>
</div><br /><br /><br />
	 <p >
		    <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_SUBMIT']; ?>
"  class="button">
	        <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="window.location	=	'<?php echo $this->_tpl_vars['back_link']; ?>
';"  class="button">
		  </p>
</form>	
</div>
<h3><?php echo $this->_tpl_vars['HEADING_NEWS_LOG']; ?>
</h3>
<div id="news_log">
<?php if (count ( $this->_tpl_vars['news_log'] ) > 0): ?>
<ul>
	<?php unset($this->_sections['newslogidx']);
$this->_sections['newslogidx']['name'] = 'newslogidx';
$this->_sections['newslogidx']['loop'] = is_array($_loop=$this->_tpl_vars['news_log']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['newslogidx']['show'] = true;
$this->_sections['newslogidx']['max'] = $this->_sections['newslogidx']['loop'];
$this->_sections['newslogidx']['step'] = 1;
$this->_sections['newslogidx']['start'] = $this->_sections['newslogidx']['step'] > 0 ? 0 : $this->_sections['newslogidx']['loop']-1;
if ($this->_sections['newslogidx']['show']) {
    $this->_sections['newslogidx']['total'] = $this->_sections['newslogidx']['loop'];
    if ($this->_sections['newslogidx']['total'] == 0)
        $this->_sections['newslogidx']['show'] = false;
} else
    $this->_sections['newslogidx']['total'] = 0;
if ($this->_sections['newslogidx']['show']):

            for ($this->_sections['newslogidx']['index'] = $this->_sections['newslogidx']['start'], $this->_sections['newslogidx']['iteration'] = 1;
                 $this->_sections['newslogidx']['iteration'] <= $this->_sections['newslogidx']['total'];
                 $this->_sections['newslogidx']['index'] += $this->_sections['newslogidx']['step'], $this->_sections['newslogidx']['iteration']++):
$this->_sections['newslogidx']['rownum'] = $this->_sections['newslogidx']['iteration'];
$this->_sections['newslogidx']['index_prev'] = $this->_sections['newslogidx']['index'] - $this->_sections['newslogidx']['step'];
$this->_sections['newslogidx']['index_next'] = $this->_sections['newslogidx']['index'] + $this->_sections['newslogidx']['step'];
$this->_sections['newslogidx']['first']      = ($this->_sections['newslogidx']['iteration'] == 1);
$this->_sections['newslogidx']['last']       = ($this->_sections['newslogidx']['iteration'] == $this->_sections['newslogidx']['total']);
?>
		<li><a href="<?php echo $this->_tpl_vars['news_log'][$this->_sections['newslogidx']['index']]['news_url']; ?>
" ><?php echo $this->_tpl_vars['news_log'][$this->_sections['newslogidx']['index']]['news_title']; ?>
 - <?php echo $this->_tpl_vars['news_log'][$this->_sections['newslogidx']['index']]['news_date']; ?>
</a></li>
	<?php endfor; endif; ?>
</ul>
<?php endif; ?>
</div>