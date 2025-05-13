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

// Then continue to authenticate the user

// now attempt to authenticate the user
if((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
	// If the user authenticated successfuly:
	// then redirect them to the home page.
	redirect('/');
}

// If the authentication failed then prepare an error message:
$form->error('password', 'No matching account found for that email address and password');

redirect('/login');
// //////////////////////

// I refactored the functions login() and logout() into the class Authenticator

// I refactored the code:
// // redirect
// header('location: /');
// exit();
// inside the file functions.php