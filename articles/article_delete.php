<?php

/*******w******** 
    Name: Jashanpreet Kaur
    Date: December 8, 2024
    Description: This file handles deleting an article from the database.
****************/

require('../connect.php');

define('ADMIN_USERNAME', 'wally'); // Replace with any admin username.
session_start();

// Check if the user is logged in as admin.
if (!isset($_SESSION['username']) || $_SESSION['username'] !== ADMIN_USERNAME) {
    die('Unauthorized access.');
}

// Check if an article ID is provided.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($id) {
        // Delete the article from the database.
        $query = "DELETE FROM articles WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute([':id' => $id]);

        header("Location: ../articles.php"); // Redirect back to the articles page.
        exit;
    } else {
        die('Invalid article ID.');
    }
} else {
    die('Invalid request.');
}

?>