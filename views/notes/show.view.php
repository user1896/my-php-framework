<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/main.php') ?>

<p>
	<?= htmlspecialchars($note['body']) ?>
</p>
<p>
	<a href="/notes">Go back ...</a>
</p>

</body>
</html>