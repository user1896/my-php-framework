<?php

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.

require BASE_PATH . 'functions.php';

// automatically load classes when we instanciate them:
// The function 'spl_autoload_register()' triggers whenever we instantiate a class.
spl_autoload_register( function($className) {
	require base_path('Core/' . $className . '.php');
} );

require base_path('router.php');

// We have classes like "Database", "Response", and "Validator" that are not uniquely related to the app we're
// building, they are generic, so it will be better if we separate them into there own file, we call it "Core".