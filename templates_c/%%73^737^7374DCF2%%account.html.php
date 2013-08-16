<?php /* Smarty version 2.6.18, created on 2013-08-16 05:07:36
         compiled from account/account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/account.html', 74, false),)), $this); ?>
<div class="simple-form">
    <h1>Account</h1>
    <div class="line"></div>
    <table class="form">
        <tr>
            <td  valign="top"><span class="contentTitle3">
                    Summary</span></td>
        </tr>
        <tr>
            <td>
                <table class="form">
                    <tr>
                        <td class="form_label">
                            Account Number</td>
                        <td class="form_field" ><strong>
                                <?php echo $_SESSION['login_account_number']; ?>
</strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Account Name</td>
                        <td class="form_field" ><strong>
                                <?php echo $this->_tpl_vars['account_info']['account_name']; ?>
</strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Account Type</td>
                        <td class="form_field" ><strong>
                                <?php if ($this->_tpl_vars['account_info']['account_type'] == 'user'): ?> User <?php endif; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="form_label">
                            Referral Count </td>
                        <td class="form_field" ><strong>
                                <?php echo $this->_tpl_vars['account_info']['referral_count']; ?>
</strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="list">
        <thead>
            <tr>
                <td >&nbsp;</td>
                <?php unset($this->_sections['balanceidx']);
$this->_sections['balanceidx']['name'] = 'balanceidx';
$this->_sections['balanceidx']['loop'] = is_array($_loop=$this->_tpl_vars['balances']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['balanceidx']['show'] = true;
$this->_sections['balanceidx']['max'] = $this->_sections['balanceidx']['loop'];
$this->_sections['balanceidx']['step'] = 1;
$this->_sections['balanceidx']['start'] = $this->_sections['balanceidx']['step'] > 0 ? 0 : $this->_sections['balanceidx']['loop']-1;
if ($this->_sections['balanceidx']['show']) {
    $this->_sections['balanceidx']['total'] = $this->_sections['balanceidx']['loop'];
    if ($this->_sections['balanceidx']['total'] == 0)
        $this->_sections['balanceidx']['show'] = false;
} else
    $this->_sections['balanceidx']['total'] = 0;
if ($this->_sections['balanceidx']['show']):

            for ($this->_sections['balanceidx']['index'] = $this->_sections['balanceidx']['start'], $this->_sections['balanceidx']['iteration'] = 1;
                 $this->_sections['balanceidx']['iteration'] <= $this->_sections['balanceidx']['total'];
                 $this->_sections['balanceidx']['index'] += $this->_sections['balanceidx']['step'], $this->_sections['balanceidx']['iteration']++):
$this->_sections['balanceidx']['rownum'] = $this->_sections['balanceidx']['iteration'];
$this->_sections['balanceidx']['index_prev'] = $this->_sections['balanceidx']['index'] - $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['index_next'] = $this->_sections['balanceidx']['index'] + $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['first']      = ($this->_sections['balanceidx']['iteration'] == 1);
$this->_sections['balanceidx']['last']       = ($this->_sections['balanceidx']['iteration'] == $this->_sections['balanceidx']['total']);
?>	
                <td><strong><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_code']; ?>
</strong></td>
                <?php endfor; endif; ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td >Account</td>
                <?php unset($this->_sections['balanceidx']);
$this->_sections['balanceidx']['name'] = 'balanceidx';
$this->_sections['balanceidx']['loop'] = is_array($_loop=$this->_tpl_vars['balances']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['balanceidx']['show'] = true;
$this->_sections['balanceidx']['max'] = $this->_sections['balanceidx']['loop'];
$this->_sections['balanceidx']['step'] = 1;
$this->_sections['balanceidx']['start'] = $this->_sections['balanceidx']['step'] > 0 ? 0 : $this->_sections['balanceidx']['loop']-1;
if ($this->_sections['balanceidx']['show']) {
    $this->_sections['balanceidx']['total'] = $this->_sections['balanceidx']['loop'];
    if ($this->_sections['balanceidx']['total'] == 0)
        $this->_sections['balanceidx']['show'] = false;
} else
    $this->_sections['balanceidx']['total'] = 0;
if ($this->_sections['balanceidx']['show']):

            for ($this->_sections['balanceidx']['index'] = $this->_sections['balanceidx']['start'], $this->_sections['balanceidx']['iteration'] = 1;
                 $this->_sections['balanceidx']['iteration'] <= $this->_sections['balanceidx']['total'];
                 $this->_sections['balanceidx']['index'] += $this->_sections['balanceidx']['step'], $this->_sections['balanceidx']['iteration']++):
$this->_sections['balanceidx']['rownum'] = $this->_sections['balanceidx']['iteration'];
$this->_sections['balanceidx']['index_prev'] = $this->_sections['balanceidx']['index'] - $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['index_next'] = $this->_sections['balanceidx']['index'] + $this->_sections['balanceidx']['step'];
$this->_sections['balanceidx']['first']      = ($this->_sections['balanceidx']['iteration'] == 1);
$this->_sections['balanceidx']['last']       = ($this->_sections['balanceidx']['iteration'] == $this->_sections['balanceidx']['total']);
?>	
                <td><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</td>
                <?php endfor; endif; ?>
            </tr>
            <tr>
                <td >Wallet</td>
                <?php unset($this->_sections['walletidx']);
$this->_sections['walletidx']['name'] = 'walletidx';
$this->_sections['walletidx']['loop'] = is_array($_loop=$this->_tpl_vars['wallets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['walletidx']['show'] = true;
$this->_sections['walletidx']['max'] = $this->_sections['walletidx']['loop'];
$this->_sections['walletidx']['step'] = 1;
$this->_sections['walletidx']['start'] = $this->_sections['walletidx']['step'] > 0 ? 0 : $this->_sections['walletidx']['loop']-1;
if ($this->_sections['walletidx']['show']) {
    $this->_sections['walletidx']['total'] = $this->_sections['walletidx']['loop'];
    if ($this->_sections['walletidx']['total'] == 0)
        $this->_sections['walletidx']['show'] = false;
} else
    $this->_sections['walletidx']['total'] = 0;
if ($this->_sections['walletidx']['show']):

            for ($this->_sections['walletidx']['index'] = $this->_sections['walletidx']['start'], $this->_sections['walletidx']['iteration'] = 1;
                 $this->_sections['walletidx']['iteration'] <= $this->_sections['walletidx']['total'];
                 $this->_sections['walletidx']['index'] += $this->_sections['walletidx']['step'], $this->_sections['walletidx']['iteration']++):
$this->_sections['walletidx']['rownum'] = $this->_sections['walletidx']['iteration'];
$this->_sections['walletidx']['index_prev'] = $this->_sections['walletidx']['index'] - $this->_sections['walletidx']['step'];
$this->_sections['walletidx']['index_next'] = $this->_sections['walletidx']['index'] + $this->_sections['walletidx']['step'];
$this->_sections['walletidx']['first']      = ($this->_sections['walletidx']['iteration'] == 1);
$this->_sections['walletidx']['last']       = ($this->_sections['walletidx']['iteration'] == $this->_sections['walletidx']['total']);
?>	
                <td><?php echo $this->_tpl_vars['wallets'][$this->_sections['walletidx']['index']]['balance_text']; ?>
</td>
                <?php endfor; endif; ?>	
            </tr>
            <tr>
                <td ><strong>Totals</strong></td>
                <?php unset($this->_sections['totalidx']);
$this->_sections['totalidx']['name'] = 'totalidx';
$this->_sections['totalidx']['loop'] = is_array($_loop=$this->_tpl_vars['totals']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['totalidx']['show'] = true;
$this->_sections['totalidx']['max'] = $this->_sections['totalidx']['loop'];
$this->_sections['totalidx']['step'] = 1;
$this->_sections['totalidx']['start'] = $this->_sections['totalidx']['step'] > 0 ? 0 : $this->_sections['totalidx']['loop']-1;
if ($this->_sections['totalidx']['show']) {
    $this->_sections['totalidx']['total'] = $this->_sections['totalidx']['loop'];
    if ($this->_sections['totalidx']['total'] == 0)
        $this->_sections['totalidx']['show'] = false;
} else
    $this->_sections['totalidx']['total'] = 0;
if ($this->_sections['totalidx']['show']):

            for ($this->_sections['totalidx']['index'] = $this->_sections['totalidx']['start'], $this->_sections['totalidx']['iteration'] = 1;
                 $this->_sections['totalidx']['iteration'] <= $this->_sections['totalidx']['total'];
                 $this->_sections['totalidx']['index'] += $this->_sections['totalidx']['step'], $this->_sections['totalidx']['iteration']++):
$this->_sections['totalidx']['rownum'] = $this->_sections['totalidx']['iteration'];
$this->_sections['totalidx']['index_prev'] = $this->_sections['totalidx']['index'] - $this->_sections['totalidx']['step'];
$this->_sections['totalidx']['index_next'] = $this->_sections['totalidx']['index'] + $this->_sections['totalidx']['step'];
$this->_sections['totalidx']['first']      = ($this->_sections['totalidx']['iteration'] == 1);
$this->_sections['totalidx']['last']       = ($this->_sections['totalidx']['iteration'] == $this->_sections['totalidx']['total']);
?>	
                <td><strong><?php echo $this->_tpl_vars['totals'][$this->_sections['totalidx']['index']]['balance_text']; ?>
</strong></td>
                <?php endfor; endif; ?>	
            </tr>
        </tbody>

    </table>
    <?php if (isset ( $_SESSION['payee_account'] )): ?>
    <a class="button" href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SCI_TRANSFER','module' => 'acount','ssl' => true), $this);?>
">Confirm</a>
    <?php endif; ?>
</div>

