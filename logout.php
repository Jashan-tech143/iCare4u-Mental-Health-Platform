<?php
// Start the session
session_start();

// Destroy all session variables
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <div class="logout-message">
        <h1>You have successfully logged out!</h1>
        <p>You will be redirected to the login page shortly...</p>
    </div>

    <script>
        // Redirect to login.php after 3 seconds
        setTimeout(function () {
            window.location.href = "login.php";
        }, 3000);
    </script>
</body>

</html>