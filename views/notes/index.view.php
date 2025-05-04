<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/main.php") ?>

<ul>
	<?php foreach($notes as $note) : ?>
		<a href="/note?id=<?= $note['id'] ?>" class="notesAnchor">
			<li><?= htmlspecialchars($note['body']) ?></li>
		</a>
	<?php endforeach; ?>
</ul>

<button>
	<a href="/notes-create">Create a new note</a>
</button>

</body>
</html>