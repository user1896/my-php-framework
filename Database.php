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

	public function find() {
		return $this->statement->fetch();
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