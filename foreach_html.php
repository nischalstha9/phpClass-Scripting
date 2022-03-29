<!DOCTYPE html>
<html lang="en">

<head>
    <title>FOREACH HTML</title>
</head>

<body>
    <?php
    $articles = [
        ["title" => "Article 1", "content" => "This is article 1."],
        ["title" => "Article 2", "content" => "This is article 2."]
    ];
    foreach ($articles as $idx => $article) :
    ?>
        <li>
            <?= $idx ?><br>
            <?= $article["title"] ?><br>
            <?= $article["content"] ?><br>
        </li>
    <?php endforeach ?>

</body>

</html>