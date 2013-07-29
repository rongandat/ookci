<?php /* Smarty version 2.6.18, created on 2013-07-29 10:40:24
         compiled from home/login.html */ ?>
<div class="loginform">
    <?php if ($this->_tpl_vars['admin_id'] > 0): ?>
    <div><?php echo $this->_tpl_vars['TEXT_LOGGED']; ?>
</div>
    <?php endif; ?>
    <div class="title"> <img src="images/logo.png" width="112" height="35" /></div>
    <div class="body">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form id="form1" name="form1" method="post" action="<?php echo $this->_tpl_vars['action_login']; ?>
">
            <label class="log-lab">Username</label>
            <input name="username"  value="<?php echo $this->_tpl_vars['username']; ?>
" type="text" class="login-input-user"/>
            <label class="log-lab">Password</label>
            <input name="password"  type="password" type="password" class="login-input-pass"/>
            <input type="submit" name="button" id="button" value="Login" class="button"/>
        </form>
    </div>
</div>