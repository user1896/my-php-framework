<?php

// Refactor the Database class to make it more flexible.
class Database {
	private $connection;

	public function __construct() {
		// We must not hard code the $dns values, because they will change once we push this website into production.
		// we create a config variable that holds them:
		$config = [
			'host' => 'localhost',
			'port' => '3306',
			'dbname' => 'myphpapp',
			'charset' => 'utf8mb4'
		];

		// Now we must turn this $config array into a string that we put inside the $dsn.
		// http_build_query($config,'',';'); // the third argument (";") is the separator
		// It returns a URL-encoded string
		// Result: host=localhost;port=3306;dbname=myphpapp;charset=utf8mb4

		// so our $dsn is a concatination of 'mysql' + the encoded string from $config:
		$dsn = 'mysql:'.http_build_query($config,'',';');
		$this->connection = new PDO($dsn, 'root', 'lalaseadel44', [
			// We can say that we want "FETCH_ASSOC" here, instead of specifying it in the "fetchAll()" (or "fetch") method.
			// and it will apply across all the results we fetch instead of specifying it everytime we call "query()".
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	public function query($query) {
		$statement = $this->connection->prepare($query);
		$statement->execute();

		return $statement;
	}
}