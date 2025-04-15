<?php

class Database {
	private $connection;

	public function __construct($config, $username = 'root', $password = '') {
		$dsn = 'mysql:'.http_build_query($config,'',';');
		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	public function query($query, $params = []) {
		$statement = $this->connection->prepare($query);

		// Inside the execute() method is where we bind the sql query parameters.
		// It's an array where the first value is the first parameter and so on.
		$statement->execute($params);

		return $statement;
	}
}