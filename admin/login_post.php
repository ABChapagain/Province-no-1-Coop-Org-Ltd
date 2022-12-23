<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../config/db_config.php";

    $user = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from users where user_name='$user' and password='$password'";
    if ($result = $conn->query($sql)) {

        $_SESSION['user_name'] = $result->fetch_assoc()['user_name'];
        header("Location:index.php");
    }
} else {
    header("Location:login.php");
}
