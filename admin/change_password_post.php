<?php
require "./config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_name = $_SESSION['user_name'];



    $old_pass = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_password']);


    $sql = "select * from users where user_name='$user_name'";
    $result = $conn->query($sql);

    $real_password = $result->fetch_assoc()['password'];
    if (!password_verify($old_pass, $real_password)) {
        echo "oldpassword didnt match";
        $_SESSION['password_changed'] = "oldPassword";
        echo $_SESSION['password_changed'];
    } elseif ($new_pass !== $confirm_pass) {
        echo "confirm didnt match";
        $_SESSION['password_changed'] = "confirmPassword";
    } else {
        $new_password = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("update users set password=? where user_name=?");
        $stmt->bind_param("ss", $new_password, $user_name);
        $stmt->execute();
        $_SESSION['password_changed'] = "successful";
    }
}

echo $_SESSION['password_changed'];
header("Location:" . url . "/change_password.php");
