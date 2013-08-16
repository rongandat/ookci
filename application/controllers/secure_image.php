<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Secure_image extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        ob_clean();
        $image_handle = imagecreatetruecolor(150, 60);
        $white = imagecolorallocate($image_handle, 255, 255, 255);
        $rndm = imagecolorallocate($image_handle, rand(64, 192), rand(64, 192), rand(64, 192));
        imagefill($image_handle, 0, 0, $white);

        $fontName = PUBLICPATH . "/fonts/elephant.ttf";
        $myX = 15;
        $myY = 30;
        $angle = 0;
        for ($x = 0; $x <= 100; $x++) {
            $myX = rand(1, 148);
            $myY = rand(1, 58);
            imageline($image_handle, $myX, $myY, $myX + rand(-5, 5), $myY + rand(-5, 5), $rndm);
        }


        $myCryptBase = tep_create_random_value(50, 'digits');

        $secure_image_hash_string = "";

        for ($x = 0; $x <= 4; $x++) {
            $dark = imagecolorallocate($image_handle, rand(5, 128), rand(5, 128), rand(5, 128));
            $capChar = substr($myCryptBase, rand(1, 35), 1);
            $secure_image_hash_string .= $capChar;
            $fs = rand(20, 26);
            $myX = 15 + ($x * 28 + rand(-5, 5));
            $myY = rand($fs + 2, 55);
            $angle = rand(-30, 30);
            ImageTTFText($image_handle, $fs, $angle, $myX, $myY, $dark, $fontName, $capChar);
        }

        $this->session->set_userdata('secure_image_hash_string', $secure_image_hash_string);
        header("Content-type: image/jpeg");

        imagejpeg($image_handle, "", 95);
        imagedestroy($image_handle);
        die();
    }

}