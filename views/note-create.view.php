<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/main.php" ?>

<!--
By default a "form" will submit using a GET request. We can see that every input's name value is sent through the url.
Even when we just click a link to go to a url, that's a GET request, because it's through the url.
If we don't want the data to be a part of the url query string we have to use POST request, we need to specify that
explicitly in the form's method attribute.

The POST request by default will send the data to the same page it is used in if we don't specify a destination 
in the attribute "action", so it will rereload the page, and now $_POST will have the data sent.

We can see what request we're getting, through the global variable "$_SERVER":
$_SERVER['REQUEST_METHOD']
-->

<form method="POST" action="">
	<div>
		<label for="body">note body</label>
	</div>
	<div>
		<textarea name="body" id="body" rows="5" cols="40" placeholder="Here's an idea for a note ..."></textarea>
	</div>
	<button type="submit">Create</button>
</form>

</body>
</html>