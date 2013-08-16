<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 09:50:03
         compiled from "application\views\templates\account\personal.html" */ ?>
<?php /*%%SmartyHeaderCode:10785209ba27afcc39-93832805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75c0360fee62a5ed309eed5ff09f4b80b3d5aa33' => 
    array (
      0 => 'application\\views\\templates\\account\\personal.html',
      1 => 1376380188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10785209ba27afcc39-93832805',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209ba27c6d0f6_55203900',
  'variables' => 
  array (
    'heading_title' => 0,
    'success' => 0,
    'user_info' => 0,
    'countries_array' => 0,
    'zones_array' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209ba27c6d0f6_55203900')) {function content_5209ba27c6d0f6_55203900($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\ookcash\\system\\Smarty\\libs\\plugins\\function.html_options.php';
?><form name="frmPersonal" method="post" action=""  >
    <input class="inputtext" type="hidden" name="action" value="update_account"  />
    <div class="simple-form">
        <h1><?php echo $_smarty_tpl->tpl_vars['heading_title']->value;?>
</h1>
        <p>The following section can only be viewed after you enter your master key.</p>
        <p>Fields 
            marked with asterisk (<i>*</i>) are 
            required.</p>
        <div class="line"></div>
        <?php echo $_smarty_tpl->getSubTemplate ("common/validate_error.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php if (!empty($_smarty_tpl->tpl_vars['success']->value)){?>
        <div class="success">Your acount information hava been updated successfully</div>
        <?php }?>
        <h3>Personal Information</h3>
        <table class="form">
            <tr>
                <td>
                    <i>*</i>Account Name:</td>
                <td>
                    <input class="inputtext" type="text" name="account_name" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['account_name'];?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>First Name:</td>
                <td>
                    <input class="inputtext" type="text" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['firstname'];?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>Last Name:</td>
                <td>
                    <input class="inputtext" type="text" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['lastname'];?>
" size="20"></td>
            </tr>      
            <tr>
                <td>
                    Company Name:</td>
                <td>
                    <input class="inputtext" type="text" name="company" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['company'];?>
" size="50"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>Phone:</td>
                <td>
                    <input class="inputtext" type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['phone'];?>
" size="20"></td>
            </tr>  
            <tr>
                <td>
                    Mobile:</td>
                <td>
                    <input class="inputtext" type="text" name="mobile"  value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
" size="20"></td>
            </tr>          
        </table>

        <h3>Contact Information</h3>
        <table class="form">
            <tr>
                <td>
                    <i>*</i>Address:</td>
                <td>
                    <input class="inputtext" type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['address'];?>
" size="50"></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>City:</td>
                <td>
                    <input class="inputtext" type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['city'];?>
" size="50"></td>
            </tr>    
            <tr>
                <td>
                    <i>*</i>Country:</td>
                <td>
                    <select name="country"  class="inputtext"  onchange="getStates(this.value);">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['countries_array']->value,'selected'=>$_smarty_tpl->tpl_vars['user_info']->value['country']),$_smarty_tpl);?>
</select></td>
            </tr>  
            <tr>
                <td>
                    <i>*</i>State:</td>
                <td><select name="state"  id="state" class="state inputtext" >
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['zones_array']->value,'selected'=>$_smarty_tpl->tpl_vars['user_info']->value['state']),$_smarty_tpl);?>
</select></td>
            </tr>      
            <tr>
                <td>
                    <i>*</i>Zip/Postal Code:</td>
                <td>
                    <input class="inputtext" type="text" name="postcode" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['postcode'];?>
" size="20"></td>
            </tr>    
        </table>

        <h3>Additional Information</h3>
        <table class="form">
            <tr>
                <td>
                    Additional Information:</td>
                <td>
                    <textarea  name="additional_information" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['additional_information'];?>
" cols="40" rows="2"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['additional_information'];?>
</textarea></td>
            </tr> 
            <tr>
                <td>
                    <i>*</i>Personal welcome message:</td>
                <td>
                    <textarea  name="welcome_message" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['welcome_message'];?>
" cols="40" rows="2"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['welcome_message'];?>
</textarea></td>
            </tr> 
            <tr>
                <td   height="32">
                    <i>*</i>Master Key:</td>
                <td width="442"  height="32">
                    <input class="inputtext" type="password" name="master_key" size="5" maxlength="3"></td>
            </tr>
        </table>    


        <div class="buttons">
            <input class="button" value="Apply Changes" type="submit" name="buttonUpdate">
        </div>
    </div>

</form>

<script type="text/javascript">
    
    function getStates(countryid) {
        var url = '<?php echo site_url("home/zones");?>
'
        
        $.post(url, {country_id: countryid}, function(data) {
            $("select:#state").html(data);
        });
        
    }
    
</script>
<?php }} ?>