<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];



// Validate form input
$errors = [];   

if (!Validator::email($email)) {
    $errors['email'] = "Please enter a valid email address.";
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = "Password must be between 6 and 255 characters long.";
}  

if (!empty($errors)) {
    view("registration/create.view.php", [
        'heading' => 'Register',
        'errors' => $errors,
    ]);
    exit;
}



// Check if email already exists in the database

$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", ['email' => $email])->find();

// If yes, redirect to login page
if ($user) {
    header("Location: /");
    exit;
} else {
// If no, create a new user in the database
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => $password
    ]); 

    // mark that the user is logged in
    $_SESSION['user'] = [
        'email' => $email,
    ];

    // redirect to home page
    header("Location: /");
    exit;



}











