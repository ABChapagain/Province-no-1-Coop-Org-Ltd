<?php
include "../../config/config.php";


$id = mysqli_real_escape_string($conn, $_GET['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$roles = mysqli_real_escape_string($conn, $_POST['roles']);


$sql = "select id from roles where role_name='$roles'";
$roles = $conn->query($sql)->fetch_assoc()['id'];
$sql = "update users set user_name='$name', role='$roles' where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['user_updated'] = "successful";
} else {
    $_SESSION['user_updated'] = "unsuccessful";
}


header("Location:users.php?id=$id");
