<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
	protected $errors = [];

	// below we define the attribute $attributes inside the constructor's parameter as a public array.
	public function __construct(public array $attributes) {
		// this is a shortcut for:
		// public array $attributes;
		// public function __construct($attributes) {

		// Now we have two attributes: $errors and $attributes.

		// We need to store the attributes so if we throw an error when the validation fail, we can show the old
		// attributes (like email)

		// Now because we validate our email and password (or any other attribute that is relavent to the form)
		// in the contructor, they will get validated immediately after we instantiate our LoginForm class.
		if(!Validator::email($attributes['email'])) {
			$this->errors['email'] = 'Invalid Email address';
		}
	
		if(!Validator::string($attributes['password'], 4, 10)) {
			$this->errors['password'] = 'Invalid password';
		}
	}

	public static function validate($attributes) {
		// If we have a form and we want to validate that form using our LogingForm class, we want to call our
		// validate() method directly, ex: LoginForm::validate([$email, $password]);
		// so the first thing we must do inside this static validate() method is instantiate the class:
		$instance = new static($attributes);
		// here we create a new instance we called it "$instance", and sent $attributes to the contructor.

		// If a validation fails we throw an exception
		// else the form is valid, we return the instance, so we can chain and call other methods on this object:
		return $instance->failed() ? $instance->throw() : $instance;
	}

	public function throw() {
		// we throw the error message and the old attributes with it:
		ValidationException::throw($this->errors(), $this->attributes);
	}

	public function failed() {
		// If we have any errors it means the validation failed.
		return count($this->errors);
	}

	public function errors() {
		return $this->errors;
	}

	public function error($field, $message) {
		$this->errors[$field] = $message;

		return $this;
		// We return the instance so we can chain the methods directly after we add an error.
		// ex: a high chance we want to throw an exception after we add an error
		// so why do:
		// $form->error('password', 'error msg');
		// $form->throw();
		// When we can do: $form->error('password', 'error msg')->throw();
	}
}