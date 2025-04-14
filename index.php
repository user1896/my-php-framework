<?php

require 'functions.php';

require 'router.php';

// Connect to our MySQL database
// To do that we're gonna use "PDO" (PHP Data Objects)

// initialise PDO by ceating a new instance of the PDO class
// the constructor takes a string called "dsn" (Data Source Name).
// which is a string that declares our connexion to the database.
// it contains information like the "database name", the "port", the "host", the characterset (like utf8) ...

$dsn = "mysql:host=localhost;port=3306;user=root;password=lalaseadel44;dbname=myphpapp;charset=utf8mb4";
$pdo = new PDO($dsn);

// We can also remove the "user" and "password" from $dsn and provide them as parameters in PDO's constructor:
// $dsn = "mysql:host=localhost;port=3306;dbname=myphpapp;charset=utf8mb4";
// $pdo = new PDO($dsn, 'root', 'lalaseadel44');
// The first param is the "dsn", the second is the username (which is "root" here), and the third is the "password".

// We handle situations when PHP can't connect:

// Prepare a new query
$statement = $pdo->prepare("select * from posts");
// $statement is a prepared query statement.

// Now we send our statement to mysql to get executed.
$statement->execute();

// Now we need to fetch the results:
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
// They are numbers of ways to fetch the results, and "PDO::FETCH_ASSOC" is one of them which will return the results
// as an associative array.

// We're done, now we can display the results in our website:
foreach($posts as $post) {
	echo "<li>$post[title]</li>"; // assuming the table "posts" in our database has a column called "title".
}
