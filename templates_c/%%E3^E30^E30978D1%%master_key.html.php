<?php /* Smarty version 2.6.18, created on 2013-07-19 04:57:49
         compiled from account/settings/master_key.html */ ?>
<form name="frmPersonal" method="post" action="<?php echo $this->_tpl_vars['HREF_PAGE']; ?>
"  >
    <input type="hidden" name="action" value="process"  />
    
    <table class="form">
        <tr>
            <td class=""><i>*</i>Master Key</td>
            <td><input class="inputtext" type="password" name="master_key" size="5" maxlength="3"/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="button" value="Next" type="submit" name="buttonNext"></td>
            </td>
        </tr>
    </table>

</form>