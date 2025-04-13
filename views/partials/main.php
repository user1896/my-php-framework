<!-- add the class="highlight-txt" to h1 only when we're in the home page  -->
<h1 <?php if($uri == '/') echo ' class="highlight-txt" ' ?> >
	<?= $title ?> page
</h1>