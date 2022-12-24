<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../config/db_config.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $stmt = $conn->prepare("select * from users where user_name=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $result =  $result->fetch_assoc();
        $_SESSION['user_name'] = $result['user_name'];
        $real_password = $result['password'];
        if (password_verify($password, $real_password)) {
            header("Location:index.php");
            exit;
        }
    }
}
header("Location:login.php");
