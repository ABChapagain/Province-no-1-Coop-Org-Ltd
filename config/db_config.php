<?php
$DB_NAME = 'province';
$HOST = 'localhost';
$PASSWORD = "";
$USER = "root";

$conn = new mysqli($HOST, $USER, $PASSWORD, $DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
