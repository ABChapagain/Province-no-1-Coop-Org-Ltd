<?php
include "../../config/config.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);


$sql = "update events set title='$title', description='$description' where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['event_updated'] = "successful";
} else {
    $_SESSION['event_updated'] = "unsuccessful";
}

header("Location:events.php?id=$id");
