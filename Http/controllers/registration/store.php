<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// Valiadte the forms' inputs.

$form = LoginForm::validate($attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password']
]);

// If the form validated successfuly

// then attempt to authenticate the user

$registered = (new Authenticator)->attemptRegister(
	$attributes['email'], $attributes['password']
);

// If we couldn't register the user it means his email already exists
if(! $registered) {
	$form->error(
		'email', 'This email address already exist.'
	)->throw();
}

// If we reach this line then the user registered successfuly.
// redirect them to the login page.
redirect('/login');