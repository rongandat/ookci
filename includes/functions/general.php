<?php

// Function to get the client ip address

function get_client_ip() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}

function passgen($len)
{
	$pass = "";
	
	if($len > 5 && $len < 17)
	{
		srand((double) microtime() * 1000000);
		for($i=0;$i<12;$i++)	{	$pass .= chr(rand(0,255));	}
		$pass = substr(base64_encode($pass), 0, $len);
	}
	return $pass;
}

// nl2br() prior PHP 4.2.0 did not convert linefeeds on all OSs (it only converted \n)
  function tep_convert_linefeeds($from, $to, $string) {
    if ((PHP_VERSION < "4.0.5") && is_array($from)) {
      return ereg_replace('(' . implode('|', $from) . ')', $to, $string);
    } else {
      return str_replace($from, $to, $string);
    }
  }
  

  function tep_mail($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address, $html_email=false) {

    // Instantiate a new mail object
    $message = new email(array('X-Mailer: E-goldexJp Mailer'));

    // Build the text version
    $text = strip_tags($email_text);// edit by donghp 27/03/2012
	
    if ($html_email) {
      $message->add_html($email_text, $text);
    } else {
      $message->add_text($text);
    }

    // Send message
    $message->build_message();
    $message->send($to_name, $to_email_address, $from_email_name, $from_email_address, $email_subject);
  }



////
// Return all HTTP GET variables, except those passed as a parameter
  function tep_get_all_get_params($exclude_array = array('module','page')) {
    global $_GET;

    if (!is_array($exclude_array)) $exclude_array = array();

    $get_url = '';
    if (is_array($_GET) && (sizeof($_GET) > 0)) {
      reset($_GET);
      while (list($key, $value) = each($_GET)) {
        if ( (strlen($value) > 0) && ($key != tep_session_name()) && ($key != 'error') && (!in_array($key, $exclude_array)) && ($key != 'x') && ($key != 'y') ) {
          $get_url .= $key . '=' . rawurlencode(stripslashes($value)) . '&';
        }
      }
    }

    return $get_url;
  }


////
// Return all HTTP GET variables, except those passed as a parameter
  function tep_get_params($exclude_array = '') {
    global $_GET;

    if (!is_array($exclude_array)) $exclude_array = array();

    $get_url = '';
    if (is_array($_GET) && (sizeof($_GET) > 0)) {
      reset($_GET);
      while (list($key, $value) = each($_GET)) {
        if ( (strlen($value) > 0) && ($key != tep_session_name()) && ($key != 'error') && (!in_array($key, $exclude_array)) && ($key != 'x') && ($key != 'y') ) {
          $get_url .= $key . '=' . rawurlencode(stripslashes($value)) . '&';
        }
      }
    }

    return $get_url;
  }
  
 function tep_array_to_string($array, $exclude = '', $equals = '=', $separator = '&') {
    if (!is_array($exclude)) $exclude = array();

    $get_string = '';
    if (sizeof($array) > 0) {
      while (list($key, $value) = each($array)) {
        if ( (!in_array($key, $exclude)) && ($key != 'x') && ($key != 'y') ) {
          $get_string .= $key . $equals . $value . $separator;
        }
      }
      $remove_chars = strlen($separator);
      $get_string = substr($get_string, 0, -$remove_chars);
    }

    return $get_string;
  }
  
////
// Parse the data used in the html tags to ensure the tags will not break
  function tep_parse_input_field_data($data, $parse) {
    return strtr(trim($data), $parse);
  }

  function tep_output_string($string, $translate = false, $protected = false) {
    if ($protected == true) {
      return htmlspecialchars($string);
    } else {
      if ($translate == false) {
        return tep_parse_input_field_data($string, array('"' => '&quot;'));
      } else {
        return tep_parse_input_field_data($string, $translate);
      }
    }
  }

  function tep_output_string_protected($string) {
    return tep_output_string($string, false, true);
  }

  function tep_sanitize_string($string) {
    $string = ereg_replace(' +', ' ', trim($string));

    return preg_replace("/[<>]/", '_', $string);
  }
  
  
// This funstion validates a plain text password with an
// encrpyted password
  function validate_password($plain, $encrypted) {
    if (tep_not_null($plain) && tep_not_null($encrypted)) {
// split apart the hash / salt
      $stack = explode(':', $encrypted);

      if (sizeof($stack) != 2) return false;

      if (md5($stack[1] . $plain) == $stack[0]) {
        return true;
      }
    }

    return false;
  }

