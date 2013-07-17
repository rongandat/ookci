<?php
error_reporting(1);
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
        <?php
//module header settings load
        include('includes/module_header_load.php');
        ?>
    <body >
        <div class="wrapper" id="main">
            <div id="header">
                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber39" bgcolor="#000000" height="90">
                    <tr>
                        <td width="100%" height="90">
                            <div align="center">
                                <center>
                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800" id="AutoNumber56" height="90">
                                        <tr>
                                            <td width="242" height="90">
                                                <p align="center">
                                                <img border="0" src="https://www.e-globalcash.net/images/title.gif" alt="e-GlobalCash.com" width="198" height="65" align="left"></td>
                                            <td width="145" height="90" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="111%" id="AutoNumber57">
                                                    <tr>
                                                        <td width="11%" height="35" valign="bottom">&nbsp;</td>
                                                        <td width="89%" height="35" valign="bottom"><b><font color="#FFFFFF" face="Tahoma" size="2">
                                                                <a href="<?php echo get_href_link(PAGE_DEFAULT, '', 'SSL'); ?>"<font color="#FFFF00">
                                                                    <font color="#FFFF00">Home</font></a></font></font></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="11%" height="20" valign="bottom">&nbsp;</td>
                                                        <td width="89%" height="20" valign="bottom"><b><font color="#FFFFFF" face="Tahoma" size="2">
                                                                <a href="<?php echo get_href_link(PAGE_SIGNUP, '', 'SSL'); ?>">
                                                                    <font color="#FFFF00">Create</font><span lang="ja"><font color="#FFFF00"> Account</font></span></a></font></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="11%" height="20" valign="bottom">
                                                            <p align="center">
                                                            <img border="0" src="https://e-globalcash.net/images/key.gif" width="10" height="12"></td>
                                                        <td width="89%" height="20" valign="bottom"><b><font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja"> 
                                                                    <a href="<?php echo get_href_link(PAGE_LOGIN, '', 'SSL'); ?>">
                                                                        <font color="#FFFF00">Log in</font></a></span></font></b></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="413" height="90" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber58">
                                                    <tr>
                                                        <td width="100%">
                                                            <p align="right"><font color="#FFFF00">&nbsp; </font>          
                                                                <font style="font-size: 9pt" face="Tahoma" color="#FFFF00"><b>
                                                                    largest payment processor and money transfer system since 2009</b></font></b><p></p>
                                                            </h1></td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100%">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </div>

                        </td>
                    </tr>
                </table>
                <?php include(_INCLUDES_DIR . 'header.php'); ?>
            </div>
            <div class="main-content">
                <div class="main-content-left">
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber46" bgcolor="#333333">
                        <tr>
                            <td width="100%">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="148" id="AutoNumber48">
                                    <tr>
                                        <td width="23%" height="32" valign="bottom" align="center">
                                            <img border="0" src="images/are_you.gif" width="16" height="16"></td>
                                        <td width="77%" height="32" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_EXCHANGERS); ?>"><font color="#FFFFFF">Our 
                                                    Exchangers</font></a></span></font></td>
                                    </tr>
                                    <tr>
                                        <td width="23%" height="25" valign="bottom" align="center">&nbsp;</td>
                                        <td width="77%" height="25" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_MERCHANTS); ?>"><font color="#FFFFFF">Our 
                                                    Merchants</font></a></span></font></td>
                                    </tr>
                                    <tr>
                                        <td width="23%" height="25" valign="bottom" align="center">&nbsp;</td>
                                        <td width="77%" height="25" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_SERVICES); ?>"><font color="#FFFFFF">Our 
                                                    Services</font></a></span></font></td>
                                    </tr>
                                    <tr>
                                        <td width="23%" height="25" valign="bottom" align="center">&nbsp;</td>
                                        <td width="77%" height="25" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_SECURITY); ?>"><font color="#FFFFFF">Security Measures</font></a></span></font></td>
                                    </tr>
                                    <tr>
                                        <td width="23%" height="25" valign="bottom" align="center">&nbsp;</td>
                                        <td width="77%" height="25" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_APPLICATIONS); ?>"><font color="#FFFFFF">SCI, 
                                                    API Guide</font></a></span></font></td>
                                    </tr>
                                    <tr>
                                        <td width="23%" height="25" valign="bottom" align="center">&nbsp;</td>
                                        <td width="77%" height="25" valign="bottom">
                                            <font color="#FFFFFF" face="Tahoma" size="2"><span lang="ja">
                                                <a href="<?php echo get_href_link(PAGE_FAQ); ?>"><font color="#FFFFFF">FAQ</font></a></span></font></td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber47">
                                    <tr>
                                        <td width="100%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="main-content-center">
                    <?php echo $_html_main_content; ?>
                </div>
                <div class="clear"></div>
            </div>
            <div id="footer">
                <div align="center">
                    <center>
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="830" id="AutoNumber40">
                            <tr>
                                <td width="100%" height="30" valign="bottom">
                                    <p align="center"><font face="Tahoma" size="2" color="#FFFFFF">
                                        <span lang="ja"><a href="<?php echo get_href_link(PAGE_CORPORATE); ?>"><font color="#FFFFFF">Corporate</font></a> | 
                                            <a href="<?php echo get_href_link(PAGE_TERMS); ?>"><font color="#FFFFFF">Terms of Service</font></a> | 
                                            <a href="<?php echo get_href_link(PAGE_PRIVACY); ?>"><font color="#FFFFFF">Privacy Policy</font></a> | 
                                            <a href="<?php echo get_href_link(PAGE_AML); ?>"><font color="#FFFFFF">Anti - 
                                                money Laundering Policy</font></a> | <a href="<?php echo get_href_link(PAGE_CONTACT_US); ?>">
                                                <font color="#FFFFFF">Contact us</font></a></span></font>
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" height="22" valign="bottom">
                                    <p align="center"><font face="Tahoma" size="2" color="#FFFFFF">© 2002 — 
                                        2010 e-GlobalCash All rights reserved. </font></td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>

    </body>

</html>