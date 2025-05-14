<?php

namespace Core\Middleware;

class Guest {
	public function handle() {
		if($_SESSION['user'] ?? false) {
			// if a session exists that means that the user has loged in already, and he should not have access
			// to pages like "login" or "register" anymore, we redirect him to the home page:
			redirect('/');
		}
	}
}