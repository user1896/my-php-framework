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
	<!-- Forms don't natively support submitting a DELETE request or a PUT request, it supports only GET and POST -->
	<!-- So we need someway to suggest to our app that this is a DELETE request method -->
	<!-- we use a hidden input with the name="_method" and the value is set to the request we want -->
	<input type="hidden" name="_method" value="DELETE" />
	
	<input type="hidden" name="id" value="<?= $note['id'] ?>"/>
	<button>Delete</button>
</form>

</body>
</html>