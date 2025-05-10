<?php

view('session/create.view.php', [
	'title' => 'Login',
	'errors' => $_SESSION['_flush']['errors'] ?? []
]);