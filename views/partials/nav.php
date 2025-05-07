<nav>
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/about">About</a></li>
		<li><a href="/contact">Contact</a></li>
		<li><a href="/notes">Notes</a></li>
		<?php if(! ($_SESSION['user'] ?? false)) : ?>
			<li><a href="/register">Register</a></li>
			<li><a href="/login">Login</a></li>
		<?php endif; ?>
	</ul>
</nav>