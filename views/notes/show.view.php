<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/main.php') ?>

<p>
	<?= htmlspecialchars($note['body']) ?>
</p>

<button>
	<a href="/note-edit?id=<?= $note['id'] ?>">Edit</a>
</button>

<!-- "show.view.php" is not the route, it's just an end-point, the route that brought us here is "note" -->
<!-- We can see that in "routes.php": -->
<!-- $router->get('/note', 'controllers/notes/show.php'); -->
<!-- then the controller "show.php" will just require "show.view.php", it will not change the uri -->
<!-- so in the form below when we don't specify the attribute "action", the route by default is "note" -->
<!-- and the endpoint that we will reach is: -->
<!-- $router->delete('/note', 'controllers/notes/destroy.php'); -->
<form action="" method="POST">
	<!-- Forms don't natively support submitting a DELETE request or a PUT request, it supports only GET and POST -->
	<!-- So we need someway to suggest to our app that this is a DELETE request method -->
	<!-- we use a hidden input with the name="_method" and the value is set to the request we want -->
	<input type="hidden" name="_method" value="DELETE" />
	
	<input type="hidden" name="id" value="<?= $note['id'] ?>"/>
	<button>Delete</button>
</form>

<p>
	<a href="/notes">Go back ...</a>
</p>

</body>
</html>