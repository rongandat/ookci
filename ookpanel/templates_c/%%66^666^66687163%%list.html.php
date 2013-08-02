<?php /* Smarty version 2.6.18, created on 2013-08-01 10:40:00
         compiled from admins/list.html */ ?>
<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">
            <h2><?php echo $this->_tpl_vars['HEADING_LIST_ADMIN_ACCOUNTS']; ?>
</h2>
            <p>Awesome Jquery Table and Chart plugin</p></div>

        <div class="shortcuts-icons" style="z-index: 750;">
            <a href="<?php echo $this->_tpl_vars['link_new_admin']; ?>
" class="shortcut tips" original-title="<?php echo $this->_tpl_vars['LINK_NEW_ADMIN']; ?>
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
    <div class="dataTables_wrapper simplebox grid740" style="z-index: 500;">

        <div class="titleh" style="z-index: 460;">
            <h3><?php echo $this->_tpl_vars['HEADING_LIST_ADMIN_ACCOUNTS']; ?>
</h3>
            <div class="shortcuts-icons" style="z-index: 480;">
                <a href="<?php echo $this->_tpl_vars['link_new_admin']; ?>
" class="shortcut tips" original-title="<?php echo $this->_tpl_vars['LINK_NEW_ADMIN']; ?>
"><img width="25" height="25" alt="icon" src="includes/img/icons/shortcut/plus.png"></a>
            </div>
        </div>


        <table class="tablesorter" id="myTable"> 
            <thead> 
                <tr> 
                    <th class="header"><?php echo $this->_tpl_vars['HEADER_ADMIN_USERNAME']; ?>
</th> 
                    <th class="header"><?php echo $this->_tpl_vars['HEADER_ADMIN_NAME']; ?>
</th> 
                    <th class="header"><?php echo $this->_tpl_vars['HEADER_ADMIN_EMAIL']; ?>
</th>
                    <th class="header"><?php echo $this->_tpl_vars['TEXT_ACTION']; ?>
</th> 
                </tr> 
            </thead> 

            <tbody> 
                <?php unset($this->_sections['adminidx']);
$this->_sections['adminidx']['name'] = 'adminidx';
$this->_sections['adminidx']['loop'] = is_array($_loop=$this->_tpl_vars['admins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['adminidx']['show'] = true;
$this->_sections['adminidx']['max'] = $this->_sections['adminidx']['loop'];
$this->_sections['adminidx']['step'] = 1;
$this->_sections['adminidx']['start'] = $this->_sections['adminidx']['step'] > 0 ? 0 : $this->_sections['adminidx']['loop']-1;
if ($this->_sections['adminidx']['show']) {
    $this->_sections['adminidx']['total'] = $this->_sections['adminidx']['loop'];
    if ($this->_sections['adminidx']['total'] == 0)
        $this->_sections['adminidx']['show'] = false;
} else
    $this->_sections['adminidx']['total'] = 0;
if ($this->_sections['adminidx']['show']):

            for ($this->_sections['adminidx']['index'] = $this->_sections['adminidx']['start'], $this->_sections['adminidx']['iteration'] = 1;
                 $this->_sections['adminidx']['iteration'] <= $this->_sections['adminidx']['total'];
                 $this->_sections['adminidx']['index'] += $this->_sections['adminidx']['step'], $this->_sections['adminidx']['iteration']++):
$this->_sections['adminidx']['rownum'] = $this->_sections['adminidx']['iteration'];
$this->_sections['adminidx']['index_prev'] = $this->_sections['adminidx']['index'] - $this->_sections['adminidx']['step'];
$this->_sections['adminidx']['index_next'] = $this->_sections['adminidx']['index'] + $this->_sections['adminidx']['step'];
$this->_sections['adminidx']['first']      = ($this->_sections['adminidx']['iteration'] == 1);
$this->_sections['adminidx']['last']       = ($this->_sections['adminidx']['iteration'] == $this->_sections['adminidx']['total']);
?>	
                <tr>
                    <td width="22%" height="20"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><a href="<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_url']; ?>
" ><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_username']; ?>
</a></td>
                    <td width="26%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_contactname']; ?>
</td>
                    <td width="35%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_email']; ?>
</td>
                    <td width="17%"  class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"  align="center">
                        <a href="<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_url']; ?>
" class="linkButtonEdit" title="Edit"><?php echo $this->_tpl_vars['ACTION_EDIT']; ?>
</a>&nbsp;<a href="javascript:getDeleteConfirmForm(<?php echo $this->_tpl_vars['admins'][$this->_sections['adminidx']['index']]['admin_id']; ?>
);"  class="linkButtonDelete" title="Delete"><?php echo $this->_tpl_vars['ACTION_DELETE']; ?>
</a></td>
                </tr>
                <?php endfor; endif; ?>


            </tbody> 
        </table>
        <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
            <?php if (count ( $this->_tpl_vars['admins'] ) > 0): ?>
            <div class="pages"><?php echo $this->_tpl_vars['TEXT_PAGES']; ?>
<?php echo $this->_tpl_vars['page_links']; ?>
</div>
            <?php endif; ?>
        </div>

    </div>
</div>

