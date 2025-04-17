<?php

$title = "Note $_GET[id]";

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes where id = :id";

$note = $db->query($query, [
	'id' => $_GET['id']
])->findOrFail();

$currentUserId = 1;

// Only the ownner of the note can access it.
if($note['user_id'] != $currentUserId){
	abort(Response::FORBIDDEN);
}

require "views/note.view.php";