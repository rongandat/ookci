<?php
    // generate secure turing number
	$secure_image_hash_string	= tep_create_random_value(5,'digits');	
	tep_session_register('secure_image_hash_string');

	$_html_main_content = $smarty->fetch('services/index.html');
?>