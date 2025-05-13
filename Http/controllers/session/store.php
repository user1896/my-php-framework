<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;

// Log in the user if the credentials match.
// to log in it means to add the user's key (email) to the session.

// Valiadte the forms' inputs.

try {
	// When the validation fails we throw an Exception so we need so wrape this block of code with the "try" keyword
	// so we can "catch" the error and handle the exception.
	$form = LoginForm::validate($attributes = [
		'email' => $_POST['email'],
		'password' => $_POST['password']
	]);
} catch (ValidationException $exception) {
	// here the validation failed, we need to reload the loging page, following the PRG pattern, first we flash
	// the errors and the old form's attributes that we want to keep for the next render:
	Session::flash('errors', $exception->errors);

	// Remember the email to populate the input if the user failed the process of form validation or authentication.
	// the user should always re-enter the password so we don't remember it.
	// the convention name to remmeber the old form data is to call it "old".
	Session::flash('old', $exception->old);

	// now redirect back to the loging page.
	return redirect('/login');
};

// If the form validated successfuly

// Then continue to authenticate the user

// If the user authenticated successfuly:
if((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
	// then redirect them to the home page.
	redirect('/');
}

// If the authentication failed then prepare an error message:
$form->error('password', 'No matching account found for that email address and password');


// At this point either the form validation or the authentication have failed.

// // We reload the login view, and send the error.
// return view('session/create.view.php', [
// 	// we return it so we don't execute the rest of the code if there're errors
// 	'title' => 'Login',
// 	'errors' => $form->errors(),
// ]);

// //////////////////////

// I refactored the functions login() and logout() into the class Authenticator

// I refactored the code:
// // redirect
// header('location: /');
// exit();
// inside the file functions.php