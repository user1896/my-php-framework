<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {
	protected $errors = [];

	public function validate($email, $password) {
		if(!Validator::email($email)) {
			$this->errors['email'] = 'Invalid Email address';
		}

		if(!Validator::string($password, 4, 10)) {
			$this->errors['password'] = 'Invalid password';
		}

		// the method validate() returns 'true' when $this->errors is empty.
		return empty($this->errors);
	}

	public function errors() {
		return $this->errors;
	}

	public function error($field, $message) {
		$this->errors[$field] = $message;
	}
}