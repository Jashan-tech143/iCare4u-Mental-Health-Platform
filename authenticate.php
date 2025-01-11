<?php
// Start session to track login status
session_start();

// Predefined username and password (you can replace these with database verification later)
define('ADMIN_USERNAME', 'wally');
define('ADMIN_PASSWORD', 'myPass');

// Check if form is submitted

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get submitted credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials

    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        // If valid, set session variables and redirect to dashboard
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();

    } else {
        // If invalid, redirect back to login page with error
        header('Location: login.php?error=Invalid username or password');
        exit();
    }
}
