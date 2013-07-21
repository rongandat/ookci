<?php /* Smarty version 2.6.18, created on 2013-07-18 19:45:24
         compiled from account/edit_account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/edit_account.html', 1, false),array('function', 'html_options', 'account/edit_account.html', 70, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_ACCOUNT_PERSONAL','ssl' => true), $this);?>
"  >
    <input class="inputtext" type="hidden" name="action" value="update_account"  />
    <div class="simple-form">
        <h1>Account Personal Information</h1>
        <p>The following section can only be viewed after you enter your master key.</p>
        <p>Fields 
            marked with asterisk (<i>*</i>) are 
            required.</p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>Personal Information</h3>
        <table class="form">
            <tr>
                <td>
                    <i>*</i>Account Name:</td>
                <td>
                    <input class="inputtext" type="text" name="account_name" value="<?php echo $this->_tpl_vars['account_name']; ?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>First Name:</td>
                <td>
                    <input class="inputtext" type="text" name="firstname" value="<?php echo $this->_tpl_vars['firstname']; ?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>Last Name:</td>
                <td>
                    <input class="inputtext" type="text" name="lastname" value="<?php echo $this->_tpl_vars['lastname']; ?>
" size="20"></td>
            </tr>      
            <tr>
                <td>
                    Company Name:</td>
                <td>
                    <input class="inputtext" type="text" name="company" value="<?php echo $this->_tpl_vars['company']; ?>
" size="50"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>Phone:</td>
                <td>
                    <input class="inputtext" type="text" name="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    Mobile:</td>
                <td>
                    <input class="inputtext" type="text" name="mobile"  value="<?php echo $this->_tpl_vars['mobile']; ?>
" size="20"></td>
            </tr>          
        </table>

        <h3>Contact Information</h3>
        <table class="form">
            <tr>
                <td>
                    <i>*</i>Address:</td>
                <td>
                    <input class="inputtext" type="text" name="address" value="<?php echo $this->_tpl_vars['address']; ?>
" size="50"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>City:</td>
                <td>
                    <input class="inputtext" type="text" name="city" value="<?php echo $this->_tpl_vars['city']; ?>
" size="50"></td>
            </tr>    
            <tr>
                <td>
                    <i>*</i>Country:</td>
                <td>
                    <select name="country"  class="inputtext"  onchange="getStates(this.value);">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries_array'],'selected' => $this->_tpl_vars['country']), $this);?>
</select></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>State:</td>
                <td><select name="state"  id="state" class="state inputtext" >
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['zones_array'],'selected' => $this->_tpl_vars['state']), $this);?>
</select></td>
            </tr>      
            <tr>
                <td>
                    <i>*</i>Zip/Postal Code:</td>
                <td>
                    <input class="inputtext" type="text" name="postcode" value="<?php echo $this->_tpl_vars['postcode']; ?>
" size="20"></td>
            </tr>    
        </table>

        <h3>Additional Information</h3>
        <table class="form">
            <tr>
                <td>
                    Additional Information:</td>
                <td>
                    <textarea  name="additional_information" value="<?php echo $this->_tpl_vars['additional_information']; ?>
" cols="40" rows="2"><?php echo $this->_tpl_vars['additional_information']; ?>
</textarea></td>
            </tr> 
            <tr>
                <td   height="32">
                    <i>*</i>Master Key:</td>
                <td width="442"  height="32">
                    <input class="inputtext" type="password" name="master_key" size="5" maxlength="3"></td>
            </tr>
        </table>    


        <div class="buttons">
            <input class="button" value="Apply Changes" type="submit" name="buttonUpdate">
        </div>
    </div>

</form>