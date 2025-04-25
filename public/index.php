<?php

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.

require BASE_PATH . 'functions.php';

// Everytime I need access to a new class I have to require it withing public/index.php, it will be better
// if I auto load these classes when I instantiate them

// automatically load classes when we instanciate them:

// The function 'spl_autoload_register()' triggers whenever we instantiate a class.
// We can use it to describes how we should auto load classes that are not immediately available.
// It accepts a callback function as an argument, and this cb function takes a className as an argument, then we
// describe what we should do inside the body of the cb function when the class is instantiated.
spl_autoload_register( function($className) {
	require base_path($className . '.php');
	// (for example when we instantiate the class "Database" we want to require the file "Database.php")
	// and this is true for all of our classes, we declare them in a separate file then we instantiate them elsewhere.
} );

require base_path('router.php');