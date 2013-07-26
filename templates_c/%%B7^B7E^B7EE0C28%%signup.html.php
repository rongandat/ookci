<?php /* Smarty version 2.6.18, created on 2013-07-26 05:57:02
         compiled from home/signup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/signup.html', 1, false),array('function', 'html_options', 'home/signup.html', 44, false),)), $this); ?>
<form name="frmSignup" method="post" action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SIGNUP'), $this);?>
"  >
    <input type="hidden" name="action" value="process"  />
    <div class="simple-form">
        <h1><?php echo $this->_tpl_vars['langs']['signup']['SIGNUP_PAGE_HEADING']; ?>
</h1>
        <p>Thank you for deciding to open a 
            OOKCASH account. Please follow directions carefully to avoid mistakes and delays during the registration process.</p>
        <p>Fields marked with asterisk (<i>*</i>) are required.</p>
        <div class="line"></div>
        <div class="clear"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <table class="form">

            <tr>
                <td class="form_label"><i>*</i>First Name:</td>
                <td class="form_field">
                    <input  name="firstname" type="text"  value="<?php echo $this->_tpl_vars['firstname']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>	
            <tr>
                <td class="form_label"><i>*</i>Last Name:</td>
                <td class="form_field">
                    <input  name="lastname" type="text"  value="<?php echo $this->_tpl_vars['lastname']; ?>
"  class="inputtext" size="20"  /></td>
            </tr>		  
            <tr>
                <td class="form_label"><i>*</i>E-mail:</td>
                <td  class="form_field">
                    <input  name="email" type="text" id="email"  value="<?php echo $this->_tpl_vars['email']; ?>
"   class="inputtext" size="20" />
                </td>
            </tr>	  
            <tr>
                <td class="form_label"><i>*</i>Re-enter e-mail:</td>
                <td  class="form_field">
                    <input  name="confirm_email" type="text" id="confirm_email"  value="<?php echo $this->_tpl_vars['confirm_email']; ?>
"   class="inputtext" size="20" />
                </td>
            </tr>	  

        </table>	
        <h3>Security Information </h3>
        <p>Password, login PIN and master key will be automatically generated for your account</p>

        <table class="form">
            <tr>
                <td class="form_label"><i>*</i>Security Question:</td>
                <td class="form_field"><select name="security_question" class="inputselect" onchange="checkSecurityQuestion(this.value);">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['security_questions_array'],'selected' => $this->_tpl_vars['security_question']), $this);?>
</select></td> </tr>	
            <tr id="content_custom_question" <?php if ($this->_tpl_vars['security_question'] != -1): ?> style="display: none;" <?php endif; ?>>
                <td class="form_label"><i>*</i>or write your own:</td>
                <td class="form_field">
                    <input  name="custom_question" type="text"  value="<?php echo $this->_tpl_vars['custom_question']; ?>
"  class="inputtext" size="20"  /></td> 
            </tr>	
            <tr>
                <td class="form_label"><i>*</i>Answer:</td>
                <td class="form_field">
                    <input  name="security_answer" type="text"  value="<?php echo $this->_tpl_vars['security_answer']; ?>
"  class="inputtext" size="20"  /></td> </tr>		  
            <tr>
                <td class="form_label"><i>*</i>Personal welcome message:</td>
                <td class="form_field">
                    <textarea  name="welcome_message" rows="3" cols="50" class="inputtextarea"><?php echo $this->_tpl_vars['welcome_message']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td >
                    <strong>Enter the code (turing number) shown on the image</strong>	
                    <br />Cannot read the numbers? Click on it to get a new one
                </td>
                <td>
                    <a href="javascript: refreshSecureImage();"><img src="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SECUREIMAGE'), $this);?>
"   border="0" id="secure_image" /></a><br />
                    <input   name="security_code"   class="inputtext" size="20"/>
                    <a  href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_CONTACT_US'), $this);?>
" class="link">Cannot see Turing number at all?</a>

                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    If you agree with <a href="http://docs.ookcash.com/tos/" target="_blank">Terms of Our Service</a> click "Agree" to continue the registration.
                </td>

            </tr>
            <tr>
                <td >

                </td>
                <td>
                    <div class="buttons">
                        <input  type="submit" name="buttonAgree" class="button"  value="Agree" /><input  type="button" name="buttonDisagree" onclick="window.location='<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_DEFAULT'), $this);?>
';"  class="button"  value="Disagree">
                    </div>
                </td>
            </tr>
        </table>

    </div>

</form>