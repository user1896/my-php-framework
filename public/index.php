<?php

// start a session
session_start();

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.

require BASE_PATH . 'Core/functions.php';

// automatically load classes when we instanciate them:
// The function 'spl_autoload_register()' triggers whenever we instantiate a class.
spl_autoload_register( function($className) {
	// We're using namespaces in our classes files, so when we instantiate the class "Database" the path 
	// will be "Core\Database" with a "back-slash \" and not a "forword-slash /", so we replase "/" with "\".
	$className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	// In PHP, a "backslash \" is an escape sequence, so we need to write two backslashes "\\" to have one.
	// "DIRECTORY_SEPARATOR" is what ever our system uses to separate files, in windows it is "/".
 	require base_path($className . '.php');
} );

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');
// this will go to 'routes.php' and do: $router->get() and $router->delete(), so it will populate the protected
// attribute '$router->routes' in the class 'Router'.

// grab the current uri:
$uri = parse_url( $_SERVER['REQUEST_URI'] )['path'];

// grab the method:
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// First check if $_POST['_method'] exists (it's set and not null), if it does it means it's a special request
// not supported by <form>, like DELETE or PUT, so use it, otherwise use $_SERVER['REQUEST_METHOD'].
// (because for special requests like DELETE we create a hidden input with the name="_method")

// route the current uri to wherever it needs to go:
$router->route($uri, $method);

// Flush the $_SESSION's key that holds the errors:
unset($_SESSION['_flush']);