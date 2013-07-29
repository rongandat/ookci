<?php /* Smarty version 2.6.18, created on 2013-07-27 06:16:29
         compiled from settings/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'settings/list.html', 9, false),)), $this); ?>
<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">	
            <h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
 [<?php echo $this->_tpl_vars['cfgroupinfo']['configuration_group_title']; ?>
]</h2>	
        </div>
        <div class="select-box" style="z-index: 750;">
            <form name="frmcfgGroup" action="<?php echo $this->_tpl_vars['link_settings']; ?>
" method="post" >
                <select name="cfgID" onchange="this.form.submit();">
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cfgroups_options'],'selected' => $this->_tpl_vars['configuration_group_id']), $this);?>

                </select>
            </form>
        </div>
        <div class="clear" style="z-index: 740;"></div>
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
    <div  id="ajaxContent" style="display:none"></div>
    <table class="dataTables_wrapper simplebox grid740">
        <tr>
            <td valign="top">
                <form name="frmAdmins" action="<?php echo $this->_tpl_vars['action_settings']; ?>
" method="post" >

                    <div class="titleh" style="z-index: 460;">
                        <h3><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
 [<?php echo $this->_tpl_vars['cfgroupinfo']['configuration_group_title']; ?>
]</h3>
                    </div>

                    <table class="tablesorter" >
                        <thead> 
                            <tr>
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HEADING_CONFIG_TITLE']; ?>
</th>
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_CONFIG_DESC']; ?>
</th>			  
                                <th><?php echo $this->_tpl_vars['langs']['TABLE_HREADING_CONFIG_VALUE']; ?>
</th>
                                <th align="center"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</th>
                            </tr>
                        </thead>
                        <?php unset($this->_sections['settingidx']);
$this->_sections['settingidx']['name'] = 'settingidx';
$this->_sections['settingidx']['loop'] = is_array($_loop=$this->_tpl_vars['settings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['settingidx']['show'] = true;
$this->_sections['settingidx']['max'] = $this->_sections['settingidx']['loop'];
$this->_sections['settingidx']['step'] = 1;
$this->_sections['settingidx']['start'] = $this->_sections['settingidx']['step'] > 0 ? 0 : $this->_sections['settingidx']['loop']-1;
if ($this->_sections['settingidx']['show']) {
    $this->_sections['settingidx']['total'] = $this->_sections['settingidx']['loop'];
    if ($this->_sections['settingidx']['total'] == 0)
        $this->_sections['settingidx']['show'] = false;
} else
    $this->_sections['settingidx']['total'] = 0;
if ($this->_sections['settingidx']['show']):

            for ($this->_sections['settingidx']['index'] = $this->_sections['settingidx']['start'], $this->_sections['settingidx']['iteration'] = 1;
                 $this->_sections['settingidx']['iteration'] <= $this->_sections['settingidx']['total'];
                 $this->_sections['settingidx']['index'] += $this->_sections['settingidx']['step'], $this->_sections['settingidx']['iteration']++):
$this->_sections['settingidx']['rownum'] = $this->_sections['settingidx']['iteration'];
$this->_sections['settingidx']['index_prev'] = $this->_sections['settingidx']['index'] - $this->_sections['settingidx']['step'];
$this->_sections['settingidx']['index_next'] = $this->_sections['settingidx']['index'] + $this->_sections['settingidx']['step'];
$this->_sections['settingidx']['first']      = ($this->_sections['settingidx']['iteration'] == 1);
$this->_sections['settingidx']['last']       = ($this->_sections['settingidx']['iteration'] == $this->_sections['settingidx']['total']);
?>	
                        <?php if (( $this->_sections['settingidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
                        <tr>
                            <td width="25%" height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['settings'][$this->_sections['settingidx']['index']]['configuration_title']; ?>
</td>
                            <td width="35%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['settings'][$this->_sections['settingidx']['index']]['configuration_description']; ?>
</td>			  
                            <td width="25%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['settings'][$this->_sections['settingidx']['index']]['configuration_value']; ?>
</td>
                            <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="right" style="padding-right:10px"><a href="javascript:ajaxGetEditForm(<?php echo $this->_tpl_vars['settings'][$this->_sections['settingidx']['index']]['configuration_id']; ?>
)"  class="linkButton"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                    </table>

                </form>	
            </td>
        </tr>
    </table>
    <?php if (count ( $this->_tpl_vars['settings'] ) > 0): ?>
    <br />
    <div align="center"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
    <?php endif; ?>
</div>