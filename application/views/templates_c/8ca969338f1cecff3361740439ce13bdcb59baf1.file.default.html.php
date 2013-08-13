<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 09:57:59
         compiled from "application\views\templates\common\default.html" */ ?>
<?php /*%%SmartyHeaderCode:225265209a9fe94a575-77749422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ca969338f1cecff3361740439ce13bdcb59baf1' => 
    array (
      0 => 'application\\views\\templates\\common\\default.html',
      1 => 1376380677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225265209a9fe94a575-77749422',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5209a9feb63cd0_79038519',
  'variables' => 
  array (
    'page_title' => 0,
    'user_session' => 0,
    'class' => 0,
    'action' => 0,
    'post_info' => 0,
    'body_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5209a9feb63cd0_79038519')) {function content_5209a9feb63cd0_79038519($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Language" content="en-us">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <META NAME="Keywords" CONTENT="private, digital currency,ecurrency,e-currency,payment system, payment processor,payment gateway,api,merchant,merchant payment solution,online banking,money,transfer,finance service,payment service,safely store funds,buy,sell,exchange,forex,casino,sports betting,poker,on-line">
        <META name="description" content="Oldest, safest and most popular payment processor operating in World Wide and serving millions all around a world. Store your funds privately in gold, Euro or USD. Use e-GlobalCash digital money in on-line casinos, poker rooms, sports betting, forex or in any other on-line store.">
        <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
        <script type="text/javascript" src="<?php echo base_url('public_html/default/js/general.js');?>
"></script>
        <script type="text/javascript" src="<?php echo base_url('public_html/default/js/jquery.min.js');?>
"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public_html/default/style.css');?>
" />
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public_html/default/ie.css');?>
" />
        <![endif]-->

        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('public_html/default/ie7.css');?>
" />
        <![endif]-->
        <!--[if IE 8]><html class="ie8">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('public_html/default/ie8.css');?>
" />
        <![endif]-->
    </head>
    <body>
        <?php if ($_smarty_tpl->tpl_vars['user_session']->value){?>
        <div id="header-login">
            <div class="top-header">
                <a class="logo" href="<?php echo site_url('home');?>
"><img src="<?php echo base_url('public_html/images/logo.png');?>
"/></a>
                <ul class="top-nav">
                    <li>
                        Welcome <strong><?php echo $_smarty_tpl->tpl_vars['user_session']->value['firstname'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['user_session']->value['lastname'];?>
</strong>
                    </li>
                    <li>
                        <a href="<?php echo site_url('account');?>
" style="text-transform: none"><strong><?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_number'];?>
 </strong>(<?php echo $_smarty_tpl->tpl_vars['user_session']->value['account_name'];?>
)</a> 
                    </li>
                    <li><a href="<?php echo site_url('home/logout');?>
">Logout</a> </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="nav">
                <div class="nav-content">
                    <ul>
                        <li>
                            <a href="<?php echo site_url('home');?>
" <?php if ($_smarty_tpl->tpl_vars['class']->value=='home'){?>  class="active" <?php }?>>Home</a>
                        </li>
                        <li>
                            <?php if ($_smarty_tpl->tpl_vars['class']->value=='account'&&$_smarty_tpl->tpl_vars['action']->value=='index'){?>
                            <a class="active" href="<?php echo site_url('account');?>
" >
                                Account
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo site_url('account');?>
" >
                                Account
                            </a>
                            <?php }?>
                        </li>
                        <li>
                            <?php if ($_smarty_tpl->tpl_vars['class']->value=='account'&&$_smarty_tpl->tpl_vars['action']->value=='personal'){?>
                            <a class="active" href="<?php echo site_url('account/personal');?>
" >
                                Profile
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo site_url('account/personal');?>
" >
                                Profile
                            </a>
                            <?php }?>
                        </li>
                        <li>
                            <?php if ($_smarty_tpl->tpl_vars['class']->value=='history'){?>
                            <a class="active" href="<?php echo site_url('account/history');?>
" >
                                History
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo site_url('account/history');?>
" >
                                History
                            </a>
                            <?php }?>
                        </li>
                        <li>
                            <?php if ($_smarty_tpl->tpl_vars['class']->value=='transfer'){?>
                            <a class="active" href="<?php echo site_url('transfer');?>
" >
                                Transfer
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo site_url('transfer');?>
" >
                                Transfer
                            </a>
                            <?php }?>
                        </li>
                    </ul>
                    <div class="search">
                        <form method="GET" action="">
                            <span>Search</span>
                            <input type="text" name="search" class="search-inut"/>
                            <input type="submit" value="Go" class="btn-search"/>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <?php if (($_smarty_tpl->tpl_vars['class']->value=='home')){?>
        <div id="header">
            <div class="top-header">
                <a href="<?php echo site_url('home');?>
" class="logo"><img src="<?php echo base_url('public_html/images/logo.png');?>
"/></a>
                <ul class="top-nav">
                    <li>
                        <a href="<?php echo site_url('home');?>
">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('register');?>
">Create Account</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('login');?>
">Log in</a>
                    </li>
                </ul>
            </div>
            <div class="nav">
                <div class="nav-content">
                    <ul>
                        <li><a href="<?php echo site_url('home');?>
" class="active">Home</a></li>

                        <li><a href="http://docs.ookcash.com/category/exchangers/">Exchangers</a></li>
                        <li><a href="http://docs.ookcash.com/products">Products</a></li>
                        <li><a href="http://docs.ookcash.com">Help</a></li>
                    </ul>
                    <div class="search">
                        <form method="GET" action="http://docs.ookcash.com">
                            <span>Search</span>
                            <input type="text" name="s" class="search-inut"/>
                            <input type="submit" value="Go" class="btn-search"/>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="banner">
                <div class="content-banner">
                    <div class="left-banner">
                        <h1><?php echo $_smarty_tpl->tpl_vars['post_info']->value['title'];?>
</h1>
                        <?php echo $_smarty_tpl->tpl_vars['post_info']->value['content'];?>

                        <a href="<?php echo site_url('register');?>
" class="button-create-account">Create free account</a>
                    </div>
                    <div class="right-banner">
                        <form action="<?php echo site_url('login');?>
" method="post" > 
                            <div class="heading blue">
                                Member login
                            </div>
                            <div class="login-form-header">
                                <input type="hidden" value="process" name="action">
                                <input type="text" name="account_number" id="account_number" autocomplete="off" placeholder="Acount number" class="input-login"/>
                                <input type="password" name="password" size="20" autocomplete="off" placeholder="Password" class="input-login"/>
                                <a class="forgot" href="<?php echo site_url('forgot');?>
">Forgot password?</a>
                                <input type="submit" class="btn-login" value="Login"/>
                            </div>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <div id="header-login">
            <div class="top-header">
                <a href="<?php echo site_url('home');?>
" class="logo"><img src="<?php echo base_url('public_html/images/logo.png');?>
"/></a>
                <ul class="top-nav">
                    <li>
                        <a href="<?php echo site_url('home');?>
">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('register');?>
">Create Account</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('login');?>
">Log in</a>
                    </li>
                </ul>
            </div>
            <div class="nav">
                <div class="nav-content">
                    <ul>
                        <li><a href="<?php echo site_url('home');?>
" <?php if (($_smarty_tpl->tpl_vars['class']->value=='home')){?> class="active" <?php }?>>Home</a></li>

                        <li><a href="http://docs.ookcash.com/category/exchangers/">Exchangers</a></li>
                        <li><a href="http://docs.ookcash.com/products">Products</a></li>
                        <li><a href="http://docs.ookcash.com">Help</a></li>
                    </ul>
                    <div class="search">
                        <form method="GET" action="http://docs.ookcash.com">
                            <span>Search</span>
                            <input type="text" name="s" class="search-inut"/>
                            <input type="submit" value="Go" class="btn-search"/>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <?php }?>
        <?php }?>




        <div class="wrapper" id="main">
            <div class="main-container">
                <div class="main-conent">
                    <div class="main-content-center">
                        <?php echo $_smarty_tpl->tpl_vars['body_html']->value;?>

                    </div>

                </div>
                <div class="right-content">
                    <?php echo $_smarty_tpl->getSubTemplate ('common/right.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
                <div class="clear"></div>
                <?php echo $_smarty_tpl->getSubTemplate ('common/bottom.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>

        </div>
        <div id="footer">
            <div class="footer-content">
                <div class="copyright">
                    Copyright &copy; 2013 OOKCASH
                </div>
                <div class="footer-info">

                    <h1>Customer word</h1>
                    <ul>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">Participate in out suvery</a></li>
                        <li><a href="#">Promotions</a></li>
                    </ul>
                </div>
                <div class="footer-info">
                    <h1>Get in touch</h1>
                    <ul>
                        <li><a href="#">Becomne a partner</a></li>
                        <li><a href="<?php echo site_url('contact_us');?>
">Contactus</a></li>
                        <li><a href="#">Sponsorship &  Support</a></li>
                        <li><a href="#">Prequest a callback</a></li>
                        <li><a href="#">Customer Assistance</a></li>
                    </ul>
                </div>
                <div class="footer-info">
                    <h1>Follow us</h1>
                    <ul>
                        <li><a href="#">Twiter</a></li>
                        <li><a href="#">Google</a></li>
                        <li><a href="#">Linkedin</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }} ?>