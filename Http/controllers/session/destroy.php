<?php

// log the user out

use Core\Authenticator;

Authenticator::logout();

// Redirect the user to the home page
redirect('/');