<?php
require "../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description =  $_POST['description'];
    $sql = "insert into events (title,description) values('$title','$description')";
    if ($conn->query($sql)) {
        $_SESSION['events_added'] = "successful";
    } else {
        $_SESSION['events_added'] = "unsuccessful";
    }
}
header("Location:events.php");
