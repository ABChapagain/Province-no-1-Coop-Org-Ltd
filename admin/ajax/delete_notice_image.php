<?php
include "../config/config.php";


$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

unlink(notice_upload . $name);

$sql = "delete from notice_images where id='$id' and image='$name'";
$conn->query($sql);
