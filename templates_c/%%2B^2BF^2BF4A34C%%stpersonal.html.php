<?php /* Smarty version 2.6.18, created on 2013-07-19 05:27:45
         compiled from account/settings/stpersonal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'account/settings/stpersonal.html', 40, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="view_info" />
    <h3>Your Current Secure Question Information</h3>
    <table class="form">
        <tr>
            <td class="form_label" >Security Question:</td>

            <td class="form_field">
                <?php if (! empty ( $this->_tpl_vars['view_security_question'] )): ?><?php echo $this->_tpl_vars['view_security_question']; ?>
<?php else: ?>****<?php endif; ?>
            </td> 
        </tr>	
        <tr>
            <td class="form_label">Answer:</td>
            <td class="form_field">
                <?php if (! empty ( $this->_tpl_vars['view_security_answer'] )): ?><?php echo $this->_tpl_vars['view_security_answer']; ?>
<?php else: ?>****<?php endif; ?>
            </td>
        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>Master Key</td>
            <td class="form_field">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></td>
        </tr>	
        <tr>
            <td></td>
            <td class="contenButtons">

                <input class="button" value="Get Information" type="submit" name="buttonUpdate"></td>
        </tr>
    </table>

</form>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <h3>Change Secure Question Information</h3>
    <p>Please input your secure question. The information is very important in case you lost your access information or Secure PIN</p>
    <table class="form">
        <tr>
            <td class="form_label" ><i>*</i>Security Question:</td>
            <td class="form_field"><select name="security_question" class="inputtext" onchange="checkSecurityQuestion(this.value);">
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['security_questions_array'],'selected' => $this->_tpl_vars['post_security_question']), $this);?>
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
                <input  name="security_answer" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['post_security_answer']; ?>
"  class="inputtext" size="20"  /></td>
        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>Master Key</td>
            <td class="form_field">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></td>
        </tr>
        <tr>
            <td></td>
            <td class="contenButtons">

                <input class="button" value="Updated" type="submit" name="buttonUpdate"></td>
        </tr>
    </table>

    <?php echo '
    <script type="text/javascript">
        function checkSecurityQuestion(security_question_id) {
            if (security_question_id==-1) {
                $("#content_custom_question").show();
            } else {
                $("#content_custom_question").hide();	
            }
        }
    </script>
    '; ?>

</form>