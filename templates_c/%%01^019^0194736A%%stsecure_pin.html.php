<?php /* Smarty version 2.6.18, created on 2013-07-16 05:59:12
         compiled from account/settings/stsecure_pin.html */ ?>
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
    <input type="hidden" name="action" value="update_account"  />
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="AutoNumber36" >
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Change Secure PIN</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">

        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma">Secure Question:</font></td>
            <td class="form_field" ><font face="Tahoma">
                <?php echo $this->_tpl_vars['account_info']['security_question']; ?>

                </font>
            </td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Your Secure Answer:</font></td>
            <td class="form_field" ><font face="Tahoma">
                <input  name="answer" type="text" autocomplete="off" value="" size="40" class="inputtext" />
                </font>
            </td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>Master Key</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></font></td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma"><font color="#FF0000">*</font>New Secure PIN</font></td>
            <td class="form_field"><font face="Tahoma">
                <input  type="text" name="pin" value="" autocomplete="off" class="inputtext" size="10" maxlength="10"  /></font></td>
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