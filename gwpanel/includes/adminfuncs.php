<?php

 function get_admin_link($page = '', $parameters = '', $add_session_id = true) {
    global $request_type, $session_started, $SID;
	
    if (!tep_not_null($page)) {
     	$page	=	PAGE_DEFAULT;
    }

     $link = _HTTP_ADMIN_SITE_ROOT.'/?';  

    if (tep_not_null($parameters)) {
      $link .= $page . '&' . tep_output_string($parameters);
      $separator = '&';
    } else {
      $link .= $page;
      $separator = '&';
    }

    while ( (substr($link, -1) == '&') || (substr($link, -1) == '?') ) $link = substr($link, 0, -1);

// Add the session ID when moving from different HTTP and HTTPS servers, or when SID is defined
    if ( ($add_session_id == true) && ($session_started == true) && (SESSION_FORCE_COOKIE_USE == 'False') ) {
      if (tep_not_null($SID)) {
        $_sid = $SID;
      } elseif ( ( ($request_type == 'NONSSL') && ($connection == 'SSL') && (ENABLE_SSL == true) ) || ( ($request_type == 'SSL') && ($connection == 'NONSSL') ) ) {
        if (HTTP_COOKIE_DOMAIN != HTTPS_COOKIE_DOMAIN) {
          $_sid = tep_session_name() . '=' . tep_session_id();
        }
      }
    }
 
    if (isset($_sid)) {
      $link .= $separator . tep_output_string($_sid);
    }

    return $link;
  }  
  
  
// "On the Fly" Auto Thumbnailer using GD Library, servercaching and browsercaching
// Scales product images dynamically, resulting in smaller file sizes, and keeps
// proper image ratio. Used in conjunction with imagethumb.php t/n generator.
function tep_frontend_image($src, $alt = '', $width = '', $height = '', $params = '', $usedefaultsize=false) {

  // if no file exists display the 'no image' file
  if (!is_file($src)) {
  	$src = "images/no_image.jpg";
  }
    // Set default image variable and code
    $image = '<img src="' . $src . '"';

    // Don't calculate if the image is set to a "%" width
    if (strstr($width,'%') == false || strstr($height,'%') == false) {
        $dont_calculate = 0;
    } else {
        $dont_calculate = 1;
    }

    // Dont calculate if a pixel image is being passed (hope you dont have pixels for sale)
    if (!strstr($image, 'pixel')) {
        $dont_calculate = 0;
    } else {
        $dont_calculate = 1;
    }

	
    // Do we calculate the image size?
    if (CONFIG_CALCULATE_IMAGE_SIZE && !$dont_calculate) {

		if (!$usedefaultsize) { // not use default size, do image caculate
				// Get the image's information
				if ($image_size = @getimagesize($src)) {
		
					$ratio = $image_size[1] / $image_size[0];
		
					// Set the width and height to the proper ratio
					if (!$width && $height) {
						$ratio = $height / $image_size[1];
						$width = intval($image_size[0] * $ratio);
					} elseif ($width && !$height) {
						$ratio = $width / $image_size[0];
						$height = intval($image_size[1] * $ratio);
					} elseif (!$width && !$height) {
						$width = $image_size[0];
						$height = $image_size[1];
					}
		
					// Scale the image if not the original size
					if ($image_size[0] != $width || $image_size[1] != $height) {
						$rx = $image_size[0] / $width;
						$ry = $image_size[1] / $height;
		
						if ($rx < $ry) {
							$width = intval($height / $ratio);
						} else {
							$height = intval($width * $ratio);
						}
		
						$image = '<img src="'._HTTP_SITE_ROOT.'imagethumb.php?img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height) . '"';
					}
		
				} elseif (IMAGE_REQUIRED == 'false') {
					return '';
				}
			} else {
				$image = '<img src="'._HTTP_SITE_ROOT.'imagethumb.php?img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height) . '"';
			}
    }

    // Add remaining image parameters if they exist
    if ($width) {
        $image .= ' width="' . tep_output_string($width) . '"';
    }

    if ($height) {
        $image .= ' height="' . tep_output_string($height) . '"';
    }

    if (tep_not_null($params)) $image .= ' ' . $params;

    $image .= ' border="0" alt="' . tep_output_string($alt) . '"';

    if (tep_not_null($alt)) {
        $image .= ' title="' . tep_output_string($alt) . '"';
    }

    $image .= '>';

    return $image;
}
			  
  // get OANDA exchange rate
 function quote_oanda_currency($code, $base = DEFAULT_CURRENCY) {
    $page = file('http://www.oanda.com/convert/fxdaily?value=1&redirected=1&exch=' . $code .  '&format=CSV&dest=Get+Table&sel_list=' . $base);

    $match = array();

    preg_match('/(.+),(\w{3}),([0-9.]+),([0-9.]+)/i', implode('', $page), $match);

    if (sizeof($match) > 0) {
      return $match[3];
    } else {
      return false;
    }
  }

