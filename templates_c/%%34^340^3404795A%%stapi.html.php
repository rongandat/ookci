<?php /* Smarty version 2.6.18, created on 2013-08-06 09:55:21
         compiled from account/settings/stapi.html */ ?>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="view_info" />
    <h3>Your Current API Information</h3>

    <table class="form">
        <tr>
            <td class="form_label" width="150">Enable/Disable API:</td>

            <td class="form_field">
                <?php if (! empty ( $this->_tpl_vars['view_api_status'] )): ?><?php echo $this->_tpl_vars['view_api_status']; ?>
<?php else: ?>N/A<?php endif; ?>
            </td> 
        </tr>	
        <tr>
            <td class="form_label">
                API Name:
            </td>
            <td class="form_field">
                <?php if (! empty ( $this->_tpl_vars['view_api_name'] )): ?><?php echo $this->_tpl_vars['view_api_name']; ?>
<?php else: ?>****<?php endif; ?>
            </td>
        </tr>		  
        <tr>
            <td class="form_label">
                API Key:
            </td>
            <td class="form_field">

                <?php if (! empty ( $this->_tpl_vars['view_api_key'] )): ?><?php echo $this->_tpl_vars['view_api_key']; ?>
<?php else: ?>****<?php endif; ?>

            </td>
        </tr>		  
        <tr>
            <td class="form_label">
                API Hask:
            </td>
            <td class="form_field">

                <?php if (! empty ( $this->_tpl_vars['view_api_hask'] )): ?><?php echo $this->_tpl_vars['view_api_hask']; ?>
<?php else: ?>****<?php endif; ?>

            </td>
        </tr>		  
        <tr>
            <td class="form_label"><i>*</i>Master Key</td>
            <td class="form_field">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></td>
        </tr>	
        <tr>
            <td class="form_label"></td>
            <td class="form_field">
                <input class="button" value="Get Information" type="submit" name="buttonUpdate">    
            </td>
        </tr>	
    </table>

</form>

<div class="line"></div>

<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <h3>Update API Information</h3>
    <p>Please input your secure question. The information is very important in case you lost your access information or Secure PIN</p>
    <table class="form">
        <tr>
            <td class="form_label" ><i>*</i>Enable/Disable API:</td>
            <td class="form_field" alight="left">
                <input  name="api_status" type="checkbox" autocomplete="off" value="1" <?php if ($this->_tpl_vars['api_status'] == 1): ?> checked <?php endif; ?>  /></td>
        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>API Name:</td>
            <td class="form_field" >
                <input  name="api_name" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_name']; ?>
" maxlength="16" size="16" class="inputtext"  />
                <a id="link_api_name" class="linkAction" href="javascript:void();">Generate</a>
            </td>

        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>API Key</td>
            <td class="form_field" >
                <input  name="api_key" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_key']; ?>
" maxlength="32" size="40" class="inputtext" />
                <a id="link_api_key" class="linkAction" href="javascript:void();">Generate</a>
            </td>
        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>API Hask</td>
            <td class="form_field" >
                <input  name="api_hask" type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['api_hask']; ?>
" maxlength="4" size="4" class="inputtext" />
                <a id="link_api_hash" class="linkAction" href="javascript:void();">Generate</a>
            </td>
        </tr>		  
        <tr>
            <td class="form_label" ><i>*</i>Master Key</td>
            <td class="form_field">
                <input  type="password" name="master_key" value="" autocomplete="off" class="inputtext" size="5" maxlength="3"  /></td>
        </tr>
        <tr>
            <td class="form_label" ></td>
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