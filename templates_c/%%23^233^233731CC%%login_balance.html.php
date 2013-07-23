<?php /* Smarty version 2.6.18, created on 2013-07-23 03:26:33
         compiled from home/login_balance.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/login_balance.html', 22, false),)), $this); ?>
<div class="simple-form">
    <h1>Login: Step 3</h1>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="loginbalance">
        <p>You may use your OOKCASH wallet to send payments more quickly without logging in to your main account. </p>
        <p><strong>Wallet balances (wallet is disabled)</strong></p>
        <div class="buttons">
            <input type="button" value="Pay from your wallet" class="button" disabled="disabled" name="buttonPaywallet">
        </div>
        <p>To view your history, messages, change your settings, add funds to wallet or make payments please login to your main account.</p>
        <h3>Main account balances</h3>
        <table border="0">
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
            <?php if (( $this->_sections['balanceidx']['index'] % 2 ) == 0): ?> <?php $this->assign('rowstyle', 'tableNormalRow'); ?> <?php else: ?>  <?php $this->assign('rowstyle', 'tableAltRow'); ?>  <?php endif; ?>
            <tr>
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
" width="250"><font face="Tahoma" size="2"><strong><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_name']; ?>
</strong></font></td>
                <td class="<?php echo $this->_tpl_vars['rowstyle']; ?>
"><font face="Tahoma" size="2"><?php echo $this->_tpl_vars['balances'][$this->_sections['balanceidx']['index']]['balance_text']; ?>
</font></td>			 
            </tr>
            <?php endfor; endif; ?>
        </table>
        <div class="buttons">
            <input  type="button" id="buttonLoginPIN" class="button"  value="Login PIN" onclick="redirect('<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN_PIN','ssl' => true), $this);?>
');" />
            <input  type="button" name="buttonOneTime"  disabled="disabled"  class="button"  value="One Time PIN">
        </div>
    </div>
</div>