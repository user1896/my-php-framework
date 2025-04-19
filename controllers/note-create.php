<?php

require 'Validator.php';

$title = 'Create a new note';

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = [];

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

require "views/note-create.view.php";