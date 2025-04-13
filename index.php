<?php

require 'functions.php';

$uri = parse_url( $_SERVER["REQUEST_URI"] )["path"];

// We refactor the code by creating an array that associate every "url" with a corresponding "controller",
// instead of using the "if else" statement.

$routes = [
	'/' => 'controllers/index.php',
	'/about' => 'controllers/about.php',
	'/contact' => 'controllers/contact.php',
];

if(array_key_exists($uri, $routes)){
	// The "array_key_exists()" function takes a key (which is our "$uri" variable) and checks if it exists in an associative
	// array (which is "$routes")
	// Now if($uri == '/') then we require 'controllers/index.php' which is $routes[$uri]:
	require $routes[$uri];
}