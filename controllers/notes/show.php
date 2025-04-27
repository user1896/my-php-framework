<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes where id = :id";

$note = $db->query($query, [
	'id' => $_GET['id']
])->findOrFail();

$currentUserId = 1;

// Only the ownner of the note can access it.
authorize( $note['user_id'] == $currentUserId );

view('notes/show.view.php', [
	'title' => "Note $_GET[id]",
	'uri' => $uri,
	'note' => $note
]);