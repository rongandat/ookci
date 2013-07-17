<?php
	include('includes/page_init.php');
		
	
	if (is_file(_CURRENT_ADMIN_MODULE.'/'._CURRENT_ADMIN_PAGE._PAGE_EXTENDSION) ) {
		include(_CURRENT_ADMIN_MODULE.'/'._CURRENT_ADMIN_PAGE._PAGE_EXTENDSION);
	} else {
		$_html_main_content	= 'Access Define or Page Not Exist!';
	}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_NAME; ?></title>
<link rel="stylesheet" type="text/css" href="css-javascript/main.css">

</head>

		<?php  
  					// MAIN PAGE CONTENT
					
			echo $_html_main_content;
				
  		?>
</html>
