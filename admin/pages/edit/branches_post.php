<?php
include "../../config/config.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$coords = mysqli_real_escape_string($conn, $_POST['coords']);

$sql = "update branches set name='$name',address='$address',phone='$phone',coords='$coords',email='$email' where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['branch_updated'] = "successful";
} else {
    $_SESSION['branch_updated'] = "unsuccessful";
}

header("Location:branches.php?id=$id");
