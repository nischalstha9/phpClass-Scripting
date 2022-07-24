<?php
include "./database.php";
global $conn;
session_start();
if (isset($_POST['loginBtn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = $conn->prepare("SELECT * FROM user WHERE email = ? AND active = 1");
    $sql->bind_param('s', $email);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows === 0) :
        $_SESSION['message'] = array('type' => 'danger', 'msg' => 'User with given email not found.');
    else :
        while ($row = $result->fetch_assoc()) {
            $hash = $row['password'];
            if (password_verify($password, $hash)) :
                $_SESSION['user'] = $row;

                if (!empty($_POST["remember"])) {
                    setcookie("member_login", $_POST["email"], time() + (1 * 365 * 24 * 60 * 60), $httponly = true);
                } else {
                    setcookie("member_login", "");
                }
                $_SESSION['message'] = array('type' => 'success', 'msg' => 'You are authenticated.');
                Header('Location: ./profile.php');
            else :
                $_SESSION['message'] = array('type' => 'danger', 'msg' => 'Your email or password is incorrect. Please try again.');
            endif;
        }
    endif;
    $sql->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class='container'>
        <?php
        if (isset($_SESSION['message']['msg'])) :
        ?>
            <div class="alert alert-<?= $_SESSION['message']['type'] ?>">
                <?php
                echo $_SESSION['message']['msg'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <form class="jumbotron" method="post" action="./login.php">
            <h1>Login</h1>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if (isset($_COOKIE["member_login"])) {
                                                                                                                        echo $_COOKIE["member_login"];
                                                                                                                    } ?>" autocomplete="false">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember">Remember Me?</label>
            </div>
            <button type="submit" class="btn btn-primary" name="loginBtn">Login</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>