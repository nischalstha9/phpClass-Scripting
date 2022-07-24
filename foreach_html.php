<!DOCTYPE html>
<html lang="en">

<head>
    <title>FOREACH HTML</title>
</head>

<body>
    <h1>FOREACH ON ARRAY</h1>
    <?php
    $articles = [
        ["title" => "Article 1", "content" => "This is article 1."],
        ["title" => "Article 2", "content" => "This is article 2."]
    ];
    $book1 = array("title" => "Mero kahani", "content" => "lorem ipsum dolar sit amet");
    foreach ($articles as $idx => $article) :
    ?>
        <li>
            <?= $idx ?><br>
            <?= $article["title"] ?><br>
            <?= $article["content"] ?><br>
        </li>
    <?php endforeach ?>
    <h1>FOREACH ON ASSOCIATIVE</h1>
    <?php
    foreach ($book1 as $key => $val) {
        echo ($key . "  ");
        echo ($val . "  ");
    }
    ?>
</body>

</html>