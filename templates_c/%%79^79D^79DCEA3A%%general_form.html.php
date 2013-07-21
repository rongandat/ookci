<?php /* Smarty version 2.6.18, created on 2013-07-17 16:50:03
         compiled from home/general_form.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'home/general_form.html', 36, false),)), $this); ?>
<div class="simple-form">
    <h1>Global Checkout Button/Form Generator</h1>
    <div class="line"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="" method="post">
        <h3>Checkout Information</h3>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Your Account Number </span>
            <div class="block">
                <input type="text" class="st-forminput hurge" name="payee_account" value="<?php echo $this->_tpl_vars['payee_account']; ?>
" >
                <span class="information">(please input your account number that you want customer pay to. The field is required. Examples: 6868688)</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Payer Account Number </span>
            <div class="block">
                <input type="text" class="st-forminput hurge" name="payer_account" value="<?php echo $this->_tpl_vars['payer_account']; ?>
" >
                <span class="information">please input account number of who you want to receive money from. The field is not required, leave it empty if you want anyone can send you money.<br/> Example: 988888 </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"> Amount</span>
            <div class="block">
                <input type="text" class="st-forminput hurge" name="checkout_amount" value="<?php echo $this->_tpl_vars['checkout_amount']; ?>
" >

                <span class="information"> Amount is not required field, leave it empty if you want Payer pay any amount like donation. Example: 5,3.99 </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"> Currency</span>
            <div class="block">
                <select id="" class="form" name="checkout_currency">
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Cancel URL</span>
            <div class="block">
                <input type="text" class="st-forminput bighurge" name="cancel_url" value="<?php echo $this->_tpl_vars['cancel_url']; ?>
" >
                <span class="information"> The field is not required but if you input the value, when your customer cancel their order, our serivce will help you to redirect them back to your site. Example: http://yourwebsite.com/cancel.html?param1=value1¶m2=value2 </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Fail URL</span>
            <div class="block">
                <input type="text" class="st-forminput bighurge" name="fail_url" value="<?php echo $this->_tpl_vars['fail_url']; ?>
" >
                <span class="information">  The field is not required but if you input a value, Payer will be redirect to Fail URL if any problem during progress on our service </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"> Success URL:</span>
            <div class="block">
                <input type="text" class="st-forminput bighurge" name="success_url" value="<?php echo $this->_tpl_vars['success_url']; ?>
" >
                <span class="information"> The field is not required but if the value is inputed, Payer will be redirect to the Success URL after he/she made payment </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"> Status URL:</span>
            <div class="block">
                <input type="text" class="st-forminput bighurge" name="status_url" value="<?php echo $this->_tpl_vars['status_url']; ?>
" >
                <span class="information">  The field is not required but it is very useful one. If you input the value, all of important transaction verification data will be reponse back to the URL to help you verify your order status on our service. This also help you to protect any frauds, hacking during business. </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"> Status Method:</span>
            <div class="block">
                <select name="status_method">
                    <option <?php if ($this->_tpl_vars['checkout_currency'] == 'GET'): ?>selected<?php endif; ?> value="GET">GET</option>
                    <option <?php if ($this->_tpl_vars['checkout_currency'] == 'POST'): ?>selected<?php endif; ?> value="POST">POST</option>
                </select>
                <span class="information">The field used to define the postback method that our service will use to POST/GET response data to your Status URL </span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="line"></div>
        <h3> Extra Fields</h3>
        <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)0;
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['fields_extra']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
        <div class="st-form-line">
            <span class="st-labeltext"></span>
            <input type="text" name="extra_field[<?php echo $this->_sections['foo']['index']; ?>
]" value="<?php echo $this->_tpl_vars['extra_field'][$this->_sections['foo']['index']]; ?>
" class="st-forminput large"><span class="equa">=</span><input type="text" name="extra_value[<?php echo $this->_sections['foo']['index']; ?>
]" value="<?php echo $this->_tpl_vars['extra_value'][$this->_sections['foo']['index']]; ?>
" class="st-forminput large">
            <div class="clear"></div>
        </div>
        <?php endfor; endif; ?>
        <div class="st-form-line">
            <span class="st-labeltext"></span>
            <input type="submit" value="Submit" class="button">
            <div class="clear"></div>
        </div>

    </form>
    <div class="line"></div>
    <?php if (! empty ( $this->_tpl_vars['zend_code_link'] )): ?>
    <table border="0" bgcolor="#CCCCCC" style="padding: 20px 50px;" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
        <tr>
            <td width="100%" height="30" valign="top"><b>
                    <font size="2" face="Tahoma" color="#800000"> SCI Link:</font></b></td>
        </tr>

        <tr>
            <td>
                <textarea readonly="readonly" rows="8" cols="80"><?php echo $this->_tpl_vars['zend_code_link']; ?>
</textarea>
            </td>
        </tr>
    </table>

    <?php endif; ?>
    <?php if (! empty ( $this->_tpl_vars['zend_code_html'] )): ?>

    <table border="0" bgcolor="#CCCCCC" style="padding: 20px 50px;" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
        <tr>
            <td width="100%" height="30" valign="top"><b>
                    <font size="2" face="Tahoma" color="#800000"> SCI HTML:</font></b></td>
        </tr>

        <tr>
            <td>
                <textarea readonly="readonly" rows="8" cols="80"><?php echo $this->_tpl_vars['zend_code_html']; ?>
</textarea>
            </td>
        </tr>
    </table>

    <?php endif; ?>
    <?php if (! empty ( $this->_tpl_vars['zend_code_buton'] )): ?>

    <table border="0" bgcolor="#CCCCCC" style="padding: 20px 50px;" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
        <tr>
            <td width="100%" height="30" valign="top"><b>
                    <font size="2" face="Tahoma" color="#800000"> SCI Buttons:</font></b></td>
        </tr>

        <tr>
            <td>
                <textarea readonly="readonly" rows="8" cols="80"><?php echo $this->_tpl_vars['zend_code_buton']; ?>
</textarea>
            </td>
        </tr>
    </table>

    <?php endif; ?>
    <?php if (! empty ( $this->_tpl_vars['zend_code_form'] )): ?>

    <table border="0" bgcolor="#CCCCCC" style="padding: 20px 50px;" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
        <tr>
            <td width="100%" height="30" valign="top"><b>
                    <font size="2" face="Tahoma" color="#800000"> SCI Form:</font></b></td>
        </tr>

        <tr>
            <td>
                <textarea readonly="readonly" rows="8" cols="80"><?php echo $this->_tpl_vars['zend_code_form']; ?>
</textarea>
            </td>
        </tr>
    </table>
    
    <?php endif; ?>
</div>