<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "select * from reports_list where report_id='$id'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


$sql = "delete from reports_list where report_id='$id'";
$conn->query($sql);
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
