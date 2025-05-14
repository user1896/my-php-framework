<?php

namespace Core;

class Authenticator {
	protected $db;
	protected $user;

	public function __construct() {
		$this->db = App::resolve(Database::class);
	}
	
	public function attemptLogin($email, $password) {
		// attempt to log the user in, by checking if the credentials match.

		// first we check if the email exist:
		$this->isEmailExist($email);

		// If a user is found: then we check his password.
		if($this->user) {
			// We check if the password provided matches what we have in the database:
			// our password in the database is hashed, so we use the function password_verify() provided by PHP to verify
			// if a hashed password matches what we have.
			if(password_verify($password, $this->user['password'])){
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

	public function attemptRegister($email, $password) {
		// attempt to register the user in:

		// first we check if the email exist:
		$this->isEmailExist($email);

		// If a user email is found: then we can't register with an already existing email.
		if($this->user) {
			return false;
		}

		// If we reach this point, it means we didn't find a user.
		// Save it to the database, then log the use in.
		$this->db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
			'email' => $email,
			'password' => password_hash($password, PASSWORD_BCRYPT)
		]);

		// log them in
		$this->login([
			'email' => $email
		]);

		// registered successfully
		return true;
	}

	public function isEmailExist($email) {
		$this->user = $this->db->query('select * from users where email = :email', [
			'email' => $email
		])->find();
	}

	public function login($user) {
		$_SESSION['user'] = [
			'email' => $user['email']
		];
	
		// it is recommended to regenerate the session_id everytime we login
		session_regenerate_id(true);
	}
	
	public function logout() {
		Session::destroy();
	}
}