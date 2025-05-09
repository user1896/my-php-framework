<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// Log in the user if the credentials match.
// to log in it means to add the user's key (email) to the session.

// Valiadte the forms' inputs.

$form = new LoginForm();

// If the form validated successfuly
if(! $form->validate($email, $password)) {
	// Then continue to authenticate the user

	// If the user authenticated successfuly:
	if((new Authenticator)->attempt($email, $password)) {
		// then redirect them to the home page.
		redirect('/');
	}
	
	// If the authentication failed then prepare an error message:
	$form->error('email', 'No matching account found for that email address and password');
}

// At this point either the form validation or the authentication have failed.

// We reload the login view, and send the error.
return view('session/create.view.php', [
	// we return it so we don't execute the rest of the code if there're errors
	'title' => 'Login',
	'errors' => $form->errors(),
]);

// I refactored the functions login() and logout() into the class Authenticator

// I refactored the code:
// // redirect
// header('location: /');
// exit();
// inside the file functions.php

//  