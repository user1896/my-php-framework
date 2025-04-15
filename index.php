<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database'], 'root', 'lalaseadel44');

$id = $_GET['id'];

// Instead of using question marks we can use keys (also called "wild cards") to be more specific
// and the code becomes more readable:
$query = "select * from posts where id = :id";
$posts = $db->query($query, ['id' => $id])->fetchAll();

foreach($posts as $post) {
	echo "<li>$post[title]</li>";
}
