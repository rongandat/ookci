<?php /* Smarty version 2.6.18, created on 2013-08-16 05:25:37
         compiled from home/zend_form.html */ ?>

<form action="<?php echo $this->_tpl_vars['post_link']; ?>
" method="POST">
    <?php $_from = $this->_tpl_vars['posts_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['foo']):
?>
    <input type="hidden" name="<?php echo $this->_tpl_vars['k']; ?>
" value="<?php echo $this->_tpl_vars['foo']; ?>
">
    <?php endforeach; endif; unset($_from); ?>
    <input type="submit" />
</form>