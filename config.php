<?php

// We extract the "$config" variable into its own file where we have one version of that file for local develepment,
// and a different version for production.

return [
	'host' => 'localhost',
	'port' => '3306',
	'dbname' => 'myphpapp',
	'charset' => 'utf8mb4'
];