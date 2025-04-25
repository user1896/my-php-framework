<?php

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.

require BASE_PATH . 'Core/functions.php';

// automatically load classes when we instanciate them:
// The function 'spl_autoload_register()' triggers whenever we instantiate a class.
spl_autoload_register( function($className) {
	require base_path('Core/' . $className . '.php');
} );

require base_path('Core/router.php');
