<?php /* Smarty version 2.6.18, created on 2010-02-20 12:15:02
         compiled from infors/list.html */ ?>
<div align="center" class="pageHeading"><?php echo $this->_tpl_vars['HEADING_LIST_INFORS']; ?>
</div><br />
<div> <a href="<?php echo $this->_tpl_vars['link_new_info']; ?>
" ><?php echo $this->_tpl_vars['LINK_NEW_INFO']; ?>
</a></div><br />
<div>
<table width="100%" cellpadding="0" cellspacing="0" >
<tr><td valign="top">
		<form name="frmFriends" action="<?php echo $this->_tpl_vars['action_infors']; ?>
" method="post" >

		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
			  <td height="28" class="tableHeading"><?php echo $this->_tpl_vars['HEADER_INFO_KEY']; ?>
</td>
			  <td class="tableHeading"><?php echo $this->_tpl_vars['HEADER_INFO_TITLE']; ?>
</td>
			  <td class="tableHeading"><div align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</div></td>
			  </tr>
		<?php unset($this->_sections['inforidx']);
$this->_sections['inforidx']['name'] = 'inforidx';
$this->_sections['inforidx']['loop'] = is_array($_loop=$this->_tpl_vars['infors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['inforidx']['show'] = true;
$this->_sections['inforidx']['max'] = $this->_sections['inforidx']['loop'];
$this->_sections['inforidx']['step'] = 1;
$this->_sections['inforidx']['start'] = $this->_sections['inforidx']['step'] > 0 ? 0 : $this->_sections['inforidx']['loop']-1;
if ($this->_sections['inforidx']['show']) {
    $this->_sections['inforidx']['total'] = $this->_sections['inforidx']['loop'];
    if ($this->_sections['inforidx']['total'] == 0)
        $this->_sections['inforidx']['show'] = false;
} else
    $this->_sections['inforidx']['total'] = 0;
if ($this->_sections['inforidx']['show']):

            for ($this->_sections['inforidx']['index'] = $this->_sections['inforidx']['start'], $this->_sections['inforidx']['iteration'] = 1;
                 $this->_sections['inforidx']['iteration'] <= $this->_sections['inforidx']['total'];
                 $this->_sections['inforidx']['index'] += $this->_sections['inforidx']['step'], $this->_sections['inforidx']['iteration']++):
$this->_sections['inforidx']['rownum'] = $this->_sections['inforidx']['iteration'];
$this->_sections['inforidx']['index_prev'] = $this->_sections['inforidx']['index'] - $this->_sections['inforidx']['step'];
$this->_sections['inforidx']['index_next'] = $this->_sections['inforidx']['index'] + $this->_sections['inforidx']['step'];
$this->_sections['inforidx']['first']      = ($this->_sections['inforidx']['iteration'] == 1);
$this->_sections['inforidx']['last']       = ($this->_sections['inforidx']['iteration'] == $this->_sections['inforidx']['total']);
?>	  
			<tr>
			  <td width="30%" height="20"><a href="<?php echo $this->_tpl_vars['infors'][$this->_sections['inforidx']['index']]['info_url']; ?>
" ><?php echo $this->_tpl_vars['infors'][$this->_sections['inforidx']['index']]['info_key']; ?>
</a></td>
			  <td width="48%" ><?php echo $this->_tpl_vars['infors'][$this->_sections['inforidx']['index']]['info_title']; ?>
</td>
			  <td width="22%"><div align="center"><a href="<?php echo $this->_tpl_vars['infors'][$this->_sections['inforidx']['index']]['info_url']; ?>
"><?php echo $this->_tpl_vars['ACTION_EDIT_INFO']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['link_infos']; ?>
&action=delete&info_id=<?php echo $this->_tpl_vars['infors'][$this->_sections['inforidx']['index']]['info_id']; ?>
" onClick="return confirm('<?php echo $this->_tpl_vars['WARNING_DELETE_CONFIRM_MESSAGE']; ?>
');"><?php echo $this->_tpl_vars['ACTION_DELETE_INFO']; ?>
</a></div></td>
		    </tr>
		<?php endfor; endif; ?>
		</table>

	        </form>	

</td>
</tr>
</table>
<?php if (count ( $this->_tpl_vars['infors'] ) > 0): ?>
</div>
<div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
<?php endif; ?>