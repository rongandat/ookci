<?php /* Smarty version 2.6.18, created on 2013-07-19 05:29:58
         compiled from account/settings/stchange_password.html */ ?>

<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <h3><font size="2" face="Tahoma" color="#800000">Change Password</h3>
    <table class="form">
        <tr>
            <td class="form_label" >Current Password:</td>
            <td class="form_field" >
                <input  name="curent_password" type="password" autocomplete="off" value="" size="40" class="inputtext" />

            </td>
        </tr>		  
        <tr>
            <td class="form_label" >New Password:</td>
            <td class="form_field" >
                <input  name="new_password" type="password" autocomplete="off" value="" size="40" class="inputtext" />

            </td>
        </tr>		  
        <tr>
            <td class="form_label" >Confirm New Password:</td>
            <td class="form_field" >
                <input  name="re_password" type="password" autocomplete="off" value="" size="40" class="inputtext" />

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