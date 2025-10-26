<?php

// start a session

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.

// automatically load classes when we instanciate them:
require BASE_PATH . 'vendor/autoload.php';

session_start();

require BASE_PATH . 'Core/functions.php';

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
try{
	// We wrape whatever route we get with a "try{}" block, so any form we have in whatever page will throw an exception
	$router->route($uri, $method);
} catch (ValidationException $exception) {
	// here the validation failed, we need to reload the loging page, following the PRG pattern, first we flash
	// the errors and the old form's attributes that we want to keep for the next render:
	Session::flash('errors', $exception->errors);

	// Remember the email to populate the input if the user failed the process of form validation or authentication.
	// the user should always re-enter the password so we don't remember it.
	// the convention name to remmeber the old form data is to call it "old".
	Session::flash('old', $exception->old);

	// Not every form redirects back to the "login" page, so the redirect here must be dynamic.
	return redirect($router->previousUrl());
};

// unFlash the $_SESSION's key that holds the errors:
Session::unflash();