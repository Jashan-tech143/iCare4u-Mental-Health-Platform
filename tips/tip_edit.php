<?php

/*******w******** 
    
    Name: Jashanpreet kaur
    Date: December 8, 2024
    Description: This file edits an existing tip.

****************/

require('../connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post to submit data id title.. content and id are present and valid.

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);


    if (($title) && ($content) && ($id)) {

        $query = "UPDATE tips SET title = :title, content = :content, category = :category, updated_at = NOW()  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute(array(
            ":title" => $title,
            ":content" => $content,
            ":category" => $category,
            'id' => $id
        ));
    }
    header("Location: ../tips.php");
    exit;
} else {
    // Get to retrieve data using id
    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if ($id) {
            $query = "SELECT id, title, content,category, updated_at FROM tips WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->execute([':id' => $id]);
            $post = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$post) {
                die("Post not found!");
            }
        }
    } else {
        die("Invalid post ID!.");
    }
}
define('ADMIN_USERNAME', 'wally');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit this Post!</title>
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
        <h4>Remember, with great editing power comes great responsibility - Edit a Tip!</h4>

        <form method="post" class="postForm">

            <input type="hidden" name="id" id="id" value=" <?= htmlspecialchars($post['id']) ?>">

            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title']) ?>" required>


            <label for="content">Content: </label>
            <textarea name="content" id="content" required> <?= htmlspecialchars($post['content']) ?></textarea>

            <label for="title">category: </label>
            <input type="text" name="category" id="category" value="<?= htmlspecialchars($post['category']) ?>"
                required>

            <button class="submit-btn" type="submit">Update</button>
        </form>

    </div>
    <?php include('../includes\footer.php'); ?>
</body>

</html>