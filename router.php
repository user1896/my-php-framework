<?php

$uri = parse_url( $_SERVER["REQUEST_URI"] )["path"];

$routes = [
	'/' => 'controllers/index.php',
	'/about' => 'controllers/about.php',
	'/contact' => 'controllers/contact.php',
	'/notes' => 'controllers/notes.php',
	'/note' => 'controllers/note.php',
];

function abort($code = 404) {
	http_response_code($code);

	// we should have a safety mechanism here to check if the page "views/{$code}.php" exists
	require "views/{$code}.php";

	die();
}

function routeToController($uri, $routes){
	if(array_key_exists($uri, $routes)){
		require $routes[$uri];
	} else {
		abort();
	}
}

routeToController($uri, $routes);