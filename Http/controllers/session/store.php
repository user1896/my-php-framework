<?php

use Core\Database;
use Core\App;
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

$db = App::resolve(Database::class);

// Match the credentials.
$user = $db->query('select * from users where email = :email', [
	'email' => $email
])->find();

// If a user is found: then we check his password.
if($user) {
	// We check if the password provided matches what we have in the database:
	// our password in the database is hashed, so we use the function password_verify() provided by PHP to verify
	// if a hashed password matches what we have.
	if(password_verify($password, $user['password'])){
		// If the password is correct, then log them in using sessions.
		login([
			'email' => $email
		]);
	
		// then redirect them to the home page.
		header('location: /');
		exit();
	}
}

// If we reach this point, it means one of two things:
// either We didn't find a user, or the password validation failed
// In both cases we reload the login view, and send an error.
return view('session/create.view.php', [
	'title' => 'Login',
	'errors' => [
		'password' => 'No matching account found for that email address and password'
	],
]);