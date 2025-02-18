<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo</title>
</head>
<body>
	<h1>Hello world</h1>
	<p>I wanna see it the browser</p>
	<?php
		$i = 4;
		while($i>0){
			?>
			<p>repeat me</p>
		<?php
			$i = $i-1;
		}
	?>
</body>
</html>