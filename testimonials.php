<?php

/*******w********     
    Name: Jashanpreet kaur
    Date: December 8,2024
    Description: This file shows the primary dashboard of the Mental Health Platform - iCare4u, and welcomes the user.
****************/

session_start();
require('connect.php');


$statement = $db->query('SELECT id, client_name, content ,updated_at FROM testimonials ORDER BY updated_at DESC');
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
            <h4>What Our Clients Say</h4>

            <?php foreach ($posts as $post): ?>
                <article class="post">
                    <div>
                        <h4 id="time">

                            <?= htmlspecialchars($post['client_name']) ?>

                        </h4>

                        <p id="time"><?= htmlspecialchars(date("F j, Y", strtotime($post['updated_at']))) ?></p>

                    </div>
                    <div>
                        <p>
                            <?= htmlspecialchars($post['content']) ?>
                        </p>
                    </div>


                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === ADMIN_USERNAME): ?>
                        <div>
                            <a href="testimonials/delete_testimonials.php?id=<?= $post['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this user testimonials?');">Delete</a>
                        </div>
                    <?php endif; ?>

                </article>
                <hr class="post-divider">
            <?php endforeach; ?>

        </section>
    </main>
    <?php include('includes\footer.php'); ?>
</body>

</html>