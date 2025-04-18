<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<ul>
	<?php foreach($notes as $note) : ?>
		<a href="/note?id=<?= $note['id'] ?>" class="notesAnchor">
			<!-- here istead of echo blindly what the user had typed into the form, we first pass it into a php
			 build-in function called "htmlspecialchars" -->
			<li><?= htmlspecialchars($note['body']) ?></li>
			<!-- which will Convert special characters to HTML entities, so the <script> tag and the css class will not run,
				instead they will be treated as strings -->
		</a>
	<?php endforeach; ?>
</ul>
<p>
	<a href="/notes-create">Create Note</a>
</p>

</body>
</html>