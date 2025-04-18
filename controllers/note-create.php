<?php

$title = 'Create a new note';

// We didn't specify the action method, so by default the same page will be the destination for the POST request.
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	mydebug($_POST);
}

require "views/note-create.view.php";