<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// make only authenticated user able to access the notes
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');

$router->get('/note-edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

$router->get('/notes-create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
// By convention: if you wanna add a new note, than make a POST request to '/notes'
// and the controller is 'store.php'.
// the route '/notes-create' only handle the view of creating a note.

// make the get('/register') route restricted to only guests
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');