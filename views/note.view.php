<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<p>
	<?= htmlspecialchars($note['body']) ?>
</p>
<p>
	<a href="/notes">Go back ...</a>
</p>

</body>
</html>