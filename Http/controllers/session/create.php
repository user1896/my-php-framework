<?php

use Core\Session;

view('session/create.view.php', [
	'title' => 'Login',
	'errors' => Session::get('errors'),
	'afterRegistration' => Session::get('afterRegistration')
]);