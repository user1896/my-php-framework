<?php

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

require base_path('Core/router.php');

// Namespacing
// In our folder 'Core' we want to create namespacing for each of the classes.