<?php
// public/index.php
require '../index.html';
require '../config/database.php';

// Simple routing
$uri = trim($_SERVER['REQUEST_URI'], '/');
if ($uri == '') {
    require '../src/controllers/UserController.php';
    $controller = new UserController($pdo);
    $controller->index();
} elseif ($uri == 'user/create') {
    require '../src/controllers/UserController.php';
    $controller = new UserController($pdo);
    $controller->create();
} else {
    http_response_code(404);
    echo 'Page not found';
}

