<?php

require 'functions.php';

require 'router.php';

// refactor the code that "connects to a database and execute a query" into a "class".

class Database {
	// We build up our "PDO" instance one time and then everytime we call query we reuse that same instance instead of
	// creating a new PDO instance everytime, so this logic goes inside the "constructor"
	private $connection;

	public function __construct() {
		$dsn = "mysql:host=localhost;port=3306;user=root;password=lalaseadel44;dbname=myphpapp;charset=utf8mb4";
		// We assing the PDO connection to the attribute "$connection" (we called it $pdo before refactoring to a class).
		$this->connection = new PDO($dsn);
	}
	public function query($query) {
		$statement = $this->connection->prepare($query);
		$statement->execute();

		return $statement;
	}
}

// create an instance of the Database class:
$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

foreach($posts as $post) {
	echo "<li>$post[title]</li>"; // assuming the table "posts" in our database has a column called "title".
}
