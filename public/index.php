<?php

const BASE_PATH = __DIR__ . '/../'; // BASE_PATH will point to an absolute path to the root of the project.
// __DIR__ => means current directory
// '/../' => means go out of directory
// currently we're inside "index.php" witch is inside the document root "public", to go to the root of the project
// we need to move up from the current folder, so => __DIR__ . '/../'

require BASE_PATH . 'functions.php';
require BASE_PATH . 'Database.php';
require BASE_PATH . 'Response.php';
require BASE_PATH . 'router.php';