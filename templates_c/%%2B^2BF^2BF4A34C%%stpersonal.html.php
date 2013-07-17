<?php /* Smarty version 2.6.18, created on 2013-07-15 09:57:47
         compiled from account/settings/stpersonal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'account/settings/stpersonal.html', 73, false),)), $this); ?>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="view_info" />
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Your Current Secure Question Information</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">

        <tr>
            <td colspan="2"><font size="2" face="Tahoma">    
                <br>
                </font></td>
        </tr>
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma">Security Question:</font></td>
            
            <td class="form_field"><font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_security_question'] )): ?><?php echo $this->_tpl_vars['view_security_question']; ?>
<?php else: ?>****<?php endif; ?>
                </font></td> 
        </tr>	
        <tr>
            <td class="form_label"><font size="2" face="Tahoma">Answer:</font></td>
            <td class="form_field"><font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_security_answer'] )): ?><?php echo $this->_tpl_vars['view_security_answer']; ?>
<?php else: ?>****<?php endif; ?>
                </font></td>
        </tr>		  

    </table>

    <font size="2" face="Tahoma">    
    <br>
    </font>
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></font></td>
        </tr>		  

    </table>

    <table border="0" cellSpacing="2" cellPadding="2" width="100%">
        <tr>
            <td class="contenButtons" align="middle">
                <font face="Tahoma">
                <input class="button" value="Get Information" type="submit" name="buttonUpdate"></font></td>
        </tr>
    </table>
</form>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Change Secure Question Information</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
        <tr>
            <td colspan="2" valign="top" >
                <font size="2" face="Tahoma">
                Please input your secure question. The information is very important in case you lost your access information or Secure PIN
                </font>

            </td>
        </tr>  
        <tr>
            <td colspan="2"><font size="2" face="Tahoma">    
                <br>
                </font></td>
        </tr>
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Security Question:</font></td>
            <td class="form_field"><font face="Tahoma"><select name="security_question" class="inputselect" onchange="checkSecurityQuestion(this.value);">
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['security_questions_array'],'selected' => $this->_tpl_vars['post_security_question']), $this);?>
</select></font></td> </tr>	
        <tr id="content_custom_question" <?php if ($this->_tpl_vars['security_question'] != -1): ?> style="display: none;" <?php endif; ?>>
            <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>or write your own:</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  name="custom_question" type="text"  value="<?php echo $this->_tpl_vars['custom_question']; ?>
"  class="inputtext" size="20"  /></font></td> 
        </tr>	
        <tr>
            <td class="form_label"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Answer:</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  name="security_answer" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['post_security_answer']; ?>
"  class="inputtext" size="20"  /></font></td>
        </tr>		  

    </table>

    <font size="2" face="Tahoma">    
    <br>
    </font>
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></font></td>
        </tr>		  

    </table>

    <table border="0" cellSpacing="2" cellPadding="2" width="100%">
        <tr>
            <td class="contenButtons" align="middle">
                <font face="Tahoma">
                <input class="button" value="Updated" type="submit" name="buttonUpdate"></font></td>
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