<?php

// This 'config.php' file is not exclusive to the database cridentials, it can hold other config values for the entire
// app, so we should give the database config values a key to differentiate them from other cridentials

return [
	'database' => [
		'host' => 'localhost',
		'port' => '3306',
		'dbname' => 'myphpapp',
		'charset' => 'utf8mb4'
	],
	// In the future if we have other specific configurations we can put them here:
	// ... other configs
	// For example external APIs that give tokens that we need to reference in the code, and they often unique dependant
	// if we're in a local setting or a production setting.
];