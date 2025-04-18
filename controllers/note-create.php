<?php

$title = 'Create a new note';

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
		'body' => $_POST['body'],
		'user_id' => 1
	]);
}
// We should not let the user have full control of what they can post into the database.
// Instead of writting a note, what if they deside to enter something like this:
// <script>alert('my note is an alert, haha')</script>
// then everytime other users load the page to see other peoples' notes they will get this "alert".
// a js script can be much more sinister, or a css class that breaks the website layout.
// a user should definatly not get this level of power.

// There are two solutions to this:
// The First is to sanitize the body of the note before it enters the database.
// The Second is to allow it to enter the database but then always escape it when displaying it.

require "views/note-create.view.php";