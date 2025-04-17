<?php

class Database {
	private $connection;
	private $statement;

	public function __construct($config, $username = 'root', $password = '') {
		$dsn = 'mysql:'.http_build_query($config,'',';');
		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}

	public function query($query, $params = []) {
		$this->statement = $this->connection->prepare($query);

		$this->statement->execute($params);

		return $this;
	}

	// We wrap PHP PDO's fetch() method inside our own fetch method(we call it find())
	// This way we'll have control over fetch() and we can add more functionality to it.
	// For example if it didn't fetch anything and the result is false, make it abort() to the 404 page.
	// This is better than writting this logic outside of fetch() while it always needs it.
	public function find() { // My own fetch method
		return $this->statement->fetch(); // that calls PHP PDO's fetch() method.
	}

	public function findOrFail() {
		$result = $this->find();

		// if $query is false that means the result doesn't exist.
		if( !$result ) {
			abort();
		}

		return $result;
	}
}