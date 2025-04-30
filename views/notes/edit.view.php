<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/main.php') ?>

<form method="POST" action="/note">
	<input type="hidden" name="_method" value="PATCH" />
	<input type="hidden" name="id" value="<?= $note['id'] ?>"/>

	<div>
		<label for="body">Edit the note</label>
	</div>

	<div>
		<textarea
			name="body"
			id="body"
			rows="5"
			cols="40"
			placeholder="Here's an idea for a note ..."
			required
		><?= $_POST['body'] ?? ($note['body'] ?? '') ?></textarea>
	</div>

	<!-- Give the user feedback about the errors that accured while trying to Edit the note -->
	<div>
		<?php if(isset($errors['body'])) : ?> <!-- if the error exists -->
			<p class="highlight-txt"><?= $errors['body'] ?></p> <!-- then display the error -->
		<?php endif ?>
	</div>
	
	<button type="submit">Update</button>
</form>

<button>
	<a href="/notes">Cancel Edit</a>
</button>

</body>
</html>