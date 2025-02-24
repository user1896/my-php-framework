<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo</title>
	<style>
		body{
			place-items: center;
			display: grid;
			height: 100vh;
			font-family: sans-serif;
			margin: 0;
		}
	</style>
</head>
<body>

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
		// This function works the same way the the built-in function in PHP called "array_filter()"
	?>

	<h1>Hellow I'm Nadir</h1>

	<ul>
		<?php foreach($filtered_people as $person ) : ?>
			<li>
				<?= $person["name"] ?> : <?= $person["sport"] ?>
			</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>