////
// This function makes a new password from a plaintext password. 
  function encrypt_password($plain) {
    $password = '';

    for ($i=0; $i<10; $i++) {
      $password .= rand();
    }

    $salt = substr(md5($password), 0, 2);

    $password = md5($salt . $plain) . ':' . $salt;

    return $password;
  }
  
  
  function tep_not_null($value) {
    if (is_array($value)) {
      if (sizeof($value) > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0)) {
        return true;
      } else {
        return false;
      }
    }
  }  
  
  
// Stop from parsing any further PHP code
  function tep_exit() {
   tep_session_close();
   exit();
  }  
// Redirect to another page or site
  function tep_redirect($url) {
	echo '<script language="javascript" >window.location="'.$url.'"; </script>'; 
  // header('Location: ' . $url);
    tep_exit();
  }  
  
  
// "On the Fly" Auto Thumbnailer using GD Library, servercaching and browsercaching
// Scales product images dynamically, resulting in smaller file sizes, and keeps
// proper image ratio. Used in conjunction with imagethumb.php t/n generator.
function tep_image($src, $alt = '', $width = '', $height = '', $params = '', $usedefaultsize=false) {

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
		
						$image = '<img src="'.get_html_link('imagethumb.php','img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height)). '" ';
					}
		
				} elseif (IMAGE_REQUIRED == 'false') {
					return '';
				}
			} else {
				$image = '<img src="'.get_html_link('imagethumb.php','img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height)) . '" ';
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


// "On the Fly" Auto Thumbnailer using GD Library, servercaching and browsercaching
// Scales product images dynamically, resulting in smaller file sizes, and keeps
// proper image ratio. Used in conjunction with imagethumb.php t/n generator.
function tep_image_source($src, $width = '', $height = '', $usedefaultsize=false) {

  // if no file exists display the 'no image' file
  if (!is_file($src)) {
  	$src = "images/no_image.jpg";
  }
    // Set default image variable and code
    $image_source = $src;

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
		
						$image_source = get_html_link('imagethumb.php','img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height));
					}
		
				} elseif (IMAGE_REQUIRED == 'false') {
					return '';
				}
			} else {
				$image_source = get_html_link('imagethumb.php','img=' . $src . '&w=' .
						tep_output_string($width) . '&h=' . tep_output_string($height));
			}
    }

  
    return $image_source;
}
	
			
////
// Wrapper function for round()
  function tep_round($number, $precision) {
    if (strpos($number, '.') && (strlen(substr($number, strpos($number, '.')+1)) > $precision)) {
      $number = substr($number, 0, strpos($number, '.') + 1 + $precision + 1);

      if (substr($number, -1) >= 5) {
        if ($precision > 1) {
          $number = substr($number, 0, -1) + ('0.' . str_repeat(0, $precision-1) . '1');
        } elseif ($precision == 1) {
          $number = substr($number, 0, -1) + 0.1;
        } else {
          $number = substr($number, 0, -1) + 1;
        }
      } else {
        $number = substr($number, 0, -1);
      }
    }

    return $number;
  }				  
  
 // Force user login  
function user_force_login($user_id, $username)
{
  		global $login_userid, $login_username;
		
		$login_userid	=	$user_id;
		$login_username	=	$username;
		
		tep_session_register('login_userid');
		tep_session_register('login_username');
}


/**
 * checkLogin - Checks if the user has already previously
 * logged in, and a session with the user has already been
 * established. Also checks to see if user has been remembered.
 * If so, the database is queried to make sure of the user's 
 * authenticity. Returns true if the user has logged in.
 */
function checkLogin(){
   /* Check if user has been remembered */
   if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_password'])){
   	
      if(! confirmUser($_COOKIE['login_email'], $_COOKIE['login_password'])){
         /* Variables are incorrect, user not logged in */
		 unset($_SESSION['login_userid']);
		 unset($_SESSION['login_username']);		 

         return false;
      }
      return true;
   }
   /* User not logged in */
   else{
      return false;
   }
}

