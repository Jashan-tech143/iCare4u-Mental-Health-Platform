<?php

// Name: Jashanpreet kaur
// Date: December 8, 2024
// Description: This file shows the full post to the user.

require('../connect.php');

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($id) {
        $query = "SELECT id, title, content, created_at, updated_at FROM articles WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute([':id' => $id]);
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            die("Post not found!");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(string: $post['title']) ?> </title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style_admin.css">
</head>

<body>
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === ADMIN_USERNAME): ?>
        <?php include('../includes\admin_header.php'); ?>
    <?php else: ?>
        <?php include('../includes\header.php'); ?>
    <?php endif; ?>
    <main>
        <article class="content">
            <h1><?= htmlspecialchars(string: $post['title']) ?></h1>
            <p id="time"><?= date("F j, Y", strtotime($post['updated_at'])) ?></p>

            <div class="post"><?= htmlspecialchars($post['content']) ?></div>

        </article>

    </main>
    <?php include('../includes\footer.php'); ?>
</body>

</html>