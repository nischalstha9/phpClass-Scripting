<?php
include "./db.php";

global $conn;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List</title>
</head>

<body>
    <?php


    $sql = "SELECT * FROM articles";
    $result = mysqli_query($conn, $sql);
    if ($result === false) :
        echo mysqli_error($conn);
    else :
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (empty($articles)) :
            echo "<p>No Articles Found!</p>";
        else :
    ?>

            <ul>
                <?php foreach ($articles as $idx => $article) : ?>
                    <li>
                        <a href="./detail.php?id=<?= $article["id"] ?>">
                            <?php echo $article["title"] ?>
                        </a>
                    </li>
        <?php endforeach;
            endif;
        endif;
        ?>
            </ul>

</body>

</html>