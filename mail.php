<?php
// The message
$message = "pham hong thang\n 04/06/1983\n Devsoftvn";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send
mail('thanghp@devsoftvn.com', 'My Cron job', $message);
?> 
