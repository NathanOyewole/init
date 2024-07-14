<?php
// src/controllers/UserController.php
require '../index.html';
require '../src/models/User.php';

class UserController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        // Retrieve users
        $userModel = new User($this->pdo);
        $users = $userModel->getAllUsers();

        // Display users
        require '../src/views/user/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Validate input
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name)) {
                $userModel = new User($this->pdo);
                $userModel->createUser($name, $email);
                echo 'User added successfully';
            } else {
                echo 'Invalid input';
            }
        } else {
            require '../src/views/user/create.php';
        }
    }
}

