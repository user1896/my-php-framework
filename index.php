<?php

require 'functions.php';

$uri = parse_url( $_SERVER["REQUEST_URI"] )["path"];

$routes = [
	'/' => 'controllers/index.php',
	'/about' => 'controllers/about.php',
	'/contact' => 'controllers/contact.php',
];

if(array_key_exists($uri, $routes)){
	require $routes[$uri];
} else {
	// Now what if the user enters a uri that we're not responding to.
	// We use "response status codes", they are a way for us to respond to certain requests, and 404 is the response
	// we give when the page is not found, for example when a successful response we give the code 200.

	http_response_code(404);
	echo 'Sorry, not found';
	die(); // kill the execution.

	// Now if the "$uri" doesn't exists we print 'Sorry, not found', then we terminate the program.
	// And if we open the developer's tool and check the console we see the response:
	// "the server responded with a status of 404"
}