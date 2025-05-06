<h1 <?php if(isset($uri) && $uri == '/') echo ' class="highlight-txt" ' ?> >
	Hello <?= $_SESSION['name'] ?? 'Big-tall' ?> you're in the <?= $title ?> page
</h1>