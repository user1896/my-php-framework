<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// Valiadte the forms' inputs.
$errors = [];

if(!Validator::email($email)) {
	$errors['email'] = 'Invalid Email address';
}

if(!Validator::string($password, 4, 10)) {
	$errors['password'] = 'Invalid password';
}

// If there are validation errors:
if( !empty($errors) ) {
	// then we display the errors in 'create.view.php'
	return view('registration/create.view.php', [ // we return it so we don't execute the rest of the code if there're errors
		'title' => 'Create New User',
		'errors' => $errors,
	]);
}

$db = App::resolve(Database::class);

// Check if the account already exists.
$user = $db->query('select * from users where email = :email', [
	'email' => $email
])->find();

// If yes, then redirect them to a login page.
if($user) {
	header('location: /');
	exit();
} else {
	// If it doesn't exist, save it to the database, then log the use in, and redirect.
	$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
		'email' => $email,
		'password' => $password // change this to a hashed password before you insert it.
	]);
}

// Mark that the user has loged in, use sessions.
$_SESSION['user'] = [
	'email' => $email
];

// redirect
header('location: /');
exit();