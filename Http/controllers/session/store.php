<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// Log in the user if the credentials match.
// to log in it means to add the user's key (email) to the session.

// Valiadte the forms' inputs.

// When the validation fails we throw an Exception so we need so wrape this block of code with the "try" keyword
// so we can "catch" the error and handle the exception.
$form = LoginForm::validate($attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password']
]);

// If the form validated successfuly

// then attempt to authenticate the user
$signedIn = (new Authenticator)->attemptLogin(
	$attributes['email'], $attributes['password']
);

if(! $signedIn) {
	// If the authentication failed then prepare an error message:
	// we're flashing our errors using Session::flash() in index.php after we throw an exception
	// so here we must manualy throw the exception for this error to be caught in index.php, flashed, and redirect
	// back to the previos page.
	$form->error(
		'password', 'No matching account found for that email address and password'
	)->throw();
}

// If we reach this line then the user authenticated successfuly. Redirect them to the home page:
redirect('/');

// I refactored the functions login() and logout() into the class Authenticator