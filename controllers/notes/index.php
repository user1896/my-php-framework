<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes";
$notes = $db->query($query)->myFetchAll();

view('notes/index.view.php', [
	'title' => 'Notes',
	'uri' => $uri,
	'notes' => $notes
]);