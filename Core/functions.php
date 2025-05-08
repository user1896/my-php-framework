<?php

use Core\Response;

function mydebug($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";

	die();
}

function abort($code = 404) {
	http_response_code($code);

	// we should have a safety mechanism here to check if the page "views/{$code}.php" exists
	require base_path("views/{$code}.php");

	die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
	if(!$condition){
		abort($status);
	}
}

// A helper function for declaring a path that is relative to the root of the project
function base_path($path) {
	return BASE_PATH . $path; // we return BASE_PATH concatinated with the path provided when the function is called.
	// Now we don't have to use the string concatnation syntax to concatinate the BASE_PATH, just call this function.
}

// A helper function that loads the view file directly (we know that a view file always start with "views/")
function view($path, $attributes = []) {
	extract($attributes);
	require base_path('views/' . $path);
	// When we require a file like this by putting it inside a fucntion, that means that it is local inside the
	// function, so variables outside the function are undefined, for example "$title" here will be undefined 
	// inside "views\index.views.php" so when the file "views\partials\main.php" use "$title" we get an error.

	// one solution is to make the variable "$title" global inside the function view(), but we want our function
	// to be generic, some views may not need $title, so the solution is to send variables as a parameter to
	// the function.

	// The function extract() accepts an array and turns it into a set of variables, where the name of the variable
	// is the key and the value of the variable is the value associated with the key.
	// for example we sent an array ['title' => 'Home','uri' => $uri], this will create two variables:
	// $title = 'Home';	and $uri = $uri (value of $uri is passed from the router.php file).

	// //////////////////////

	// Why Making variables out of scope for a file we "require" is better than having all our variables accessable
	// inside of it?
	// From the begining, the first time I learned about the key-word "require" and learned that all my variables
	// are now accessable inside the file that I required I knew that this aproche is flawed.
	// Because I worked with components in React, and if you want the compponent to have an entry that changes how
	// the component renders we send it as a parameter, you don't access global variables inside a component, so
	// we can use our component anywhere.
	// Now that we wrapped our "require" inside the function "view" basically we made our views behave the same as
	// components.
}

function login($user) {
	$_SESSION['user'] = [
		'email' => $user['email']
	];

	// it is recommended to regenerate the session_id everytime we login
	session_regenerate_id(true);
}

function logout() {
	// First clear out the super global $_SESSION
	$_SESSION = [];

	// Destroy all data registered to a session in the server
	session_destroy();

	// clear out the cookie in the browser
	// for that we have to update the cookie and set its corresponding expiration

	// First we grab the current session cookie information:
	$params = session_get_cookie_params();

	setcookie('PHPSESSID', 'my sssss', time() + 3600, $params['path'], $params['domain']);
	// - First parameter: When we logged in and created a session, by default the name of the session is: 'PHPSESSID'
	// is all browsers So here when we create a session with the same name, we're overriding the one that was created.
	// - Second parameter: We give our cookie an empty value: ''.
	// - Third parameter: we set its experation date a time in the past (time()-3600) so it expires immediately.
}