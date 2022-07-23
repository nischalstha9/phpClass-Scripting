<?php
$host = "localhost";
$name = "blog";
$user = "root";
$password = "root";
ini_set("error_reporting", E_ALL);

$conn = mysqli_connect($host, $user, $password, $name);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    // echo " Connected Successfully ";
}
