<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $filename = $conn->query("select file_name from reports where id='$id'")->fetch_assoc()['file_name'];
    $sql = "delete from reports where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['report_deleted'] = "successful";
        unlink(report_upload . $filename);
    } else {
        $_SESSION['report_deleted'] = "error";
    }
}
header("Location:" . url . "reports.php");
