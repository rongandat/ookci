<<<<<<< HEAD
<a href="http://pmcart.lc/index.php?page=sci&payee_account=U3156245&payer_account=&checkout_amount=20&checkout_currency=USD&cancel_url=aHR0cDovL21haWxib3gxLmpwL29yZGVyL2NhbmNlbC5odG1s&fail_url=aHR0cDovL21haWxib3gxLmpwL29yZGVyL2Vycm9yLmh0bWw=&success_url=aHR0cDovL3d3dy5tYWlsYm94MS5qcC9pbmRleC5waHA/bW9kdWxlPW9yZGVyJnBhZ2U9Y29uZmlybQ==&status_url=&status_method=GET"><img src="http://pmcart.lc/images/ookcash-button.png"/></a>
=======
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

header("Content-Type: image/png");
        $im = @imagecreate(110, 20)
                or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 0, 0, 0);
        $text_color = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 1, 5, 5, "A Simple Text String", $text_color);
        imagepng($im);
        imagedestroy($im);
        die;
?>
>>>>>>> branch 'master' of https://code.google.com/p/ookci/
