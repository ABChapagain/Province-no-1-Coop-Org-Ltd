<?php
$db_name = 'province';
$host = 'localhost';
$password = "";
$user = "root";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
