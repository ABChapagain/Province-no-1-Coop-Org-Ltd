<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $sql = "update category set name='$name' where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['category_updated'] = "successful";
    } else {
        $_SESSION['category_updated'] = "unsuccessful";
    }
}
header("Location:category.php?id=$id");
