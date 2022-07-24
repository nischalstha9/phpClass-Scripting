<?php
$host = "localhost";
$username = "root";
$password = "root";
$database = "students";
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
header('Access-Control-Allow-Origin: *');


$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_errno) :
    echo "Database Connection Failed: " . $conn->connect_error;
    exit();
endif;
