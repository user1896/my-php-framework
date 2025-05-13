<?php

namespace Core;

use Exception;

class ValidationException extends Exception {
	public readonly array $errors;
	public readonly array $old;
	// If we have an attribute that we only write to it once, like $errors and $old attributes, we only write to it
	// when we throw the exception, instead of making it private (or protected) and then creating a getter method
	// to get it, we can make it "readonly" which allows us to write to it only once, then we make it public.

	public static function throw($errors, $old) {
		// We call ValidationException::throw() inside the method LoginForm::validate()
		// we have LoginForm::validate() returns an $instance (we store it inside the variable $form when we use it
		// so we can see the errors $form->errors())
		// but if LoginForm::validate() fails the validation it throws an exception before it returns the $instance,
		// and before the Session flashes the old attributes
		// so when we throw this exception we need to send the errors, and the old attributes.
		// here we store them inside our protected attributes $errors and $old.
		// and because this is a static method, we can't use the $this to refere to an object, there is no object.
		// so we create a new $instance here of type ValidationException, and store them.

		// create a new instance:
		$instance = new static;

		$instance->errors = $errors;
		$instance->old = $old;

		// throw the instance:
		throw $instance;
		// Notice that this is a "throw" and not a "return" so it will get catched in the
		// "catch (ValidationException $e) {}" block.
	}
}