<?php

$title = 'Notes';

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');
// this $db variable should be accessible from anywhere in the app, the solution to that is to use "service containers".

$query = "select * from notes";
$notes = $db->query($query)->fetchAll();

require "views/notes.view.php";