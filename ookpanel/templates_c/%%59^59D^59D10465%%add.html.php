<?php /* Smarty version 2.6.18, created on 2013-07-22 13:23:32
         compiled from users/add.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_admin_page_link', 'users/add.html', 2, false),array('function', 'html_options', 'users/add.html', 12, false),)), $this); ?>
<h4>User Details: #<?php echo $this->_tpl_vars['user_data']['account_number']; ?>
</h4>
<form name="frmEdit" action="<?php echo smarty_function_dev_get_admin_page_link(array('page' => 'PAGE_USERS'), $this);?>
" method="post" >
<input type="hidden" name="action" value="add"  />

<table width="100%" cellpadding="2" cellspacing="2"  border="0">
	<tr><td width="20%">First Name</td><td width="93%"><input name="firstname" value="" type="input"  /></td></tr>
	<tr><td>Last Name</td><td><input name="lastname" value="" type="input"  /></td></tr>
 	<tr><td>E-mail</td><td><input name="email" value="" type="input"  /></td></tr>
	<tr><td>Mobile</td><td><input name="mobile" value="" type="input"  /></td></tr>
	<tr><td>Phone</td><td><input name="phone" value="" type="input"  /></td></tr>
        <tr><td>Security Question</td><td><select name="security_question" class="inputselect" onchange="checkSecurityQuestion(this.value);">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['security_questions_array']), $this);?>
</select></td></tr>
        
        <tr><td>Answer</td><td><input name="security_answer" value="" type="input"  /></td></tr>
        <tr><td>Acount name</td><td><input name="account_name" value="" type="input"  /></td></tr>
        <tr><td>Distributors</td><td><select name="distributors" class="inputselect">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['whosale']), $this);?>
</select></td></tr>
        <tr><td colspan="2">Personal welcome message<br/><textarea name="welcome_message" rows="3"  cols="80"></textarea></td></tr>

        <tr><td colspan="2">Additional Information<br /><textarea name="additional_information" rows="3"  cols="80"></textarea></td></tr>
 
	<tr><td colspan="2"><input class="button" type="submit" value="Save"  /></td></tr>
</table>
</form>
<br>
<table width="100%" cellpadding="2" cellspacing="2"  border="0">
<tr><td><a href="javascript: closeUserDetailsContent();" class="linkButton">Close</a></td></tr>
</table>