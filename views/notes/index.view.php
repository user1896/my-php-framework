<?php require "views/partials/head.php" ?>
<?php require "views/partials/nav.php" ?>
<?php require "views/partials/main.php" ?>

<ul>
	<?php foreach($notes as $note) : ?>
		<a href="/note?id=<?= $note['id'] ?>" class="notesAnchor">
			<li><?= htmlspecialchars($note['body']) ?></li>
		</a>
	<?php endforeach; ?>
</ul>
<p>
	<a href="/notes-create">Create Note</a>
</p>

</body>
</html>