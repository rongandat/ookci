<?php
include('includes/page_init.php');
// MAIN PAGE CONTENT

if (is_file(_CURRENT_MODULE . '/' . _CURRENT_PAGE . _PAGE_EXTENDSION)) {
    include(_CURRENT_MODULE . '/' . _CURRENT_PAGE . _PAGE_EXTENDSION);
} else {
    $_html_main_content = 'Access Define or Page Not Exist!';
}

//die('please come back soon! we are updating our system..'. PAGE_LOGIN);
?>
<html>
    <head>
        <meta http-equiv="Content-Language" content="en-us">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <META NAME="Keywords" CONTENT="private, digital currency,ecurrency,e-currency,payment system, payment processor,payment gateway,api,merchant,merchant payment solution,online banking,money,transfer,finance service,payment service,safely store funds,buy,sell,exchange,forex,casino,sports betting,poker,on-line">
        <META name="description" content="Oldest, safest and most popular payment processor operating in World Wide and serving millions all around a world. Store your funds privately in gold, Euro or USD. Use e-GlobalCash digital money in on-line casinos, poker rooms, sports betting, forex or in any other on-line store.">
        <title><?php echo $page_title != '' ? $page_title : SITE_NAME; ?></title>
        <style>
            pageHeading { margin: 0 0 21px; color: #CE0701; font-size: 18px; padding-top: 3px; }

            form i {
                font-weight: bold;
                color: #CE0701;
            }
        </style>
        <script type="text/javascript" src="includes/js/general.js"></script>
        <script type="text/javascript" src="../includes/js/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="style.css" />
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="ie.css" />
        <![endif]-->

        <!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
        <!--[if IE 8]><html class="ie8"><link rel="stylesheet" type="text/css" href="ie8.css" /><![endif]-->
        <?php
//module header settings load
        include('includes/module_header_load.php');
        ?>
    <body >
        <div class="wrapper" id="main">
            <?php include(_INCLUDES_DIR . 'header.php'); ?>
            <div class="main-container">
                <div class="main-conent">
                    <div class="main-content-center">
                        <?php echo $_html_main_content; ?>
                    </div>

                </div>
                <div class="right-content">
                    <?php include(_INCLUDES_DIR . 'right.php'); ?>
                </div>
                <div class="clear"></div>
                <?php include(_INCLUDES_DIR . 'bottom.php'); ?>
            </div>
            <div id="footer">
                <?php include(_INCLUDES_DIR . 'footer.php'); ?>
            </div>
        </div>

    </body>

</html>