<?php /* Smarty version 2.6.18, created on 2010-02-28 08:55:06
         compiled from /home/gwebcash/public_html/gwpanel/templates//modules/feedback_messages.tpl */ ?>
<?php if (count ( $this->_tpl_vars['feedbackmsgs'] ) > 0): ?>
<br />
<div id="feedbackMessagesPanel" class="success" >
<ul>
<?php unset($this->_sections['fb_index']);
$this->_sections['fb_index']['name'] = 'fb_index';
$this->_sections['fb_index']['loop'] = is_array($_loop=$this->_tpl_vars['feedbackmsgs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fb_index']['show'] = true;
$this->_sections['fb_index']['max'] = $this->_sections['fb_index']['loop'];
$this->_sections['fb_index']['step'] = 1;
$this->_sections['fb_index']['start'] = $this->_sections['fb_index']['step'] > 0 ? 0 : $this->_sections['fb_index']['loop']-1;
if ($this->_sections['fb_index']['show']) {
    $this->_sections['fb_index']['total'] = $this->_sections['fb_index']['loop'];
    if ($this->_sections['fb_index']['total'] == 0)
        $this->_sections['fb_index']['show'] = false;
} else
    $this->_sections['fb_index']['total'] = 0;
if ($this->_sections['fb_index']['show']):

            for ($this->_sections['fb_index']['index'] = $this->_sections['fb_index']['start'], $this->_sections['fb_index']['iteration'] = 1;
                 $this->_sections['fb_index']['iteration'] <= $this->_sections['fb_index']['total'];
                 $this->_sections['fb_index']['index'] += $this->_sections['fb_index']['step'], $this->_sections['fb_index']['iteration']++):
$this->_sections['fb_index']['rownum'] = $this->_sections['fb_index']['iteration'];
$this->_sections['fb_index']['index_prev'] = $this->_sections['fb_index']['index'] - $this->_sections['fb_index']['step'];
$this->_sections['fb_index']['index_next'] = $this->_sections['fb_index']['index'] + $this->_sections['fb_index']['step'];
$this->_sections['fb_index']['first']      = ($this->_sections['fb_index']['iteration'] == 1);
$this->_sections['fb_index']['last']       = ($this->_sections['fb_index']['iteration'] == $this->_sections['fb_index']['total']);
?>
	<li><?php echo $this->_tpl_vars['feedbackmsgs'][$this->_sections['fb_index']['index']]; ?>
</li>
<?php endfor; endif; ?>
</ul>
</div>
<?php endif; ?>