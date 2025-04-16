<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<?php foreach($notes as $note) : ?>
	<a href="/note?id=<?= $note['id'] ?>" class="notesAnchor">
		<li><?= $note['body'] ?></li>
	</a>
<?php endforeach; ?>

</body>
</html>