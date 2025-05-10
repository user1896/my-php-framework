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
if($form->validate($email, $password)) {
	// Then continue to authenticate the user

	// If the user authenticated successfuly:
	if((new Authenticator)->attempt($email, $password)) {
		// then redirect them to the home page.
		redirect('/');
	}

	// If the authentication failed then prepare an error message:
	$form->error('password', 'No matching account found for that email address and password');
}

// At this point either the form validation or the authentication have failed.

// // We reload the login view, and send the error.
// return view('session/create.view.php', [
// 	// we return it so we don't execute the rest of the code if there're errors
// 	'title' => 'Login',
// 	'errors' => $form->errors(),
// ]);

// PRG pattern stands for "Post/Redirect/Get"

// When you submit a form (so a Post request) the server will take action using the form's data you submited
// (that action could be inserting into a database, or just validating the email and failing the validation)
// then sends back the result as HTML by loading the view file.

// If you reload the page after submitting the form (so after a Post request happened), or click on another page then
// try to go back to the form page after you submited, you will see a warning message: "Confirm Form Resubmission"
// "This webpage requires data that you entered earlier in order to be properly displayed. You can send this data
// again, but by doing so you will repeat any action this page previously performed."
// It warns you that the form data will be submitted again, and any action taken on the server might be repeated,
// and this could be charging a credit card for example, so it must not happen.

// What happened is not our fault, it is just how browsers work, we loaded our view file as we should.
// there is no magical function that we can call to solve this problem for us, instead we need to follow a pattern
// called Post/Redirect/Get "PRG" pattern:
// It is a technique that is designed to prevent the resubmission of a form after it's been submitted.

// In PRG, as before the user fills the form and submits it to the server, the server recieves the POST and takes
// action, but then redirects the user to a separate page, which the browsr loads using a GET method.
// Now if the user reloads the page, or click on another page after submitting the form then try to come back,
// all they're doing is reloading the page using the same GET method, not a POST method, so the data are not
// submitted again.

// In conclusion PRG pattern is: after a "Post", always "Redirect" to a "Get" to avoid the resubmission of data.

$_SESSION['_flush']['errors'] = $form->errors();

// The first step to implement the PRG pattern is instead of loading an HTML view file we redirect to the loading
// page using the function redirect() witch takes us there using a GET request:
return redirect('/login');
// The problem now is that we can't show the errors on the next page.
// To solve that we store them in the super global $_SESSION (as we did above).
// Now as we implemented in our 'routes' file, a GET request to the route 'login' page will open will file (endpoint):
// "controllers/session/create.php" which will open the view "create.view.php".
// And as we learned when we implemented the "view()" function that loads views, is that views should be treated
// as components, any variable we use inside should be passed to them.
// So we should not use the super global $_SESSION directly inside the view, but we passe it in from the controler
// using the function "view()".

// Now after we display the errors that we put inside $_SESSION we need to flush the $_SESSION key that holds them,
// because if we don't the error messages will always be there even if we reload the page or visit another page,
// that's how sessions work, they hold data in a cookie, so the page 'login' will always have this error.

// Before we flush our $_SESSION's key that holds the index to the errors, we make sure to give it a very explicit
// name, so it doesn't interfer with other $_SESSION's keys in the future, ex: "$_SESSION['_flush']['errors']"

// Where We flush the SESSION's key:
// The place to flush the $_SESSION's key is at the end of the file "public/index.php".
// The page "public/index.php" is actually the only page, it is the server, and this server serves HTML in
// endpoints based on which route was called.
// So the execution start at the top of "public/index.php" then it reachs the line "$router->route($uri, $method)"
// which is a function that loads the endpoint, and this endpoint is a controller file witch requires a view,
// then after this "route()" function finishes its execution, the main process comes back to finish executing the
// main file "public/index.php", just like any other stack buffer.
// So if we want to do something after all the render is done, we put it at the end of the file "public/index.php"
// and that's where we flush our $_SESSION's key.

// //////////////////////

// I refactored the functions login() and logout() into the class Authenticator

// I refactored the code:
// // redirect
// header('location: /');
// exit();
// inside the file functions.php