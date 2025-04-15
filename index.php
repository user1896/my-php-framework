<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database'], 'root', 'lalaseadel44');

$id = $_GET['id'];

// Replace user inputs with a question mark to prevent SQL injections.
$query = "select * from posts where id = ?";
$posts = $db->query($query, [$id])->fetchAll();

// Now if a user is malicious and he tries to inject a harmful sql query into the url, for example deleting my users:
// ex: "https://website.com/?id=2; drop table users"
// only id=2 will go into the question mark, and the rest of the sql injection won't be used,
// and "id" can't be equal to "drop table users" so this url "?id=drop table users" is not valid.
// This way we're protected.

foreach($posts as $post) {
	echo "<li>$post[title]</li>";
}
