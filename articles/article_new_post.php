<?php

/*******w******** 
    
    Name: Jashanpreet kaur
    Date: December 08,2024
    Description: This file includes the code to post a new blog.

****************/

require('../connect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['content'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);

    if (($title) && ($content)) {
        $query = " INSERT INTO articles (title, content, created_at) VALUES (:title, :content, NOW())";
        $statement = $db->prepare($query);
        $statement->execute(array(":title" => $title, ":content" => $content));
    }
    header("Location: ../articles.php");
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article - iCare4u!</title>
    <link rel="stylesheet" href="../style_admin.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === ADMIN_USERNAME): ?>
        <?php include('../includes\admin_header.php'); ?>
    <?php else: ?>
        <?php include('../includes\header.php'); ?>
    <?php endif; ?>

    <div class="content-index">
        <h4>Remember, with great editing power comes great responsibility!</h4>

        <form method="post" class="postForm">

            <label for="title">Title: </label>
            <input type="text" id="title" name="title" placeholder="Enter title here..." required>


            <label for="content">Content: </label>
            <textarea name="content" id="content" required></textarea>

            <button class="submit-btn" type="submit">Post</button>
        </form>

    </div>
    <?php include('../includes\footer.php'); ?>
</body>

</html>