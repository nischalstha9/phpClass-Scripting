<?php
ini_set('display_errors', 1);
$conn = new mysqli("localhost", "root", "root", "file_upload");
if ($conn->connect_errno) {
    echo "DB conn fail: " . $conn->connect_error;
    exit();
}

if (isset($_POST["submitBtn"])) {
    $person = $_POST["person"];
    $image = $_FILES["image"];
    $newname = strtotime("now") . $image["name"];
    if (move_uploaded_file($image['tmp_name'], dirname(__FILE__) . "/uploads/" .  $newname)) {

        $stmt = $conn->prepare("INSERT INTO dp (person, image) VALUES(?,?)");
        $stmt->bind_param("ss", $person, $newname);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "File uploaded!";
        } else {
            echo "file upload fail";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="./index.php" enctype="multipart/form-data" method="post">
        <p>
            <input type="text" id="person" name="person" placeholder="person">
        </p>
        <p>
            <input type="file" name="image" id="image">
        </p>
        <p>
            <input type="submit" value="Submit" name="submitBtn">
        </p>
    </form>

</body>

</html>