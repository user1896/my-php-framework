<?php

// A playground to interact with the Container.

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function() {
	// bind the key 'Core\Database'to a function that is responsible for building up a database object
	$config = require base_path('config.php');
	
	// We make the connexion to our database here only, then se do App::resolve(Database::class) to get it anywhere.
	return new Database($config['database'], 'root', 'lalaseadel44');
});

App::setContainer($container);
