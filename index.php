<?php

$title = 'Home';


function mydebug($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";

	die();
}

// mydebug($_SERVER["REQUEST_URI"]);

/*
$_SERVER is a super global variable that contains information created in the server, it is an array,
and if we do "var_dump($_SERVER);" we can see all of its properties.
for example: $_SERVER["REQUEST_URI"] returns which page we're curently in.
*/

require "views/index.view.php";
// A partial is a partial peace of HTML.

