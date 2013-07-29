<?php /* Smarty version 2.6.18, created on 2013-07-29 09:27:18
         compiled from users/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'users/edit.html', 2, false),)), $this); ?>
<h4>User Details: #<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</h4>
<form name="frmEdit" action="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_USERS'), $this);?>
" method="post" >
    <input type="hidden" name="action" value="save"  />
    <input type="hidden" value="<?php echo $this->_tpl_vars['user_data']['user_id']; ?>
" name="user_id" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
" name="account_number" />

    <table class="form">
        <tr><td width="7%">First Name</td><td width="93%"><input size="50" name="firstname" value="<?php echo $this->_tpl_vars['user_data']['firstname']; ?>
" type="input"  /></td></tr>
        <tr><td>Last Name</td><td><input name="lastname" size="50" value="<?php echo $this->_tpl_vars['user_data']['lastname']; ?>
" type="input"  /></td></tr>
        <tr><td>E-mail</td><td><input name="email" size="50" value="<?php echo $this->_tpl_vars['user_data']['email']; ?>
" type="input"  /></td></tr>
        <tr><td>Mobile</td><td><input name="mobile" size="50" value="<?php echo $this->_tpl_vars['user_data']['mobile']; ?>
" type="input"  /></td></tr>
        <tr><td>Phone</td><td><input name="phone" size="50" value="<?php echo $this->_tpl_vars['user_data']['phone']; ?>
" type="input"  /></td></tr>
        <tr><td colspan="2">Additional Information<br /><textarea name="additional_information" rows="3"  cols="80"><?php echo $this->_tpl_vars['user_data']['additional_information']; ?>
</textarea></td></tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="Submit" value="Save" class="st-button">
                <input type="button" name="btnCancel" value="<?php echo $this->_tpl_vars['BUTTON_CANCEL']; ?>
" onClick="closeUserDetailsContent();" class="st-clear">
            </td>
        </tr>
    </table>
</form>