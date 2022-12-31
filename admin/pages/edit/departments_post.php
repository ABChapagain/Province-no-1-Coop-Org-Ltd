<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $sql = "update department set department_name='$name' where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['department_updated'] = "successful";
    } else {
        $_SESSION['department_updated'] = "unsuccessful";
    }
}
header("Location:departments.php?id=$id");
