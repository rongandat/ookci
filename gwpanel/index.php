<?php
	include('includes/page_init.php');
		
	// MAIN PAGE CONTENT
	
	if (is_file(_CURRENT_ADMIN_MODULE.'/'._CURRENT_ADMIN_PAGE._PAGE_EXTENDSION) ) {
		include(_CURRENT_ADMIN_MODULE.'/'._CURRENT_ADMIN_PAGE._PAGE_EXTENDSION);
	
	} else {
		$_html_main_content	=	'Access Define or Page Not Exist!';
	}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<meta name="keywords" content="Thanks, Thanks by rate, rate, thanks rate" />
<title><?php echo SITE_NAME; ?></title>
<script type="text/javascript" src="../includes/js/general.js"></script>
<script type="text/javascript" src="../includes/js/jquery.min.js"></script>
<style type="text/css">
<!--
body,td,th {
	font-family: tahoma;
	font-size: 11px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="templates/css/sitestyle.css" rel="stylesheet" type="text/css" />

<?php 
	//module header settings load
include('includes/module_header_load.php'); ?>
</head>
<body class="bgbody_main">
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td align="left" ><?php include(_ADMIN_INCLUDES.'header.php'); ?>	</td>
  </tr>
  
  <tr >
    <td  width="100%" align="left" valign="top" class="bgbody"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <!--DWLayoutTable-->
      <tr>
        <td align="left" valign="top" class="bgleft"><table width="150" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="9" align="left" valign="top"><?php include(_ADMIN_INCLUDES.'left.php'); ?></td>
              </tr>
          <tr>
            
              </tr>
          </table></td>
          <td width="100%" style="padding-left:10px;" valign="top" class="mainpagebg"><?php
 			
				// display main content
				echo $_html_main_content;
  		?></td>
        </tr>
    </table>
	</td>
  </tr>  
  <tr><td width="100%"><?php include(_ADMIN_INCLUDES.'footer.php'); ?></td></tr>
</table>
</body>
</html>
