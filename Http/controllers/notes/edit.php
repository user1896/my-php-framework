<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user')['id'];

$note = $db->query('select * from notes where id = :id', [
	'id' => $_GET['id']
])->findOrFail();

// Only the ownner of the note can access it.
authorize( $note['user_id'] == $currentUserId );

view('notes/edit.view.php', [
	'title' => 'Edit Note',
	'errors' => [],
	'note' => $note
]);