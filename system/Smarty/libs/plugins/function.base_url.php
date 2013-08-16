
<?php

function smarty_function_base_url($params = null, $template)
{
   $CI =& get_instance();
   return $CI->url->base_url();   
} 