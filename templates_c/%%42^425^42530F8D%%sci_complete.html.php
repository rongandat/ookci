<?php /* Smarty version 2.6.18, created on 2013-07-21 17:38:19
         compiled from account/sci_complete.html */ ?>
<form name="frmTransfer" id="frmTransfer" method="get" action="<?php echo $this->_tpl_vars['url']; ?>
" >
    <div class="simple-form">
        <h1>Transfer Successful </h1>

        <div class="line"></div>
        <?php if (! empty ( $this->_tpl_vars['error'] )): ?>
        <input type="hidden" name="error" value="<?php echo $this->_tpl_vars['error']; ?>
"/>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['history']['transaction_status'] == 'completed'): ?>
        <p>Your transfer was successful!.</p>
        <?php if (! empty ( $this->_tpl_vars['url'] )): ?>
        <p>you will redirect within 10 seconds.</p>
        <?php endif; ?>
        <table cellspacing="0" cellpadding="0" bordercolor="#111111" border="0" style="border-collapse: collapse" class="form_content">
            <tbody><tr>
                    <td class="form_label"><font size="2" face="Tahoma">Date:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['transaction_time']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Batch Number#:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['batch_number']; ?>
</font></td>
                </tr>	
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">From:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['from_account']; ?>
(<strong><?php echo $this->_tpl_vars['user_transfer']['account_name']; ?>
</strong>)</font></td>
                </tr>	    
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">To:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['to_account']; ?>
</font></td>
                </tr>	 
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Amount:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['amount_text']; ?>
</font></td>
                </tr>	 
                <tr>
                    <td class="form_label"><font size="2" face="Tahoma">Transaction Memo:</font></td>
                    <td class="form_field"><font size="2" face="Tahoma"><?php echo $this->_tpl_vars['transaction']['transaction_memo']; ?>
</font></td>
                </tr>	       
                <?php if (! empty ( $this->_tpl_vars['url'] )): ?>
                <tr>
                    <td class="">

                    </td>
                    <td class="">
                        <button type="submit">Return</button>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>  

        <?php else: ?>
        <p><?php echo $this->_tpl_vars['history']['description']; ?>
</p>
        <table class="form">
            <tr>
                <td class="">

                </td>
                <td class="">
                    <button type="submit">Return</button>
                </td>
            </tr>
        </table>
        <?php endif; ?>
    </div>

    <?php if (! empty ( $this->_tpl_vars['url'] )): ?>
    <?php echo '
    <script>
        var interval = 1000;
        var i = 3
        setInterval(function(){
            i--;
            if(i == 0){
                jQuery(\'form#frmTransfer\').submit();
            }
        }, interval);
    </script>
    '; ?>

    <?php endif; ?>
</form>