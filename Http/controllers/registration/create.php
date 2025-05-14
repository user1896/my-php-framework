<?php

use Core\Session;

view('registration/create.view.php', [
	'title' => 'Create New User',
	'errors' => Session::get('errors'),
]);