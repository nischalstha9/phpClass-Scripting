<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "sharing_is_caring";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
