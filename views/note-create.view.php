<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<form method="POST" action="">
	<div>
		<label for="body">note body</label>
	</div>
	<div>
		<textarea name="body" id="body" rows="5" cols="40" placeholder="Here's an idea for a note ..." required></textarea>
	</div>
	<button type="submit">Create</button>
</form>

</body>
</html>