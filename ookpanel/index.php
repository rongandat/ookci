<?php
include('includes/page_init.php');

// MAIN PAGE CONTENT

if (is_file(_CURRENT_ADMIN_MODULE . '/' . _CURRENT_ADMIN_PAGE . _PAGE_EXTENDSION)) {
    include(_CURRENT_ADMIN_MODULE . '/' . _CURRENT_ADMIN_PAGE . _PAGE_EXTENDSION);
} else {
    $_html_main_content = 'Access Define or Page Not Exist!';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo SITE_NAME; ?></title>
        

        <link href="templates/css/sitestyle.css" rel="stylesheet" type="text/css" />


        <!-- Reset -->
        <link rel="stylesheet" type="text/css" href="includes/style/reset.css" /> 
        <!-- Main Style File -->
        <link rel="stylesheet" type="text/css" href="includes/style/root.css" /> 
        <!-- Grid Styles -->
        <link rel="stylesheet" type="text/css" href="includes/style/grid.css" /> 
        <!-- Typography Elements -->
        <link rel="stylesheet" type="text/css" href="includes/style/typography.css" /> 
        <!-- Jquery UI -->
        <link rel="stylesheet" type="text/css" href="includes/style/jquery-ui.css" />
        <!-- Jquery Plugin Css Files Base -->
        <link rel="stylesheet" type="text/css" href="includes/style/jquery-plugin-base.css" />

        <!--[if IE 7]>	  <link rel="stylesheet" type="text/css" href="includes/style/ie7-style.css" />	<![endif]-->

        <!-- jquery base -->
        <script type="text/javascript" src="includes/js/jquery.min.js"></script>
        <script type="text/javascript" src="includes/js/jquery-ui-1.8.11.custom.min.js"></script>
        <!-- jquery plugins settings -->
        <script type="text/javascript" src="includes/js/jquery-settings.js"></script>
        <!-- toggle -->
        <script type="text/javascript" src="includes/js/toogle.js"></script>
        <!-- tipsy -->
        <script type="text/javascript" src="includes/js/jquery.tipsy.js"></script>
        <!-- uniform -->
        <script type="text/javascript" src="includes/js/jquery.uniform.min.js"></script>
        <!-- Jwysiwyg editor -->
        <script type="text/javascript" src="includes/js/jquery.wysiwyg.js"></script>
        <!-- table shorter -->
        <script type="text/javascript" src="includes/js/jquery.tablesorter.min.js"></script>
        <!-- raphael base and raphael charts -->
        <script type="text/javascript" src="includes/js/raphael.js"></script>
        <script type="text/javascript" src="includes/js/analytics.js"></script>
        <script type="text/javascript" src="includes/js/popup.js"></script>
        <!-- fullcalendar -->
        <script type="text/javascript" src="includes/js/fullcalendar.min.js"></script>
        <!-- prettyPhoto -->
        <script type="text/javascript" src="includes/js/jquery.prettyPhoto.js"></script>
        <!-- Jquery.UI Base -->
        <script type="text/javascript" src="includes/js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="includes/js/jquery.ui.mouse.js"></script>
        <script type="text/javascript" src="includes/js/jquery.ui.widget.js"></script>
        <!-- Slider -->
        <script type="text/javascript" src="includes/js/jquery.ui.slider.js"></script>
        <!-- Date Picker -->
        <script type="text/javascript" src="includes/js/jquery.ui.datepicker.js"></script>
        <!-- Tabs -->
        <script type="text/javascript" src="includes/js/jquery.ui.tabs.js"></script>
        <!-- Accordion -->
        <script type="text/javascript" src="includes/js/jquery.ui.accordion.js"></script>
        <!-- Google Js Api / Chart and others -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <!-- Date Tables -->
        <script type="text/javascript" src="includes/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../includes/js/general.js"></script>
        <?php
        //module header settings load
        include('includes/module_header_load.php');
        ?>
    </head>
    <body>
        <?php if(empty($admin_login_username)){ ?>
        <?php echo $_html_main_content; ?>
        <?php }else{ ?>
        <div class="wrapper">
            <?php include(_ADMIN_INCLUDES . 'header.php'); ?>

            <!-- START MAIN -->
            <div id="main">
                <?php include(_ADMIN_INCLUDES . 'sidebar.php'); ?>
                <div id="page" style="z-index: 850;">
                    <?php echo $_html_main_content; ?>
                </div>
                <div class="clear" style="z-index: 740;"></div>
            </div>
            <?php include(_ADMIN_INCLUDES . 'footer.php'); ?>
        </div>
        <?php } ?>
    </body>
</html>
