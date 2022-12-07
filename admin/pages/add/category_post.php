<?php
require "../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "insert into category (name) values('$name')";
    if ($conn->query($sql)) {
        $_SESSION['category_added'] = "successful";
    } else {
        $_SESSION['category_added'] = "unsuccessful";
    }
}
header("Location:category.php");
