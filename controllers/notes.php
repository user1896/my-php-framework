<?php

$title = 'Notes';

$config = require('config.php');
$db = new Database($config['database'], 'root', 'lalaseadel44');

$query = "select * from notes";
$notes = $db->query($query)->fetchAll();

require "views/notes.view.php";