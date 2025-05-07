<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// make only authenticated user able to access the notes
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note-edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/notes-create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');
// By convention: if you wanna add a new note, than make a POST request to '/notes'
// and the controller is 'store.php'.
// the route '/notes-create' only handle the view of creating a note.

// make the get('/register') route restricted to only guests
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/sessions/create.php')->only('guest');
$router->post('/sessions', 'controllers/sessions/store.php');