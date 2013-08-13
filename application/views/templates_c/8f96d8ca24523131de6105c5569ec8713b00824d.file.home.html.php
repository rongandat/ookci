<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 05:47:46
         compiled from "application\views\templates\home.html" */ ?>
<?php /*%%SmartyHeaderCode:124045209ac62de4158-15144509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f96d8ca24523131de6105c5569ec8713b00824d' => 
    array (
      0 => 'application\\views\\templates\\home.html',
      1 => 1376281802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124045209ac62de4158-15144509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'k' => 0,
    'odd' => 0,
    'post' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209ac62f251d6_11186978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209ac62f251d6_11186978')) {function content_5209ac62f251d6_11186978($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value%4, null, 0);?>
<?php $_smarty_tpl->tpl_vars["odd"] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value%2, null, 0);?>


<div class="product <?php if ($_smarty_tpl->tpl_vars['odd']->value==1){?>padding-right0<?php }?>">
    <div class="heading">
        <div class="image">
            <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['thumbnail'];?>
"/>
        </div>
        <h1><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h1>
        <div class="clear"></div>
    </div>
    <div class="content">
        <?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
...
    </div>


    <?php if ($_smarty_tpl->tpl_vars['i']->value==0){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['href'];?>
" class="learn_more green">learn more about <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a>
    <?php }elseif($_smarty_tpl->tpl_vars['i']->value==1){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['href'];?>
" class="learn_more yellow">learn more about <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a>
    <?php }elseif($_smarty_tpl->tpl_vars['i']->value==2){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['href'];?>
" class="learn_more butterfly_blue">learn more about <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a>
    <?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['href'];?>
" class="learn_more red">learn more about <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a>
    <?php }?>

</div>

<?php } ?>
<?php }} ?>