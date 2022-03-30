<?php
include "./db.php";

global $conn;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Detail </title>
</head>

<body>
    <?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result === false) :
        echo mysqli_error($conn);
    else :
        $article = mysqli_fetch_object($result);
        if (empty($article)) :
            echo "<p>Article Not Found!</p>";
        else :
    ?>
            <h1>

                <?= $article->title ?>
            </h1>
            <p>
                <?= $article->content ?>
            </p>

        <?php endif; ?>
    <?php endif; ?>

    <a href="./list.php">Back TO LIST</a>

</body>

</html>