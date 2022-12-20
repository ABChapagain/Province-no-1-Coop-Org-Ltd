<?php
include "../../config/config.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
$registration =  mysqli_real_escape_string($conn, $_POST['registration']);
$vacant =  mysqli_real_escape_string($conn, $_POST['vacant']);

$registration = explode("-", $registration);
$registration_start = $registration[0];
$registration_end = $registration[1];

$sql = "update vacancy set title='$title',vacancy_seats='$vacant', description='$description',short_description='$short_description',starting_date='$registration_start',termination_date='$registration_end' where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['event_updated'] = "successful";
} else {
    $_SESSION['event_updated'] = "unsuccessful";
}
header("Location:vacancy.php?id=$id");
