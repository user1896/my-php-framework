<?php

require 'functions.php';

$uri = $_SERVER["REQUEST_URI"];

// if($uri == '/my-php-framework/'){
if($uri == '/'){
	require 'controllers/index.php';
}
else 
// mydebug($uri);
if ($uri == '/about') {
	// echo 'inside';
	require 'controllers/about.php';
}

if ($_SERVER["REQUEST_URI"] == '/rr') {
	echo 'inside';
}

echo 'hello thereee';