<?php

// A playground to interact with the Container.

use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function() {
	// bind the key 'Core\Database'to a function that is responsible for building up a database object
	$config = require base_path('config.php');
	return new Database($config['database'], 'root', 'lalaseadel44');
});

$db = $container->resolve('Core\Databaseh');
