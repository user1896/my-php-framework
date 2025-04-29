<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
	'id' => $_POST['id']
])->findOrFail();

// Only the ownner of the note can delete it.
authorize( $note['user_id'] == $currentUserId );

$db->query('delete from notes where id = :id', [
	'id' => $_POST['id']
]);

// After we delete the note, we redirect to the page that shows all the notes:
header('location: /notes');
exit();