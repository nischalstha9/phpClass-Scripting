<?php
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <title>PHP Form Validation</title>

    <script defer>
        function validate() {
            const fname = document.querySelector("#fname").value;
            const email = document.querySelector("#email").value;
            const username = document.querySelector("#username").value;
            const password = document.querySelector("#password").value;
            if (fname.length > 40) {
                alert("Full name cannot be more than 40 chars!");
                return false;
            }
            if (!/[A-z][\d+]/.test(username)) {
                alert("username invalid");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class='container jumbotron'>
        <form action="./index.php" method="post">
            <fieldset>
                <legend>Register</legend>
                <p>* required fields</p>
                <p class="">Your Full Name*</p>
                <input type="text" id="fname" maxlength="40">
                <!-- <p class="">Email*</p>
                <input type="email" id="email">
                <p class="">UserName*</p>
                <input type="text" id="username" pattern="[A-z]{1,}\d+" title="Username must be text followed by number">
                <p class="">Password*</p>
                <input type="password" id="password" minlength="8"> -->
                <p class="">
                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                </p>
            </fieldset>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>