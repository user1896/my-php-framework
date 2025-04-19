<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<form method="POST" action="">
	<div>
		<label for="body">note body</label>
	</div>

	<div>
		<textarea
			name="body"
			id="body"
			rows="5"
			cols="40"
			placeholder="Here's an idea for a note ..."
			required
		><?= $_POST['body'] ?? '' ?></textarea>
	</div>

	<!-- Give the user feedback about the errors that accured while trying to post into the database -->
	<div>
		<?php if(isset($errors['body'])) : ?> <!-- if the error exists -->
			<p class="highlight-txt"><?= $errors['body'] ?></p> <!-- then display the error -->
		<?php endif ?>
	</div>
	
	<button type="submit">Create</button>
</form>

</body>
</html>