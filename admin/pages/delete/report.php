<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);


$sql = "delete from reports where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['report_deleted'] = "successful";
    foreach ($result as $key) {
        unlink(report_upload . $key['name']);
    }
} else {
    $_SESSION['report_deleted'] = "error";
}
header("Location:" . url . "reports.php");
