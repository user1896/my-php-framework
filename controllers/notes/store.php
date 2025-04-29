<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

if(!Validator::string($_POST['body'], 1, 50)) {
	$errors['body'] = 'Enters a body of 0 to 50 characters';
}

// If there are validation errors:
if( !empty($errors) ) {
	// then we display the errors in 'create.view.php'
	return view('notes/create.view.php', [ // we return it so we don't execute the rest of the code if there're errors
		'title' => 'Create a new note',
		'uri' => $uri,
		'errors' => $errors,
	]);
}

// If we reach this point then it's same to post.
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
	'body' => $_POST['body'],
	'user_id' => 1
]);

header('location: /notes');
die();