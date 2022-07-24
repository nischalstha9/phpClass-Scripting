<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = array('type' => 'danger', 'msg' => 'Please Login to Continue');
    header("Location: ./login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
</head>

<body>
    <div class='container'>
        <div class="jumbotron">
            <h1>Profile</h1>
            Username: <?= $_SESSION['user']['email'] ?>
            <a href="./logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            <button class="btn btn-secondary" onclick="toggleDarkMode()">Toggle Visiblity</button>
            <h3>Your Session varibles:</h3>
            <?php var_dump($_SESSION) ?>
            <h3>Your Cookies:</h3>
            <?php var_dump($_COOKIE) ?>
            <h3>Your JS-Accessible Cookies:</h3>
            <p id="js-accessible-cookies"></p>
        </div>
    </div>
    <script>
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        const body = document.querySelector("body")
        let bg = getCookie('bg_color') ? getCookie('bg_color') : body.style.backgroundColor;
        body.style.backgroundColor = bg;

        function toggleDarkMode() {
            let bg = getCookie('bg_color') ? getCookie('bg_color') : body.style.backgroundColor;
            let newbg = bg === "black" ? "white" : "black";
            body.style.backgroundColor = newbg;
            document.cookie = `bg_color=${newbg};expires=Fri, 31 Dec 9999 23:59:59 GMT`;
        }

        const jsCookieHolder = document.querySelector("#js-accessible-cookies")
        jsCookieHolder.textContent = document.cookie;
    </script>
</body>

</html>