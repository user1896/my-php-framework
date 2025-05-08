<nav>
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/about">About</a></li>
		<li><a href="/contact">Contact</a></li>
		<?php if(! ($_SESSION['user'] ?? false)) : ?>
			<li><a href="/register">Register</a></li>
			<li><a href="/login">Login</a></li>
		<?php else : ?>
			<li><a href="/notes">Notes</a></li>
			<!--
				When we click on the Logout button, we're not just changing the url, but we're doing much more important
				stuff, like changing the session and loging the user out, because of that we'll use a DELETE method
				(hidden input inside a POST method ) instead of a GET method, so instead of an <a> tag we'll use a <form>
			-->
			<form action="session" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				<button type="submit">Log out</button>
			</form>
		<?php endif; ?>
	</ul>
</nav>