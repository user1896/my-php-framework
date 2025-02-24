<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo</title>
	<link rel="stylesheet" href="style.css">
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