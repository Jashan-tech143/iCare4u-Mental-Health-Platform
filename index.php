<?php

/*******w******** 
    
    Name: Jashanpreet kaur
    Date: December 8,2024
    Description: This file shows the primary dashboard of the Mental Health Platform - iCare4u, and welcomes the user.

****************/

require('connect.php');


$statement = $db->query('SELECT id, title,content, created_at, updated_at FROM articles ORDER BY updated_at DESC');
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// Define admin username for validation
define('ADMIN_USERNAME', 'wally');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to iCare4u</title>
</head>

<body>
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === ADMIN_USERNAME): ?>
        <?php include('includes\admin_header.php'); ?>
    <?php else: ?>
        <?php include('includes\header.php'); ?>
    <?php endif; ?>

    <main>
        <h3>Welcome to iCare4u: Your Source for Mental Health Insights</h3>
        <section class="content-index">


            <?php foreach ($posts as $post): ?>
                <article class="post">
                    <div>
                        <h4>
                            <a href="articles\full_post.php?id=<?= $post['id'] ?>"> <?= htmlspecialchars($post['title']) ?>
                            </a>
                        </h4>

                        <p id="time"><?= htmlspecialchars(date("F j, Y", strtotime($post['created_at']))) ?></p>

                    </div>

                    <?php if (strlen(htmlspecialchars(string: $post['content'])) > 200):
                        $truncatedContent = htmlspecialchars(string: substr(string: $post['content'], offset: 0, length: 400)) . '......'; ?>
                        <p>
                            <?= $truncatedContent . ' ' ?>
                            <a href="articles\full_post.php?id=<?= $post['id'] ?>">Read more</a>
                        </p>

                    <?php else: ?>
                        <p>
                            <?= $post['content'] ?>
                        </p>
                    <?php endif; ?>
                </article>
                <hr class="post-divider">
            <?php endforeach; ?>

        </section>
    </main>

    <?php include('includes\footer.php'); ?>
</body>

</html>