function confirmUser($login_email,$login_password)
{	global $login_userid, $login_username;

	$user_query	=	db_query("SELECT user_id, user_username, user_password FROM ". _TABLE_USERS." WHERE member_email='".$login_email."'");
	if (db_num_rows($user_query)>0) { // email passed
		// check password
		$user_info	=	db_fetch_array($user_query);
		if (!validate_password($login_password, $user_info['user_password'])) {	// wrong password
			return false;
		} else { // password passed ==> correct account
			$login_userid	=	$member_info['user_id'];
			$login_username	=	$member_info['user_username'];
			
			tep_session_register('login_userid');
			tep_session_register('login_username');			
			return true;	
		}
		
	}  else {
		return false;
	}
}


  function tep_setcookie($name, $value = '', $expire = 0, $path = '/', $domain = '', $secure = 0) {
    setcookie($name, $value, $expire, $path, (tep_not_null($domain) ? $domain : ''), $secure);
  }
  
   
  
////
// Return a random value
  function tep_rand($min = null, $max = null) {
    static $seeded;

    if (!isset($seeded)) {
      mt_srand((double)microtime()*1000000);
      $seeded = true;
    }

    if (isset($min) && isset($max)) {
      if ($min >= $max) {
        return $min;
      } else {
        return mt_rand($min, $max);
      }
    } else {
      return mt_rand();
    }
  }
  


// get all site languages
  function get_all_languages() {
    $languages_query = db_query("select language_id, language_name, language_code, language_image, language_directory from " . _TABLE_LANGUAGES . " order by sort_order");
    while ($languages = db_fetch_array($languages_query)) {
      $languages_array[] = array('id' => $languages['language_id'],
                                 'name' => $languages['language_name'],
                                 'code' => $languages['language_code'],
                                 'image' => $languages['language_image'],
                                 'directory' => $languages['language_directory']);
    }

    return $languages_array;
  } 
  

// get faq tree
  function tep_get_faq_tree($parent_id = '0', $spacing = '', $exclude = '', $faq_tree_array = '', $include_itself = false) {
    global $languages_id;

    if (!is_array($faq_tree_array)) $faq_tree_array = array();
    if ( (sizeof($faq_tree_array) < 1) && ($exclude != '0') ) $faq_tree_array = array(''=> '');

    if ($include_itself) {
      $faq_query = db_query("select cd.faqs_name from " . _TABLE_FAQS_DESCRIPTION . " cd where cd.language_id = '" . (int)$languages_id . "' and cd.faqs_id = '" . (int)$parent_id . "'  and is_topic");
      $faq = db_fetch_array($faq_query);
      $faq_tree_array[$parent_id]= $faq['faqs_name'];
    }

    $faqs_query = db_query("select c.faqs_id, cd.faqs_name, c.parent_id from " . _TABLE_FAQS . " c, " . _TABLE_FAQS_DESCRIPTION . " cd where c.faqs_id = cd.faqs_id and cd.language_id = '" . (int)$languages_id . "' and c.parent_id = '" . (int)$parent_id . "' and is_topic order by c.sort_order, cd.faqs_name");
    while ($faqs = db_fetch_array($faqs_query)) {
      if ($exclude != $faqs['faqs_id']) $faq_tree_array[$faqs['faqs_id']]=$spacing . $faqs['faqs_name'];
      $faq_tree_array = tep_get_faq_tree($faqs['faqs_id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $faq_tree_array);
    }

    return $faq_tree_array;
  }      


function tep_create_random_value($length, $type = 'mixed') {
	if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;
	
	$rand_value = '';
	while (strlen($rand_value) < $length) {
	  if ($type == 'digits') {
		$char = tep_rand(0,9);
	  } else {
		$char = chr(tep_rand(0,255));
	  }
	  if ($type == 'mixed') {
		if (eregi('^[a-z0-9]$', $char)) $rand_value .= $char;
	  } elseif ($type == 'chars') {
		if (eregi('^[a-z]$', $char)) $rand_value .= $char;
	  } elseif ($type == 'digits') {
		if (ereg('^[0-9]$', $char)) $rand_value .= $char;
	  }
	}
	
	return $rand_value;
}  

function generate_account_number()
{
	while (true) {
		$new_account_number	=		tep_create_random_value(7,'digits');	
		//check if the account number is existed
		$check_account_number	=	db_fetch_array(db_query("SELECT count(*) as total FROM "._TABLE_USERS." WHERE account_number='".$new_account_number."'"));
		if ($check_account_number['total']==0) return $new_account_number;
	}
}
?>