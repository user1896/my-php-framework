<?php

require 'functions.php';
/*
	PHP offers a powerful function called parse_url() that takes a URL as input and returns an associative 
	array containing the parsed components. ex:
*/
$url = "https://www.youtube.com:8080/feed/subscriptions?param1=value1&param2=value2#section2";
$my_parsed_url = parse_url($url);
// mydebug($my_parsed_url);
/*
	results:
	array(6) {
		["scheme"]=> string(5) "https"
		["host"]=> string(15) "www.youtube.com"
		["port"]=> int(8080)
		["path"]=> string(19) "/feed/subscriptions"
		["query"]=> string(27) "param1=value1¶m2=value2"
		["fragment"]=> string(8) "section2"
	}
	
	Now When we try to create a router we use ["path"] to determine the path, so we don't have to worry about the host
	if it's a localhost or a server provider, and we don't have to worry about the query or anything else. ex:
*/
if( parse_url( $_SERVER["REQUEST_URI"] )["path"] === "/" ){
	echo 'welcome home';
}

/////////////////////

$uri = parse_url( $_SERVER["REQUEST_URI"] )["path"];

if($uri === '/') {
	require 'controllers/index.php';
}
else if ($uri === '/about') {
	require 'controllers/about.php';
} else if ($uri === '/contact') {
	require 'controllers/contact.php';
} else {
	echo 'what is wrong';
}
