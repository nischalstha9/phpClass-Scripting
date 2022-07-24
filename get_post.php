<?php
echo "POST VALUES:<br>";
if (isset($_POST)) {
    var_dump($_POST);
}
echo "<br>GET VALUES:<br>";
if (isset($_GET)) {
    var_dump($_GET);
}
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <title>Get post</title>
</head>

<body>
    <form action="./get_post.php" method="get">
        get: <input type="text" name="get">
        <input type="submit" value="submit">
    </form>

    <form action="./get_post.php?<?= $_SERVER['QUERY_STRING'] ?>" method="post">
        post: <input type="text" name="post">
        <input type="submit" value="submit">
    </form>
</body>

</html>