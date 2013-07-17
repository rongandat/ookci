<?php /* Smarty version 2.6.18, created on 2013-07-04 04:26:43
         compiled from home/general_form.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'home/general_form.html', 84, false),)), $this); ?>
<div align="right">
    <form action="" method="post">
        <table width="650" height="445" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber35" style="border-collapse: collapse">
            <tbody>
                <tr>
                    <td width="100%" height="20">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="30">
                        <font size="3" face="Tahoma" color="#800000"><b>Global Checkout Button/Form Generator</b>
                        </font></td>
                </tr>
                <tr>
                    <td ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                </tr>	
                <tr>
                    <td width="100%" valign="top" height="3">
                        <div align="center">
                            <center>
                                <table width="580" cellspacing="0" cellpadding="15" bordercolor="#111111" border="0" bgcolor="#CCCCCC" id="AutoNumber41" style="border-collapse: collapse">
                                    <tbody>
                                        <tr>
                                            <td width="100%">
                                                <table width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber42" style="border-collapse: collapse">
                                                    <tbody><tr>
                                                            <td width="100%" valign="top" height="30"><b>
                                                                    <font size="2" face="Tahoma" color="#800000">
                                                                    Checkout Information</font></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="100%">
                                                                <table class="text">
                                                                    <tbody>

                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Your Account Number<span class="required">*</span>
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                (please input your account number that you want customer pay to. The field is required. Examples: 6868688)
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="20" value="<?php echo $this->_tpl_vars['payee_account']; ?>
" type="text" name="payee_account">
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Payer Account Number:
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                please input account number of who you want to receive money from. The field is not required, leave it empty if you want anyone can send you money. Example: 988888
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="20" value="<?php echo $this->_tpl_vars['payer_account']; ?>
" type="text" name="payer_account">
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Amount:
                                                                                </font><br/>    
                                                                                <font size="1" face="Tahoma">
                                                                                Amount is not required field, leave it empty if you want Payer pay any amount like donation. Example: 5,3.99
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="20"  type="text" name="checkout_amount" value="<?php echo $this->_tpl_vars['checkout_amount']; ?>
">&nbsp;
                                                                                <font size="2" face="Tahoma">
                                                                                Currency:
                                                                                </font>
                                                                                <select id="" class="form" name="checkout_currency">
                                                                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['balance_currencies'],'selected' => $this->_tpl_vars['balance_currency']), $this);?>

                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Cancel URL:
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                The field is not required but if you input the value, when your customer cancel their order, our serivce will help you to redirect them back to your site. Example: http://yourwebsite.com/cancel.html?param1=value1¶m2=value2
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="80" value="<?php echo $this->_tpl_vars['cancel_url']; ?>
"  type="text" name="cancel_url">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Fail URL:
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                The field is not required but if you input a value, Payer will be redirect to Fail URL if any problem during progress on our service
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="80" value="<?php echo $this->_tpl_vars['fail_url']; ?>
" type="text" name="fail_url">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Success URL:
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                The field is not required but if the value is inputed, Payer will be redirect to the Success URL after he/she made payment
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="80" value="<?php echo $this->_tpl_vars['success_url']; ?>
" type="text" name="success_url">
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Status URL:
                                                                                </font><br/>
                                                                                <font size="1" face="Tahoma">
                                                                                The field is not required but it is very useful one. If you input the value, all of important transaction verification data will be reponse back to the URL to help you verify your order status on our service. This also help you to protect any frauds, hacking during business.
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input size="80" value="<?php echo $this->_tpl_vars['status_url']; ?>
" type="text" name="status_url">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <font size="2" face="Tahoma">
                                                                                Status Method:
                                                                                </font>
                                                                                <font size="1" face="Tahoma">
                                                                                The field used to define the postback method that our service will use to POST/GET response data to your Status URL
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <select name="status_method">
                                                                                    <option <?php if ($this->_tpl_vars['checkout_currency'] == 'GET'): ?>selected<?php endif; ?> value="GET">GET</option>
                                                                                    <option <?php if ($this->_tpl_vars['checkout_currency'] == 'POST'): ?>selected<?php endif; ?> value="POST">POST</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody></table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                    </tbody></table>
                            </center>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="100%" valign="top" height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="12">
                        <div align="center">
                            <center>
                                <table border="0" cellpadding="15" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="">
                                    <tr>
                                        <td width="100%" bgcolor="#CCCCCC">
<!--                                            <input name="action" value="process" type="hidden" />-->
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
                                                <tr>
                                                    <td width="100%" height="30" valign="top"><b>
                                                            <font size="2" face="Tahoma" color="#800000"> Extra Fields:</font></b></td>
                                                </tr>
                                                <tr>
                                                    <td width="100%"><font size="2" face="Tahoma"> We provide some good addtional fields that you can define in your checkout form/button. 
                                                        The fields and its values will be response back to your Status URL when your checkout transaction be processed immediately. </font></p>
                                                        <div align="left">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="350" id="AutoNumber40">
                                                                <tr>
                                                                    <td width="150">
                                                                        <font size="2" face="Tahoma">Field Name</font>
                                                                    <td width="50"></td>
                                                                    <td width="150">
                                                                        <font size="2" face="Tahoma">Field Value</font>
                                                                    </td>
                                                                </tr>
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
                                                                <tr>
                                                                    <td width="150">
                                                                        &nbsp;
                                                                    <td width="50"></td>
                                                                    <td width="150">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr><td><input type="text" name="extra_field[<?php echo $this->_sections['foo']['index']; ?>
]" value="<?php echo $this->_tpl_vars['extra_field'][$this->_sections['foo']['index']]; ?>
"></td><td>=</td><td><input type="text" name="extra_value[<?php echo $this->_sections['foo']['index']; ?>
]" value="<?php echo $this->_tpl_vars['extra_value'][$this->_sections['foo']['index']]; ?>
"></td></tr>
                                                                <?php endfor; endif; ?>
                                                            </table>

                                                        </div>
                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150">
                                                        &nbsp;
                                                    <td width="50"></td>
                                                    <td width="150">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p align="left">
                                                            <input type="submit" value="Submit">
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                </tr>


                <?php if (! empty ( $this->_tpl_vars['zend_code_link'] )): ?>
                <tr>
                    <td width="100%" valign="top" height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="12">
                        <div align="center">
                            <center>
                                <table border="0" cellpadding="15" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="">
                                    <tr>
                                        <td width="100%" bgcolor="#CCCCCC">
<!--                                            <input name="action" value="process" type="hidden" />-->
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
                                                <tr>
                                                    <td width="100%" height="30" valign="top"><b>
                                                            <font size="2" face="Tahoma" color="#800000"> SCI Link:</font></b></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <textarea readonly="readonly" rows="8" cols="65"><?php echo $this->_tpl_vars['zend_code_link']; ?>
</textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['zend_code_html'] )): ?>
                <tr>
                    <td width="100%" valign="top" height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="12">
                        <div align="center">
                            <center>
                                <table border="0" cellpadding="15" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="">
                                    <tr>
                                        <td width="100%" bgcolor="#CCCCCC">
<!--                                            <input name="action" value="process" type="hidden" />-->
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
                                                <tr>
                                                    <td width="100%" height="30" valign="top"><b>
                                                            <font size="2" face="Tahoma" color="#800000"> SCI HTML:</font></b></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <textarea readonly="readonly" rows="8" cols="65"><?php echo $this->_tpl_vars['zend_code_html']; ?>
</textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['zend_code_buton'] )): ?>
                <tr>
                    <td width="100%" valign="top" height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="12">
                        <div align="center">
                            <center>
                                <table border="0" cellpadding="15" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="">
                                    <tr>
                                        <td width="100%" bgcolor="#CCCCCC">
<!--                                            <input name="action" value="process" type="hidden" />-->
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
                                                <tr>
                                                    <td width="100%" height="30" valign="top"><b>
                                                            <font size="2" face="Tahoma" color="#800000"> SCI Buttons:</font></b></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <textarea readonly="readonly" rows="8" cols="65"><?php echo $this->_tpl_vars['zend_code_buton']; ?>
</textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['zend_code_form'] )): ?>
                <tr>
                    <td width="100%" valign="top" height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" valign="top" height="12">
                        <div align="center">
                            <center>
                                <table border="0" cellpadding="15" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="580" id="">
                                    <tr>
                                        <td width="100%" bgcolor="#CCCCCC">
<!--                                            <input name="action" value="process" type="hidden" />-->
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39">
                                                <tr>
                                                    <td width="100%" height="30" valign="top"><b>
                                                            <font size="2" face="Tahoma" color="#800000"> SCI Form:</font></b></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <textarea readonly="readonly" rows="8" cols="65"><?php echo $this->_tpl_vars['zend_code_form']; ?>
</textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </form>
</div>

<div align="right">
    <table width="650" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" id="AutoNumber43" style="border-collapse: collapse">
        <tbody><tr>
                <td width="100%" height="80">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>