<?php
include './db.php';
global $conn;

if (isset($_POST['article-form-submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO articles (title, content) VALUES ('" . $title . "', '" . $content . "')";
    $result = mysqli_query($conn, $sql);
    if ($result === false) :
        echo mysqli_error($conn);
    else :
        echo "Article Inserted Successfully!";
    endif;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert</title>
</head>

<body>
    <form action="./insert.php" method="post">
        <label for="title">title:</label><input type="text" name="title" id="title"><br>
        <label for="content">content:</label><input type="text" name="content" id="content"><br>
        <button type="submit" name="article-form-submit">Create Article</button>
    </form>
    <a href="./list.php">Back TO LIST</a>

</body>

</html>

<!-- Explain about super global variable ex: $_POST[''] -->