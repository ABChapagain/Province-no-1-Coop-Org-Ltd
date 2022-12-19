<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "delete from vacancy where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['vacancy_deleted'] = "successful";
} else {
    $_SESSION['vacancy_deleted'] = "error";
}
header("Location:" . url . "vacancy.php");
