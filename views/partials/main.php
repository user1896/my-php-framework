<h1 <?php if(isset($uri) && $uri == '/') echo ' class="highlight-txt" ' ?> >
	Hello <?= $_SESSION['name'] ?? 'Big-tall' ?> you're in the <?= $title ?> page
</h1>
<p>
	<?php if($_SESSION['user'] ?? false) : ?>*
		So you're in, welcome.
	<?php else : ?>
		<a href="/register">Register</a>
	<?php endif; ?>
</p>