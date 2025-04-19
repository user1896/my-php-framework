<?php require "views/partials/head.php" ?>
<?php require "views/partials/nav.php" ?>
<?php require "views/partials/main.php" ?>

<p>
	<?= htmlspecialchars($note['body']) ?>
</p>
<p>
	<a href="/notes">Go back ...</a>
</p>

</body>
</html>