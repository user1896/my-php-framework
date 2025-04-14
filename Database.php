<?php
// We made the name of this file "Database" instead of "database" like the other files with a small "d", because
// it contains one "class" called "Database".
class Database {
	private $connection;

	public function __construct() {
		$dsn = "mysql:host=localhost;port=3306;user=root;password=lalaseadel44;dbname=myphpapp;charset=utf8mb4";
		$this->connection = new PDO($dsn);
	}
	public function query($query) {
		$statement = $this->connection->prepare($query);
		$statement->execute();

		return $statement;
	}
}