<?php /* Smarty version 2.6.18, created on 2013-07-16 06:46:58
         compiled from account/settings/stverification.html */ ?>
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
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">View Verification</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">

        <tr>
            <td colspan="2"><font size="2" face="Tahoma">    
                <br>
                </font></td>
        </tr>
        <tr>
            <td class="form_label" width="150"><font size="2" face="Tahoma">Enable/Disable Verification</font></td>

            <td class="form_field">
                <font face="Tahoma">
               <?php echo $this->_tpl_vars['view_verification_status']; ?>

                </font>
            </td> 
        </tr>	
        <tr>
            <td class="form_label">
                <font size="2" face="Tahoma">Verification Ip:</font>
            </td>
            <td class="form_field">
                <font face="Tahoma">
                <?php echo $this->_tpl_vars['view_verification_ip']; ?>

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
        <tr><td><h3><font size="2" face="Tahoma" color="#800000">Update Verification</font></h3></td>
        </tr>
    </table>  
    <table cellpadding="0" cellspacing="0" border="0" class="form_content" width="580" style="border-collapse: collapse" bordercolor="#111111">
        
        <tr>
            <td colspan="2"><font size="2" face="Tahoma">    
                <br>
                </font></td>
        </tr>

        <tr>
            <td class="form_label" width="200"><font size="2" face="Tahoma">Enable/Disable Verification</font></td>

            <td class="form_field">
                <font face="Tahoma">
                <input type="checkbox" name="verification_status" value="1" <?php if (! empty ( $this->_tpl_vars['verification_ip'] )): ?> checked="checked" <?php endif; ?> />
                </font>
            </td> 
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
    
</form>