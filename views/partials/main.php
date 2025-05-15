<h1 <?php if(isset($uri) && $uri == '/') echo ' class="highlight-txt" ' ?> >
	Hello <?= $_SESSION['user']['email'] ?? 'Big-tall' ?> you're in the <?= $title ?> page
</h1>
<p>
	Id: <?= $_SESSION['user']['id'] ?? 'no id' ?>
</p>