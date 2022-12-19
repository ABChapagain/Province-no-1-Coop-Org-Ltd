<?php
include "../config/config.php";


$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

unlink(report_upload . $name);

$sql = "delete from reports_list where report_id='$id' and name='$name'";
$conn->query($sql);
