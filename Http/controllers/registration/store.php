<?php

use Core\Database;
use Core\App;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// Valiadte the forms' inputs.

$form = new LoginForm();

// If there are validation errors:
if(! $form->validate($email, $password) ) {
	// then we display the errors in 'create.view.php'
	return view('registration/create.view.php', [ // we return it so we don't execute the rest of the code if there're errors
		'title' => 'Create New User',
		'errors' => $form->errors(),
	]);
}

$db = App::resolve(Database::class);

// Check if the account already exists.
$user = $db->query('select * from users where email = :email', [
	'email' => $email
])->find();

// If yes, then redirect them to the login page.
if($user) {
	header('location: /login');
	exit();
} else {
	// If it doesn't exist, save it to the database, then log the use in, and redirect.
	$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT)
	]);
}

// Mark that the user has loged in, use sessions.
login([
	'email' => $email
]);

// redirect
header('location: /');
exit();