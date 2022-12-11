<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "select * from event_images where id='$id'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


$sql = "delete from event_images where id='$id'";
$conn->query($sql);
$sql = "delete from events where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['event_deleted'] = "successful";
    foreach ($result as $key) {
        unlink(event_upload . $key['name']);
    }
} else {
    $_SESSION['event_deleted'] = "error";
}
header("Location:" . url . "events.php");
