<?php

 
// "On the Fly" Auto Thumbnailer using GD Library, servercaching and browsercaching
// Scales product images dynamically, resulting in smaller file sizes, and keeps
// proper image ratio. Used in conjunction with imagethumb.php t/n generator.
function smarty_function_dev_image($params, &$smarty) 
{ //$src, $alt = '', $width = '', $height = '', $params = '') {

		    foreach($params as $_key => $_val) {
        		switch($_key) {
						case 'src':
							$src	=	(string)$_val;
							break;
						case 'width':
							$width	=	(int)$_val;
							break;
						case	'height':
							$height	=	(int)$_val;
							break;
							
						case	'alt':
							$alt	=	(string)$_val;
							break;
						case	'params':
							$params	=	(string)$_val;
							break;
					}            
			}
			
  // if no file exists display the 'no image' file
  if (!is_file(_SITE_ROOT.$src)) {
  	$src = _IMAGES_WS_DIR."noimage.gif";
  }
    // Set default image variable and code
    $image =  $src;

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

                $image = get_html_link('imagethumb.php','img=' . $src . '&w=' .
                tep_output_string($width) . '&h=' . tep_output_string($height) ). '"';
            }

        } elseif (IMAGE_REQUIRED == 'false') {
            return '';
        }
    }

    return $image;
}

?>