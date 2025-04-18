<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<form method="POST" action="">
	<div>
		<label for="body">note body</label>
	</div>

	<div>
		<!-- If the user posted something that was wrong (like over 250 characters for example) we don't want
		 to delete all his comment, but keep it so he can update it. -->
		<textarea
			name="body"
			id="body"
			rows="5"
			cols="40"
			placeholder="Here's an idea for a note ..."
			required
		><?= $_POST['body'] ?? '' ?></textarea>
		<!-- this is equivalent to: -->
		<!-- isset($_POST['body']) ? $_POST['body'] : '' -->
		<!-- if $_POST['body'] exists and not null than echo $_POST['body'] else echo an empty string '' -->
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