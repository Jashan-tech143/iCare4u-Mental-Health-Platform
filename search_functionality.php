<?php

/*******w******** 
    Name: Jashanpreet Kaur
    Date: December 8, 2024
    Description: This file handles the search functionality across the website.
****************/

require('connect.php');

$query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);

if ($query) {
    // Prepare the search query to search in multiple fields (e.g., title, content)
    $sql = "SELECT id, title, content, created_at, updated_at FROM articles 
            WHERE title LIKE :query OR content LIKE :query 
            ORDER BY updated_at DESC";

    $statement = $db->prepare($sql);
    $statement->execute([':query' => '%' . $query . '%']);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search Results</title>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <main>
        <h4>Search Results for: "<?= htmlspecialchars($query) ?>"</h4>

        <?php if (count($results) > 0): ?>
            <section class="content-index">
                <?php foreach ($results as $post): ?>
                    <article class="post">
                        <div>
                            <h3><a
                                    href="articles/full_post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <p id="time"><?= htmlspecialchars(date("F j, Y", strtotime($post['updated_at']))) ?></p>
                        </div>

                        <p><?= htmlspecialchars(substr($post['content'], 0, 200)) . '...' ?></p>
                    </article>
                    <hr class="post-divider">
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <h4>No results found for your search.</h4>
        <?php endif; ?>
    </main>

    <?php include('includes/footer.php'); ?>
</body>

</html>