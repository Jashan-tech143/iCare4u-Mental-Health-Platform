<?php

$loggedIn = isset($_SESSION['username']);
$role = $_SESSION['role'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>iCare4u</title>
</head>

<body>
    <footer>

        <div class="footer">

            <p>Copyright &copy; <?php echo date("Y"); ?> iCare4u. All rights reserved.</p>

            <div class="footer-social">
                <a href="https://www.linkedin.com" target="_blank" class="social-icon">
                    <img src="./assets\icons\linkedin-icon.png" alt="LinkedIn">
                </a>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <img src="./assets\icons\facebook-icon.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank" class="social-icon">
                    <img src="./assets\icons\instagarm-icon.png" alt="Instagram">
                </a>
            </div>
        </div>
    </footer>
</body>

</html>