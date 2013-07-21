<?php /* Smarty version 2.6.18, created on 2013-07-19 05:17:36
         compiled from account/settings/stverification.html */ ?>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="view_info" />
    <h3>View Verification</h3>
    <table class="form">
        <tr>
            <td class="form_label" >Enable/Disable Verification</td>

            <td class="form_field">

                <?php echo $this->_tpl_vars['view_verification_status']; ?>


            </td> 
        </tr>	
        <tr>
            <td class="form_label">
                Verification Ip:
            </td>
            <td class="form_field">

                <?php echo $this->_tpl_vars['view_verification_ip']; ?>


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
                <input class="button" value="Get Information" type="submit" name="buttonUpdate">    
            </td>
        </tr>	
    </table>


</form>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="update_account"  />
    <h3>Update Verification</h3>

    <table class="form">

        <tr>
            <td class="form_label" >Enable/Disable Verification</td>

            <td class="form_field">
                <input type="checkbox" name="verification_status" value="1" <?php if (! empty ( $this->_tpl_vars['verification_ip'] )): ?> checked="checked" <?php endif; ?> />

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
                <input class="button" value="Updated" type="submit" name="buttonUpdate">    
            </td>
        </tr>
    </table>

</form>