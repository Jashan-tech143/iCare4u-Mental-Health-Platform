<?php
// Start the session to manage login status
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <?php include('includes/header.php'); ?>
    <main>
        <h3>Please enter valid credentials</h3>


        <div class="login-container">
            <h2>Login to iCare4u</h2>

            <!-- Display error message if credentials are incorrect -->
            <?php if (isset($_GET['error'])): ?>
                <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>

            <!-- Login form -->
            <form action="authenticate.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Login</button>
            </form>
        </div>

    </main>

</body>

</html>