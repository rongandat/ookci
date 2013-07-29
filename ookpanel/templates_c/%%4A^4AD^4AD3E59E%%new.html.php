<?php /* Smarty version 2.6.18, created on 2013-07-27 05:49:53
         compiled from admins/new.html */ ?>
<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">	<h2><?php echo $this->_tpl_vars['HEADING_NEW_ADMIN_ACCOUNT']; ?>
</h2>	
        </div>
        <div class="clear" style="z-index: 740;"></div>
    </div>
    <div class="content" style="z-index: 730;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="<?php echo $this->_tpl_vars['action_link']; ?>
" method="post" name="frmAdmin" >

            <form action="<?php echo $this->_tpl_vars['action_link']; ?>
" method="post" name="frmAdmin" >
                <table class="form">

                    <tr>
                        <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_USERNAME']; ?>
*</td>
                        <td><input name="admin_username" type="text" id="admin_username" value="<?php echo $this->_tpl_vars['admin_username']; ?>
"></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_NAME']; ?>
</td>
                        <td><input name="admin_contactname" type="text" id="admin_contactname" value="<?php echo $this->_tpl_vars['admin_contactname']; ?>
" size="30"></td>
                    </tr>

                    <tr>
                        <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_EMAIL']; ?>
*</td>
                        <td><input name="admin_email" type="text" id="admin_email" value="<?php echo $this->_tpl_vars['admin_email']; ?>
"  size="30"></td>
                    </tr>

                    <tr>
                        <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_PASSWORD']; ?>
*</td>
                        <td><input name="admin_password" type="text" id="admin_password" value="<?php echo $this->_tpl_vars['admin_password']; ?>
" size="30"></td>
                    </tr>

                    <tr>
                        <td><?php echo $this->_tpl_vars['LABEL_ADMIN_ACCOUNT_CONFIRM_PASSWORD']; ?>
*</td>
                        <td><input name="confirm_password" type="text" id="confirm_password" value="<?php echo $this->_tpl_vars['confirm_password']; ?>
" size="30"></td>
                    </tr>


                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['BUTTON_SUBMIT']; ?>
" class="st-button">
                            <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="window.location	=	'<?php echo $this->_tpl_vars['back_link']; ?>
';" class="st-clear">
                        </td>
                    </tr>
                </table>
            </form>
    </div>
</div>
