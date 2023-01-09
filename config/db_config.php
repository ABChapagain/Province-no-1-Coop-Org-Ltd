<?php
date_default_timezone_set('Asia/Kathmandu');

// URL Root
// define('URLROOT', 'http://localhost/MVC');
define('URLROOT', 'http://localhost/Province-no-1-Coop-Org-Ltd');

// SITE NAME
define('SITENAME', 'Province no. 1 Wholesale Consumer Specialized Cooperative Union Ltd');

$db_name = 'province';
$host = 'localhost';
$password = "";
$user = "root";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";