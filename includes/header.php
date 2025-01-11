<?php
// Jashanpreet kaur
// This file includes general header for the website
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>iCare4u</title>
</head>

<body>
    <header>
        <div class="MainHeader">

            <div class="logo">
                <a href="index.php">
                    iCare4u
                </a>
            </div>


            <div class="search-bar">
                <form action="search_functionality.php" method="GET">
                    <input type="text" name="query" placeholder="Search..." required>
                    <button type="submit">Search</button>
                </form>
            </div>


            <div class="auth-buttons">

                <a href="login.php" class="btn login">Login</a>

            </div>
        </div>
    </header>
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="articles.php">Articles</a></li>
            <li><a href="tips.php">Tips</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>

        </ul>
    </nav>
</body>

</html>