// get XE exchange rate 
  function quote_xe_currency($to, $from = DEFAULT_CURRENCY) {
    $page = file('http://www.xe.net/ucc/convert.cgi?Amount=1&From=' . $from . '&To=' . $to);

    $match = array();

    preg_match('/[0-9.]+\s*' . $from . '\s*=\s*([0-9.]+)\s*' . $to . '/', implode('', $page), $match);

    if (sizeof($match) > 0) {
      return $match[1];
    } else {
      return false;
    }
  }  
  
  

/**
 * checkAdminAutoLogin - Checks if the admin has already previously
 * logged in, and a session with the admin has already been
 * established. Also checks to see if admin has been remembered.
 * If so, the database is queried to make sure of the admin's 
 * authenticity. Returns true if the admin has logged in.
 */
function checkAdminAutoLogin(){
   /* Check if user has been remembered */
   if(isset($_COOKIE['admin_login_username']) && isset($_COOKIE['admin_login_password'])){
   	
      if(! confirmAdminAccess($_COOKIE['admin_login_username'], $_COOKIE['admin_login_password'])){
         /* Variables are incorrect, user not logged in */
		 unset($_SESSION['admin_login_id']);
		 unset($_SESSION['admin_login_username']);		 

         return false;
      }
      return true;
   }
   /* User not logged in */
   else{
      return false;
   }
}
  
function confirmAdminAccess($login_username,$login_password)
{	global $admin_id, $admin_username;
			$sql_admin =	"SELECT admin_id, admin_username, admin_password FROM ". _TABLE_ADMINS." WHERE admin_email='".$login_username."'";
			$admin_query	=	db_query($sql_admin);
			if (db_num_rows($admin_query)>0) { // email passed
				// check password
				$admin_info	=	db_fetch_array($admin_query);
				if (!validate_password($login_password, $admin_info['admin_password'])) {	// wrong password
					return false;
				} else { // password passed ==> correct account
					$admin_login_id	=	$admin_info['admin_id'];
					$admin_login_username	=	$admin_info['admin_username'];
					
					tep_session_register('admin_login_id');
        			tep_session_register('admin_login_username');
					
					return true;					
			
				}
				
			}  else {
				return false;
			}
}  


////
// Alias function for Store configuration values in the Administration Tool
  function tep_cfg_select_option($select_array, $key_value, $key = '') {
    $string = '';

    for ($i=0, $n=sizeof($select_array); $i<$n; $i++) {
      $name = ((tep_not_null($key)) ? 'configuration[' . $key . ']' : 'configuration_value');

      $string .= '<br><input type="radio" name="' . $name . '" value="' . $select_array[$i] . '"';

      if ($key_value == $select_array[$i]) $string .= ' CHECKED';

      $string .= '> ' . $select_array[$i];
    }

    return $string;
  }

////
// Alias function for module configuration keys
  function tep_mod_select_option($select_array, $key_name, $key_value) {
    reset($select_array);
    while (list($key, $value) = each($select_array)) {
      if (is_int($key)) $key = $value;
      $string .= '<br><input type="radio" name="configuration[' . $key_name . ']" value="' . $key . '"';
      if ($key_value == $key) $string .= ' CHECKED';
      $string .= '> ' . $value;
    }

    return $string;
  } 
  

?>