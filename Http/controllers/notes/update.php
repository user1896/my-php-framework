<?php

// find the corresponding note

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
	'id' => $_POST['id']
])->findOrFail();

// authorise that the current user can edit the note
authorize( $note['user_id'] == $currentUserId );

// validate the form
$errors = [];

if(!Validator::string($_POST['body'], 1, 50)) {
	$errors['body'] = 'Enters a body of 0 to 50 characters';
}

// If there are validation errors:
if( !empty($errors) ) {
	// then we display the errors in 'edit.view.php'
	return view('notes/edit.view.php', [ // we return it so we don't execute the rest of the code if there're errors
		'title' => 'Edit Note',
		'errors' => $errors,
		'note' => $note
	]);
}

// if no validation errors, update the note
$db->query('update notes set body = :body where id = :id', [
	'id' => $_POST['id'],
	'body' => $_POST['body'],
]);

// redirect the user
redirect("/note?id=$_POST[id]");