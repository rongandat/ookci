<?php /* Smarty version 2.6.18, created on 2013-08-01 10:40:29
         compiled from langs/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_image_source', 'langs/list.html', 41, false),)), $this); ?>
<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">	
            <h2><?php echo $this->_tpl_vars['langs']['HEADING_TITLE']; ?>
</h2>	
        </div>
        <div class="shortcuts-icons" style="z-index: 480;">
            <a href="<?php echo $this->_tpl_vars['link_new_language']; ?>
" class="shortcut tips" original-title="<?php echo $this->_tpl_vars['langs']['LINK_NEW_LANGUAGE']; ?>
"><img width="25" height="25" alt="icon" src="includes/img/icons/shortcut/plus.png"></a>
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
                                <th><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_NAME']; ?>
</th>
                                <th><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_CODE']; ?>
</th>
                                <th><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_IMAGE']; ?>
</th>			  
                                <th><?php echo $this->_tpl_vars['langs']['HEADER_LANGUAGE_STATUS']; ?>
</th>
                                <th><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</th>
                            </tr>
                        </thead>
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
                        <?php if (( $this->_sections['languageidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>		  
                        <tr>
                            <td  height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_name']; ?>
</td>
                            <td  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_code']; ?>
</td>
                            <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><img src="<?php echo smarty_function_dev_get_image_source(array('name' => $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_image']), $this);?>
"  alt="<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_name']; ?>
"/></td>
                            <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php if ($this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_status'] == 1): ?> <?php echo $this->_tpl_vars['langs']['TEXT_ACTIVE']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['langs']['TEXT_INACTIVE']; ?>
 <?php endif; ?> </td>			  
                            <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center"><a href="<?php echo $this->_tpl_vars['link_language_edit']; ?>
&lID=<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_id']; ?>
" class="linkButtonEdit" title="Edit"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['languages'][$this->_sections['languageidx']['index']]['language_id']; ?>
);"  class="linkButtonDelete" title="Delete"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                    </table>

                </form>	
            </td>
        </tr>
    </table>
    <div class="pages"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
</div>