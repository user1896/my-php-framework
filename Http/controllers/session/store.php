<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// Log in the user if the credentials match.
// to log in it means to add the user's key (email) to the session.

// Valiadte the forms' inputs.

$form = new LoginForm();

// If there are validation errors:
if(! $form->validate($email, $password)) {
	// then we display the errors in 'create.view.php'
	return view('session/create.view.php', [ // we return it so we don't execute the rest of the code if there're errors
		'title' => 'Login',
		'errors' => $form->errors(),
	]);
}

// Match the credentials.

$auth = new Authenticator();

// If the user authenticated successfuly:
if($auth->attempt($email, $password)) {
	// then redirect them to the home page.
	redirect('/');
} else {
	// We reload the login view, and send an error.
	return view('session/create.view.php', [
		'title' => 'Login',
		'errors' => [
			'password' => 'No matching account found for that email address and password'
		],
	]);
}

// I refactored the functions login() and logout() into the class Authenticator

// I refactored the code:
// // redirect
// header('location: /');
// exit();
// inside the file functions.php
