<?php /* Smarty version 2.6.18, created on 2010-06-09 01:25:25
         compiled from /home/eglobal/public_html/gwpanel/templates//modules/validate_error.tpl */ ?>
<?php if (count ( $this->_tpl_vars['validerrors'] ) > 0): ?>
<div id="validErrorPanel" class="validErrors" >
<ul>
<?php unset($this->_sections['error_index']);
$this->_sections['error_index']['name'] = 'error_index';
$this->_sections['error_index']['loop'] = is_array($_loop=$this->_tpl_vars['validerrors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['error_index']['show'] = true;
$this->_sections['error_index']['max'] = $this->_sections['error_index']['loop'];
$this->_sections['error_index']['step'] = 1;
$this->_sections['error_index']['start'] = $this->_sections['error_index']['step'] > 0 ? 0 : $this->_sections['error_index']['loop']-1;
if ($this->_sections['error_index']['show']) {
    $this->_sections['error_index']['total'] = $this->_sections['error_index']['loop'];
    if ($this->_sections['error_index']['total'] == 0)
        $this->_sections['error_index']['show'] = false;
} else
    $this->_sections['error_index']['total'] = 0;
if ($this->_sections['error_index']['show']):

            for ($this->_sections['error_index']['index'] = $this->_sections['error_index']['start'], $this->_sections['error_index']['iteration'] = 1;
                 $this->_sections['error_index']['iteration'] <= $this->_sections['error_index']['total'];
                 $this->_sections['error_index']['index'] += $this->_sections['error_index']['step'], $this->_sections['error_index']['iteration']++):
$this->_sections['error_index']['rownum'] = $this->_sections['error_index']['iteration'];
$this->_sections['error_index']['index_prev'] = $this->_sections['error_index']['index'] - $this->_sections['error_index']['step'];
$this->_sections['error_index']['index_next'] = $this->_sections['error_index']['index'] + $this->_sections['error_index']['step'];
$this->_sections['error_index']['first']      = ($this->_sections['error_index']['iteration'] == 1);
$this->_sections['error_index']['last']       = ($this->_sections['error_index']['iteration'] == $this->_sections['error_index']['total']);
?>
	<li><strong><?php echo $this->_tpl_vars['validerrors'][$this->_sections['error_index']['index']]['field']; ?>
:</strong> <?php echo $this->_tpl_vars['validerrors'][$this->_sections['error_index']['index']]['message']; ?>
</li>
<?php endfor; endif; ?>
</ul>
</div>
<?php endif; ?>