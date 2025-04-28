<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$currentUserId = 1;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Form was submitted, delete the current note.

	// If we want to delete a note, first we have to check the note and check the user_id if he's the one who
	// created the note
	$note = $db->query('select * from notes where id = :id', [
		'id' => $_GET['id']
	])->findOrFail();
	
	// Only the ownner of the note can delete it.
	authorize( $note['user_id'] == $currentUserId );

	$db->query('delete from notes where id = :id', [
		'id' => $_POST['id']
	]);

	// After we delete the note, we redirect to the page that shows all the notes:
	header('location: /notes');
	exit();
} else {
	$note = $db->query('select * from notes where id = :id', [
		'id' => $_GET['id']
	])->findOrFail();
	
	// Only the ownner of the note can access it.
	authorize( $note['user_id'] == $currentUserId );
	
	view('notes/show.view.php', [
		'title' => "Note $_GET[id]",
		'uri' => $uri,
		'note' => $note
	]);
}