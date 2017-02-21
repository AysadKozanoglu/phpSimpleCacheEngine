<?php
/*
     Aysad Kozaonglu
PHP simple efficient Cache engine
  email: aysadx@gmail.com

add this file at the bottom of your main script like index.php

*/

// Cache the contents to a file
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Send the output to the browser

?>
