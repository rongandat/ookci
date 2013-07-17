<?php /* Smarty version 2.6.18, created on 2013-07-16 04:57:29
         compiled from account/settings/stapi.html */ ?>
<?php echo '
<style type="text/css">

    a.linkAction {
        background-color: #009900;
        border: 1px solid #006600;
        color: #FFFFFF;
        font-size: 11px;
        padding: 3px;
        text-decoration: none;
    }
    td.form_field{
        padding: 5px 0
    }
</style>
'; ?>

<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="view_info" />
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Your Current API Information</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">

        <tr>
            <td colspan="2"><font size="2" face="Tahoma">    
                <br>
                </font></td>
        </tr>
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma">Enable/Disable API:</font></td>

            <td class="form_field">
                <font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_api_status'] )): ?><?php echo $this->_tpl_vars['view_api_status']; ?>
<?php else: ?>N/A<?php endif; ?>
                </font>
            </td> 
        </tr>	
        <tr>
            <td class="form_label">
                <font size="2" face="Tahoma">API Name:</font>
            </td>
            <td class="form_field">
                <font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_api_name'] )): ?><?php echo $this->_tpl_vars['view_api_name']; ?>
<?php else: ?>****<?php endif; ?>
                </font>
            </td>
        </tr>		  
        <tr>
            <td class="form_label">
                <font size="2" face="Tahoma">API Key:</font>
            </td>
            <td class="form_field">
                <font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_api_key'] )): ?><?php echo $this->_tpl_vars['view_api_key']; ?>
<?php else: ?>****<?php endif; ?>
                </font>
            </td>
        </tr>		  
        <tr>
            <td class="form_label">
                <font size="2" face="Tahoma">API Hask:</font>
            </td>
            <td class="form_field">
                <font face="Tahoma">
                <?php if (! empty ( $this->_tpl_vars['view_api_hask'] )): ?><?php echo $this->_tpl_vars['view_api_hask']; ?>
<?php else: ?>****<?php endif; ?>
                </font>
            </td>
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
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Update API Information</font></h3></td>
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
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Enable/Disable API:</font></td>
            <td class="form_field" ><font face="Tahoma">
                <input  name="api_status" type="checkbox" autocomplete="off" value="1" <?php if ($this->_tpl_vars['api_status'] == 1): ?> checked <?php endif; ?> class="inputtext"  /></font></td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>API Name:</font></td>
            <td class="form_field" ><font face="Tahoma">
                <input  name="api_name" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_name']; ?>
" maxlength="16" size="16" class="inputtext"  />
                <a id="link_api_name" class="linkAction" href="javascript:void();">Generate</a>
                </font></td>

        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>API Key</font></td>
            <td class="form_field" ><font face="Tahoma">
                <input  name="api_key" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_key']; ?>
" maxlength="32" size="40" class="inputtext" />
                <a id="link_api_key" class="linkAction" href="javascript:void();">Generate</a>
                </font></td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>API Hask</font></td>
            <td class="form_field" ><font face="Tahoma">
                <input  name="api_hask" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_hask']; ?>
" maxlength="4" size="4" class="inputtext" />
                <a id="link_api_hash" class="linkAction" href="javascript:void();">Generate</a>
                </font></td>
        </tr>		  

    </table>

    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key</font></td>
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
       
        $(document).ready(function(){
            $(\'#link_api_name\').live(\'click\',function(){
                var currentdate = new Date();
                var currenttime = currentdate.getTime();
                $(\'input[name="api_name"]\').val(crc32(\'"\'+currenttime+\'"\').toString(16))
            })
            $(\'#link_api_key\').live(\'click\',function(){
                var currentdate = new Date();
                var currenttime = currentdate.getTime();
                $(\'input[name="api_key"]\').val(crc32(\'"\'+currenttime+\'"\').toString(8))
            })
            $(\'#link_api_hash\').live(\'click\',function(){
                var currentdate = new Date();
                var currenttime = currentdate.getTime();
                $(\'input[name="api_hask"]\').val(crc32(\'"\'+currenttime+\'"\').toString(32).substring(0,4))
            })
            
            
        })
       

    </script>
    '; ?>

</form>