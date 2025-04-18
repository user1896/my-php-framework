<?php

$title = 'Create a new note';

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	// An array called $errors that hold all our errors.
	$errors = [];

	// did the user entered an empty string
	if(strlen($_POST['body']) == 0) {
		$errors['body'] = 'A body is required';
	}

	// preventing the user from posting something too big that is considered as junk:
	if(strlen($_POST['body']) > 250) { // we don't want a body bigger than 250 words.
		$errors['body'] = 'The body can not be more than 250 characters.';
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