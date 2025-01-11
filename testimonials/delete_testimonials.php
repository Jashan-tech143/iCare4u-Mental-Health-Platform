<?php

/*******w******** 
    Name: Jashanpreet Kaur
    Date: December 8, 2024
    Description: This file handles deleting a testimonials from the database.
****************/

require('../connect.php');

define('ADMIN_USERNAME', 'wally'); // Replace with any admin username.
session_start();

// Check if the user is logged in as admin.
if (!isset($_SESSION['username']) || $_SESSION['username'] !== ADMIN_USERNAME) {
    die('Unauthorized access.');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($id) {

        $query = "DELETE FROM testimonials WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute([':id' => $id]);

        header("Location: ../testimonials.php"); // Redirect back to the  page.
        exit;
    } else {
        die('Invalid ID.');
    }
} else {
    die('Invalid request.');
}

?>