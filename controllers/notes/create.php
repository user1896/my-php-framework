<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(!Validator::string($_POST['body'], 1, 50)) {
		$errors['body'] = 'Enters a body of 0 to 50 characters';
	}

	// If there are no validation errors:
	if( empty($errors) ) {
		// then it is safe to post into the database:
		$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
			'body' => $_POST['body'],
			'user_id' => 1
		]);
	}

}

view('notes/create.view.php', [
	'title' => 'Create a new note',
	'uri' => $uri,
	'errors' => $errors,
]);