<?php

namespace Core;

class Authenticator {
	public function attempt($email, $password) {
		// attempt to log the user in:
		$user = App::resolve(Database::class)->query('select * from users where email = :email', [
			'email' => $email
		])->find();

		// If a user is found: then we check his password.
		if($user) {
			// We check if the password provided matches what we have in the database:
			// our password in the database is hashed, so we use the function password_verify() provided by PHP to verify
			// if a hashed password matches what we have.
			if(password_verify($password, $user['password'])){
				// If the password is correct, then log them in using sessions.
				$this->login([
					'email' => $email
				]);
			
				// user found and password correct, so authentication attempt is successful
				return true;
			}
		}

		// If we reach this point, we either didn't find a user, or the password validation failed.
		// so the authentication attempt has failed.
		return false;

	}

	public function login($user) {
		$_SESSION['user'] = [
			'email' => $user['email']
		];
	
		// it is recommended to regenerate the session_id everytime we login
		session_regenerate_id(true);
	}
	
	public function logout() {
		// First clear out the super global $_SESSION
		$_SESSION = [];
	
		// Destroy all data registered to a session in the server
		session_destroy();
	
		// clear out the cookie in the browser
		// for that we have to update the cookie and set its corresponding expiration
	
		// First we grab the current session cookie information:
		$params = session_get_cookie_params();
	
		setcookie('PHPSESSID', 'my sssss', time() + 3600, $params['path'], $params['domain']);
		// - First parameter: When we logged in and created a session, by default the name of the session is: 'PHPSESSID'
		// is all browsers So here when we create a session with the same name, we're overriding the one that was created.
		// - Second parameter: We give our cookie an empty value: ''.
		// - Third parameter: we set its experation date a time in the past (time()-3600) so it expires immediately.
	}
}