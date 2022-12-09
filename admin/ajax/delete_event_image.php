<?php
include "../config/config.php";


$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

unlink(event_upload . $name);

$sql = "delete from event_images where id='$id' and name='$name'";
$conn->query($sql);
