<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "delete from department where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['department_deleted'] = "successful";
    } else {
        $_SESSION['department_deleted'] = "error";
    }
}
header("Location:" . url . "departments.php");
