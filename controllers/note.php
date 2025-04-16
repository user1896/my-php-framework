<?php

$title = "Note $_GET[id]";

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes where id = :id";

$note = $db->query($query, [
	'id' => $_GET['id']
])->fetch();

// if $query is false that means the note doesn't exist.
// Here we don't show a PHP warning in our website, instead we load the 404 page.
if(!$note) {
	abort();
}

// If the current user in not the one who wrote the note then he should not be able to access it.
if($note['user_id'] != 1){ // let's suppose that user "1" is the current user (until we implement authentication).
	abort(403); // the http status code "403" is called "forbiden" it is used when the user is not authorise to access data.
}

require "views/note.view.php";