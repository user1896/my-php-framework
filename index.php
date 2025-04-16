<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database'], 'root', 'lalaseadel44');

$id = $_GET['id'];

$query = "select * from notes where user_id = :id";
$posts = $db->query($query, ['id' => $id])->fetchAll();

foreach($posts as $post) {
	echo "<li>$post[body]</li>";
}
