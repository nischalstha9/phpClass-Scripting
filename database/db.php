<?php
$host = "localhost";
$name = "blog";
$user = "root";
$password = "";

$conn = mysqli_connect($host, $user, $password, $name);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    echo " Connected Successfully ";
}

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
                <li><?php echo $article["title"] ?></li>
    <?php endforeach;
        endif;
    endif;
    ?>
        </ul>