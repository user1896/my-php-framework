<?php

require 'functions.php';

$uri = parse_url( $_SERVER["REQUEST_URI"] )["path"];

$routes = [
	'/' => 'controllers/index.php',
	'/about' => 'controllers/about.php',
	'/contact' => 'controllers/contact.php',
];

// Refactor "abort()" to handle any response status code:
function abort($code = 404) { // Set the default value for the parameter as "404" if the user didn't specify anything.
	http_response_code($code);

	// we should have a safety mechanism here to check if the page "views/{$code}.php" exists
	// but now we just assume it exists:
	require "views/{$code}.php";

	die();
}

if(array_key_exists($uri, $routes)){
	require $routes[$uri];
} else {
	abort();
}