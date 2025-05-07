<?php

namespace Core\Middleware;

class Auth {
	public function handle() {
		if(! ($_SESSION['user'] ?? false)){
			// when there is no session, it means no user is loged in, so redirect to the home page.
			header('location: /');
			exit();
		}
	}
}