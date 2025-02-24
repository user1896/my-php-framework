<?php

$people = [
	[
		"name" => "Adel",
		"sport" => "Bodybuilding"
	],[
		"name" => "Adel",
		"sport" => "basketball"
	],[
		"name" => "Abderazak",
		"sport" => "Strongman"
	],[
		"name" => "Ronie",
		"sport" => "Power building"
	]
];

function filter($array, $callback){
	$filtered_array = [];

	foreach($array as $item){
		if($callback($item)){
			$filtered_array[] = $item;
		}
	}

	return $filtered_array;
}

$filtered_people = filter($people, function($array){
	return $array["name"] === "Adel";
});

// Now we separate the php logic from the view (the html portion)(also called the template), we name it:
// index.view.php (can also be named: "index.html.php" or "index.template.php")

// If we have a file that exclusivly contains "php" we can omit the closing portion of the php tag
// This is the file that will entiract with the database or calls an API, then I display the data in the
// "view" file.

// Now we include our view here at the bottom:
require "index.view.php";
// "require" is identical to "include" except upon failure it will also produce an Error exception.

// Now our view will have access to all the data that was defined in this file. For example here we have the
// variable "$filtered_people" that we can use inside our view "index.view.php".