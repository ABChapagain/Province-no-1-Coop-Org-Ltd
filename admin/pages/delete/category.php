<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    $result = $conn->query("select * from products where category=(select name from category where id='$id')");
    if ($result->num_rows > 0) {
        $_SESSION['category_deleted'] = "exists";
    } else {
        $sql = "delete from category where id='$id'";
        if ($conn->query($sql)) {
            $_SESSION['category_deleted'] = "successful";
        } else {
            $_SESSION['category_deleted'] = "error";
        }
    }
}
header("Location:" . url . "category.php");
