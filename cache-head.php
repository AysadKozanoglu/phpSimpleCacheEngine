<?php

/*
#	Aysad Kozanoglu
#    PHP simple efficient Cache engine
#     email: aysadx@gmail.com
#
# usage: 
# open your general php file like (index.php)
#
#
# and include following
#
# include ("cache-head.php");
#
# ... your code content
#
# include ("cache-foot.php");
#
#
*/


/*generally*/
$url       = $_SERVER["SCRIPT_NAME"];
$break     = Explode('/', $url);
$file      = $break[count($break) - 1];

/*configs*/
$cachePath = '/var/www/html/site/cache/'; // this path must be chmod -R 777 
$cachetime = 18000; // seconds


$cachefile = $cachePath.'cached-'.substr_replace($file ,"",-4).'.html';

// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
    exit;
}

//stating output buffer
ob_start();
?>
