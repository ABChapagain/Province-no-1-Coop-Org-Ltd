<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "delete from event_images where id='$id'";
$conn->query($sql);
$sql = "delete from events where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['event_deleted'] = "successful";
} else {
    $_SESSION['event_deleted'] = "error";
}
header("Location:" . url . "events.php");
