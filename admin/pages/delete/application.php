<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $filename = $conn->query("select resume from job_application where id='$id'")->fetch_assoc()['resume'];

    $sql = "delete from job_application where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['application_deleted'] = "successful";
        unlink(resume_upload . $filename);
    } else {
        $_SESSION['application_deleted'] = "error";
    }
}
header("Location:" . url . "applications.php");
