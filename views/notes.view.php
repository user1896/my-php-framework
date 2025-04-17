<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<ul>
	<?php foreach($notes as $note) : ?>
		<a href="/note?id=<?= $note['id'] ?>" class="notesAnchor">
			<li><?= $note['body'] ?></li>
		</a>
	<?php endforeach; ?>
</ul>
<p>
	<a href="/notes-create">Create Note</a>
</p>

</body>
</html>