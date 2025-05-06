<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = "select * from notes";
$notes = $db->query($query)->myFetchAll();

view('notes/index.view.php', [
	'title' => 'Notes',
	'notes' => $notes
]);