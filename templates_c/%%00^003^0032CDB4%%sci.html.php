<?php /* Smarty version 2.6.18, created on 2013-07-23 04:27:52
         compiled from home/sci.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'home/sci.html', 7, false),)), $this); ?>
<div class="simple-form">
    <?php if (empty ( $this->_tpl_vars['errors'] )): ?>
    <h1>Pay with a OOKCASH Account</h1>
    <p> OOKCASH is the secure payment processor for your merchant. </p>
    <div class="line"></div>
    <div class="clear"></div>
    <form action="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_LOGIN','ssl' => true), $this);?>
" method="post">
        <table class="form">
            <tbody>
                <tr>
                    <td width="100">
                        Pay to account
                    </td>
                    <td width="250">
                        <?php echo $this->_tpl_vars['user_info']['account_number']; ?>
(<?php echo $this->_tpl_vars['user_info']['firstname']; ?>
 <?php echo $this->_tpl_vars['user_info']['lastname']; ?>
)
                    </td>
                </tr>
                <tr>
                    <td width="100">
                        Amount
                    </td>
                    <td width="250">
                        <?php echo $this->_tpl_vars['amount']; ?>

                    </td>
                </tr>
                <tr>
                    <td width="100">
                        <input class="button" type="submit" value="Login">
                    </td>
                    <td width="250">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php else: ?>
    <h1>Errors</h1>
    <div class="line"></div>

    <div class="error">
        <ul>
            <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['foo']):
?>
            <li><?php echo $this->_tpl_vars['error_code'][$this->_tpl_vars['foo']]; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>

    <?php endif; ?>
</div>
