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