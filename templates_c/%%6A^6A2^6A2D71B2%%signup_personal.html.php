<?php /* Smarty version 2.6.18, created on 2013-07-22 12:21:07
         compiled from home/signup_personal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/signup_personal.html', 1, false),array('function', 'html_options', 'home/signup_personal.html', 36, false),)), $this); ?>
<form name="frmSignup" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP_PERSONAL'), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <div class="simple-form">
        <h1>Registration: Part 2 of 2</h1>
        <p>Your account is not yet active. Please complete this form to activate your account.</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <div class="clear"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>Personal Information</h3>
        <table class="form">
         
            <tr>
                <td class="form_label"><i>*</i>Account Name:</td>
                <td class="form_field">
                    <input  name="account_name" type="text"  value="<?php echo $this->_tpl_vars['account_name']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>	
            <tr>
                <td class="form_label">Company Name:</td>
                <td class="form_field">
                    <input  name="company_name" type="text"  value="<?php echo $this->_tpl_vars['company_name']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		  
            <tr>
                <td class="form_label"><i>*</i>Address:</td>
                <td class="form_field">
                    <input  name="address" type="text"  value="<?php echo $this->_tpl_vars['address']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>	
            <tr>
                <td class="form_label"><i>*</i>City:</td>
                <td class="form_field">
                    <input  name="city" type="text"  value="<?php echo $this->_tpl_vars['city']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		   
            <tr> <td class="form_label">
                    <i>*</i>Country:</td>	  
                <td class="form_field"><select name="country_id"  class="inputselect"  onchange="getStates(this.value);">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries_array'],'selected' => $this->_tpl_vars['country_id']), $this);?>
</select>
                    
                </td></tr>	
            <tr> <td class="form_label">
                    <i>*</i>State/Region:</td>	  
                <td class="form_field"><select name="state"  id="state" class="state" >
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['zones_array'],'selected' => $this->_tpl_vars['state']), $this);?>
</select>
                    
                </td></tr>	  
            <tr>
                <td class="form_label"><i>*</i>Zip/Post Code:</td>
                <td class="form_field">
                    <input  name="postcode" type="text"  value="<?php echo $this->_tpl_vars['postcode']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		  
            <tr>
                <td class="form_label"><i>*</i>Date of Birth:</td>
                <td  class="form_field"><select name="dobMonth" class="inputselect">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['months_array'],'selected' => $this->_tpl_vars['dobMonth']), $this);?>
</select>&nbsp;<select name="dobDay" class="inputselect">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['days_array'],'selected' => $this->_tpl_vars['dobDay']), $this);?>
</select>&nbsp;&nbsp;
                    
                    <select name="dobYear" class="inputselect">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years_array'],'selected' => $this->_tpl_vars['dobYear']), $this);?>
</select>&nbsp;(mm/dd/yy)
                    
                </td></tr>	 	  		
            <tr>
                <td class="form_label"><i>*</i>Phone:</td>
                <td class="form_field">
                    <input  name="phone" type="text"  value="<?php echo $this->_tpl_vars['phone']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		  
            <tr>
                <td class="form_label">Mobile:</td>
                <td class="form_field">
                    <input  name="mobile" type="text"  value="<?php echo $this->_tpl_vars['mobile']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		  
            <tr >
                <td></td>
                <td ><input  type="submit" name="buttonSubmit" class="button"  value="Submit" />&nbsp;<input  type="button" name="buttonCancel" onclick="window.location='<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT'), $this);?>
';"  class="button"  value="Cancel"></td>
            </tr>
        </table>
    </div>
    