<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/main.php') ?>

<p>
	<?= htmlspecialchars($note['body']) ?>
</p>
<p>
	<a href="/notes">Go back ...</a>
</p>
<form action="" method="POST">
	<input type="hidden" name="id" value="<?= $note['id'] ?>"/>
	<button>Delete</button>
</form>

</body>
</html>