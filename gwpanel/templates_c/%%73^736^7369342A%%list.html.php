<?php /* Smarty version 2.6.18, created on 2011-09-11 10:36:39
         compiled from news/list.html */ ?>
<h2><?php echo $this->_tpl_vars['HEADING_LIST_NEWS']; ?>
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
<div> <a href="<?php echo $this->_tpl_vars['link_new_news']; ?>
"  class="linkButton"><?php echo $this->_tpl_vars['LINK_NEW_NEWS']; ?>
</a></div><br />
<div>
<div  id="ajaxContent" style="display:none"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<form name="frmNews" action="<?php echo $this->_tpl_vars['action_news']; ?>
" method="post" >

		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['HEADER_NEWS_TITLE']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['HEADER_NEWS_TIME']; ?>
</td>
			  <td class="tableHeading"><div align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</div></td>
			  </tr>
		<?php unset($this->_sections['newsidx']);
$this->_sections['newsidx']['name'] = 'newsidx';
$this->_sections['newsidx']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['newsidx']['show'] = true;
$this->_sections['newsidx']['max'] = $this->_sections['newsidx']['loop'];
$this->_sections['newsidx']['step'] = 1;
$this->_sections['newsidx']['start'] = $this->_sections['newsidx']['step'] > 0 ? 0 : $this->_sections['newsidx']['loop']-1;
if ($this->_sections['newsidx']['show']) {
    $this->_sections['newsidx']['total'] = $this->_sections['newsidx']['loop'];
    if ($this->_sections['newsidx']['total'] == 0)
        $this->_sections['newsidx']['show'] = false;
} else
    $this->_sections['newsidx']['total'] = 0;
if ($this->_sections['newsidx']['show']):

            for ($this->_sections['newsidx']['index'] = $this->_sections['newsidx']['start'], $this->_sections['newsidx']['iteration'] = 1;
                 $this->_sections['newsidx']['iteration'] <= $this->_sections['newsidx']['total'];
                 $this->_sections['newsidx']['index'] += $this->_sections['newsidx']['step'], $this->_sections['newsidx']['iteration']++):
$this->_sections['newsidx']['rownum'] = $this->_sections['newsidx']['iteration'];
$this->_sections['newsidx']['index_prev'] = $this->_sections['newsidx']['index'] - $this->_sections['newsidx']['step'];
$this->_sections['newsidx']['index_next'] = $this->_sections['newsidx']['index'] + $this->_sections['newsidx']['step'];
$this->_sections['newsidx']['first']      = ($this->_sections['newsidx']['iteration'] == 1);
$this->_sections['newsidx']['last']       = ($this->_sections['newsidx']['iteration'] == $this->_sections['newsidx']['total']);
?>	  
			<?php if (( $this->_sections['newsidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>			
			<tr>
			  <td width="39%" height="20" class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><a href="<?php echo $this->_tpl_vars['news'][$this->_sections['newsidx']['index']]['news_url']; ?>
" ><?php echo $this->_tpl_vars['news'][$this->_sections['newsidx']['index']]['news_title']; ?>
</a></td>
			  <td width="34%" class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['news'][$this->_sections['newsidx']['index']]['news_date']; ?>
</td>
			  <td width="27%" class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center"><a href="<?php echo $this->_tpl_vars['news'][$this->_sections['newsidx']['index']]['news_url']; ?>
" class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteNewsConfirmForm(<?php echo $this->_tpl_vars['news'][$this->_sections['newsidx']['index']]['news_id']; ?>
);" class="linkButton"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>

        </form>	

</td>
</tr>
</table>
</div>
<?php if (count ( $this->_tpl_vars['news'] ) > 0): ?>
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>