<?php

class Database {
	private $connection;

	public function __construct($config, $username = 'root', $password = '') {
		// The "$config" values should be danamic in case we push this website to production, so we need to push them up
		// outside the class where we instantiate the class.
		// What that means is that instead of hard coding them here inside, we catch them as a parameter.

		$dsn = 'mysql:'.http_build_query($config,'',';');
		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	public function query($query) {
		$statement = $this->connection->prepare($query);
		$statement->execute();

		return $statement;
	}
}