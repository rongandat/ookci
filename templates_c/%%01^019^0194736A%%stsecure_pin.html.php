<?php /* Smarty version 2.6.18, created on 2013-07-19 04:50:18
         compiled from account/settings/stsecure_pin.html */ ?>

<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <h3>Change Secure PIN</h3>
    
    <table class="form">
        <tr>
            <td class="form_label" width="200">Secure Question:</td>
            <td class="form_field" >
                <?php echo $this->_tpl_vars['account_info']['security_question']; ?>

                
            </td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><i>*</i>Your Secure Answer:</td>
            <td class="form_field" >
                <input  name="answer" type="text" autocomplete="off" value="" size="40" class="inputtext" />
                
            </td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><i>*</i>Master Key</td>
            <td class="form_field">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"><i>*</i>New Secure PIN</td>
            <td class="form_field">
                <input  type="text" name="pin" value="" autocomplete="off" class="inputtext" size="10" maxlength="10"  /></td>
        </tr>		  
        <tr>
            <td class="form_label" width="200"></td>
            <td class="form_field">
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