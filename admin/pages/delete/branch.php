<?php

if (isset($_GET['id'])) {
    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "delete from branches where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['branch_deleted'] = "successful";
    } else {
        $_SESSION['branch_deleted'] = "error";
    }
}
header("Location:" . url . "branches.php");
