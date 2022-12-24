<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../config/db_config.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $stmt = $conn->prepare("select * from users where user_name=? and password=?");
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['user_name'] = $result->fetch_assoc()['user_name'];
        header("Location:index.php");
    } else {
        header("Location:login.php");
    }
} else {
    header("Location:login.php");
}
