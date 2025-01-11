<?php

/*******w******** 
    
    Name: Jashanpreet kaur
    Date: December 8,2024
    Description: This file shows the primary dashboard of the Mental Health Platform - iCare4u, and welcomes the user.

****************/

require('connect.php');
require('authenticate.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=Please login first.");
    exit();
}

// Display a welcome message
$username = htmlspecialchars($_SESSION['username']);

// Initialize counts
$articles_published = 0;
$tips_shared = 0;
$testimonials_collected = 0;

try {
    // Query to count published articles
    $query = "SELECT COUNT(*) AS count FROM articles ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $articles_published = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    // Query to count shared tips
    $query = "SELECT COUNT(*) AS count FROM tips ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $tips_shared = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    // Query to count collected testimonials
    $query = "SELECT COUNT(*) AS count FROM testimonials ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $testimonials_collected = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <title>Welcome to iCare4u - Admin</title>
</head>

<body>
    <?php include('includes\admin_header.php'); ?>

    </header>

    <main>

        <h1>Welcome, <span><?php echo $username; ?>!</span></h1>
        <p>Glad you're here! Let's keep this platform running smoothly.</p>

        <section class="content">
            <h2>Overview</h2>
            <p>Welcome to your command center! Here you can be the boss of <span>articles</span>, sprinkle some wisdom
                with <span>tips</span>, and
                show off glowing <span>testimonials</span> from your happiest clients.</p>

            <div class="stats">
                <h3>Quick Stats</h3>
                <ul>
                    <li>Articles Published:<span> <?php echo $articles_published; ?></span></li>
                    <li>Tips Shared:<span> <?php echo $tips_shared; ?></pan>
                    </li>
                    <li>Testimonials Collected:<span> <?php echo $testimonials_collected; ?></s></li>
                </ul>
            </div>
            <h3>Quick Actions</h3>
            <div class="shortcuts">

                <button onclick="location.href='articles/article_new_post.php'">Add New Article</button>
                <button onclick="location.href='tips/tip_new_post.php'">Add New Tip</button>
                <button onclick="location.href='testimonials.php'">Manage Testimonials</button>
            </div>

            <!-- Motivational Message -->
            <div class="motivation">
                <h3>Keep Going!</h3>
                <p>"Success is not the key to happiness. Happiness is the key to success. If you love what you are
                    doing, you will be successful." - Albert Schweitzer</p>
            </div>
        </section>
    </main>
    <?php include('includes\footer.php'); ?>
</body>

</html>