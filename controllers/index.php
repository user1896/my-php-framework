<?php

// store this session into a cookie in the browser
$_SESSION['name'] = "Anti Mage";

view('index.view.php', [
	'title' => 'Home',
	'uri' => $uri
]);