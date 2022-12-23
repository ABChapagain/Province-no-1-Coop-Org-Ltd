<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $password = "12345";

    // The hash of the password that
    // can be stored in the database
    $hash_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );



    $sql = "select * from users where user_name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {

        $sql = "select id from roles where role_name='$role'";
        $roles = $conn->query($sql)->fetch_assoc()['id'];

        $sql = "insert into users (user_name,role,email,password) values('$name','$roles','$email','$hash_password')";
        if ($conn->query($sql)) {
            $_SESSION['user_added'] = "successful";
        } else {
            $_SESSION['user_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['user_added'] = "exists";
    }
}
header("Location:users.php");
