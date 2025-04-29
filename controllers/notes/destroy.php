<?php

use Core\App;
use Core\Database;

// App::container() will return an object of type container.
// We have binded the key 'Core\Database' to intiating a Database object, the method resolve() will return it.
$db = App::container()->resolve(Database::class);
// className::class == a string path to the full namespace path to the class
// so Core\Database::class == 'Core\Database'

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