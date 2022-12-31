<?php

if (isset($_GET['id'])) {


    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    $result =    $conn->query("select * from members where department_id='$id'");
    if ($result->num_rows > 0) {
        $_SESSION['department_deleted'] = "exists";
    } else {
        $sql = "delete from department where id='$id'";
        if ($result = $conn->query($sql)) {
            $_SESSION['department_deleted'] = "successful";
            print_r($result);
        } else {
            $_SESSION['department_deleted'] = "error";
        }
    }
}
header("Location:" . url . "departments.php");
