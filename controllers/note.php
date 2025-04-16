<?php

$title = "Note $_GET[id]";

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes where id = :id";

$note = $db->query($query, [
	'id' => $_GET['id']
])->fetch();

// if $query is false that means the note doesn't exist.
if(!$note) {
	abort();
}

// A special number is a number that has significance and special meaning that is not explicitly declared.
// Below we have two special numbers: "1" and "403".
// Now imagive 6 months from now you come back to this code and you forget what those numbers mean.
// One solution is to extract them into variables.

$currentUserId = 1;

// When it comes to status codes (like 403) its better to create a new file (class) that handles all of them.
// We call it Response.php

// Only the ownner of the note can access it.
if($note['user_id'] != $currentUserId){
	abort(Response::FORBIDDEN);
}

require "views/note.view.php";