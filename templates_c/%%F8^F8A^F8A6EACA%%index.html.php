<?php /* Smarty version 2.6.18, created on 2013-07-24 10:14:10
         compiled from home/index.html */ ?>
<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['post']):
?>
<?php $this->assign('i', $this->_tpl_vars['k']%4); ?>
<?php $this->assign('odd', $this->_tpl_vars['k']%2); ?>


<div class="product <?php if ($this->_tpl_vars['odd'] == 1): ?>padding-right0<?php endif; ?>">
    <div class="heading">
        <div class="image">
            <img src="<?php echo $this->_tpl_vars['post']['thumbnail']; ?>
"/>
        </div>
        <h1><?php echo $this->_tpl_vars['post']['title']; ?>
</h1>
        <div class="clear"></div>
    </div>
    <div class="content">
        <?php echo $this->_tpl_vars['post']['content']; ?>
...
    </div>


    <?php if ($this->_tpl_vars['i'] == 0): ?>
    <a href="<?php echo $this->_tpl_vars['post']['href']; ?>
" class="learn_more green">learn more about <?php echo $this->_tpl_vars['post']['title']; ?>
</a>
    <?php elseif ($this->_tpl_vars['i'] == 1): ?>
    <a href="<?php echo $this->_tpl_vars['post']['href']; ?>
" class="learn_more yellow">learn more about <?php echo $this->_tpl_vars['post']['title']; ?>
</a>
    <?php elseif ($this->_tpl_vars['i'] == 2): ?>
    <a href="<?php echo $this->_tpl_vars['post']['href']; ?>
" class="learn_more butterfly_blue">learn more about <?php echo $this->_tpl_vars['post']['title']; ?>
</a>
    <?php else: ?>
    <a href="<?php echo $this->_tpl_vars['post']['href']; ?>
" class="learn_more red">learn more about <?php echo $this->_tpl_vars['post']['title']; ?>
</a>
    <?php endif; ?>

</div>

<?php endforeach; endif; unset($_from); ?>