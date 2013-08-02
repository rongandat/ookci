<?php /* Smarty version 2.6.18, created on 2013-08-01 10:40:40
         compiled from security_questions/list.html */ ?>
<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">	
            <h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h2>	
        </div>
        <div style="z-index: 810;" class="shortcuts-icons">
            <a original-title="<?php echo $this->_tpl_vars['langs']['LINK_NEW_SECURITY_QUESTION']; ?>
" class="shortcut tips" href="<?php echo $this->_tpl_vars['link_security_question_new']; ?>
"><img width="25" height="25" src="includes/img/icons/shortcut/plus.png" alt="icon"></a>
        </div>
    </div>
</div>
<div class="content" style="z-index: 730;">
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

    <table class="dataTables_wrapper simplebox grid740">
        <tr>
            <td valign="top">
                <form name="frmAdmins" action="<?php echo $this->_tpl_vars['action_settings']; ?>
" method="post" >

                    <div class="titleh" style="z-index: 460;">
                        <h3><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h3>
                    </div>

                    <table class="tablesorter" >
                        <thead> 
                            <tr>
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HEADING_SECURITY_QUESTION_NAME']; ?>
</th>
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_SECURITY_QUESTION_STATUS']; ?>
</th>		
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_SECURITY_QUESTION_SORT_ORDER']; ?>
</th>			  			  	  
                                <th><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</td>
                            </tr>
                        </thead>
                        <?php unset($this->_sections['security_questionidx']);
$this->_sections['security_questionidx']['name'] = 'security_questionidx';
$this->_sections['security_questionidx']['loop'] = is_array($_loop=$this->_tpl_vars['security_questions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['security_questionidx']['show'] = true;
$this->_sections['security_questionidx']['max'] = $this->_sections['security_questionidx']['loop'];
$this->_sections['security_questionidx']['step'] = 1;
$this->_sections['security_questionidx']['start'] = $this->_sections['security_questionidx']['step'] > 0 ? 0 : $this->_sections['security_questionidx']['loop']-1;
if ($this->_sections['security_questionidx']['show']) {
    $this->_sections['security_questionidx']['total'] = $this->_sections['security_questionidx']['loop'];
    if ($this->_sections['security_questionidx']['total'] == 0)
        $this->_sections['security_questionidx']['show'] = false;
} else
    $this->_sections['security_questionidx']['total'] = 0;
if ($this->_sections['security_questionidx']['show']):

            for ($this->_sections['security_questionidx']['index'] = $this->_sections['security_questionidx']['start'], $this->_sections['security_questionidx']['iteration'] = 1;
                 $this->_sections['security_questionidx']['iteration'] <= $this->_sections['security_questionidx']['total'];
                 $this->_sections['security_questionidx']['index'] += $this->_sections['security_questionidx']['step'], $this->_sections['security_questionidx']['iteration']++):
$this->_sections['security_questionidx']['rownum'] = $this->_sections['security_questionidx']['iteration'];
$this->_sections['security_questionidx']['index_prev'] = $this->_sections['security_questionidx']['index'] - $this->_sections['security_questionidx']['step'];
$this->_sections['security_questionidx']['index_next'] = $this->_sections['security_questionidx']['index'] + $this->_sections['security_questionidx']['step'];
$this->_sections['security_questionidx']['first']      = ($this->_sections['security_questionidx']['iteration'] == 1);
$this->_sections['security_questionidx']['last']       = ($this->_sections['security_questionidx']['iteration'] == $this->_sections['security_questionidx']['total']);
?>	
                        <?php if (( $this->_sections['security_questionidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
                        <tr height="20">
                            <td width="40%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><strong><?php echo $this->_tpl_vars['security_questions'][$this->_sections['security_questionidx']['index']]['question']; ?>
</strong></td>
                            <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['security_questions'][$this->_sections['security_questionidx']['index']]['status'] == 1): ?> <?php echo $this->_tpl_vars['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['TEXT_INACTIVE']; ?>
 <?php endif; ?></td>			  			  <td width="20%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" align="center"><?php echo $this->_tpl_vars['security_questions'][$this->_sections['security_questionidx']['index']]['sort_order']; ?>
</td>

                            <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center" style="padding-right:10px"><a href="<?php echo $this->_tpl_vars['link_security_question_edit']; ?>
&action=edit&security_questionID=<?php echo $this->_tpl_vars['security_questions'][$this->_sections['security_questionidx']['index']]['security_questions_id']; ?>
" class="linkButtonEdit" title="Edit"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['security_questions'][$this->_sections['security_questionidx']['index']]['security_questions_id']; ?>
);"  class="linkButtonDelete" title="Delete"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                    </table>

                </form>	
            </td>
        </tr>
    </table>
    <?php if (count ( $this->_tpl_vars['emailtemplates'] ) > 0): ?>
    <div class="pages"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
    <?php endif; ?>
</div>