<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);
    $file_exists = false;
    $updated_date = date("Y-m-d");
    if ($_FILES['files']['name']) {
        $validation = pdfValidation($_FILES['files']['name']);

        if (!$validation) {
            $_SESSION['validation'] = "error";
            header("Location:reports.php");
            exit;
        }
        $filename = $_FILES['files']['name'];
        $file_exists = true;
    }

    $popupdate = explode("-", $popupdate);
    $popup_start = $popupdate[0];
    $popup_end = $popupdate[1];


    $sql = "update reports set title='$title', description='$description',short_description='$short_description',start_popup='$popup_start',end_popup='$popup_end',updated_date='$updated_date' where id='$id' ";
    if ($conn->query($sql)) {

        if ($file_exists) {

            $oldfile = $conn->query("select file_name from reports where id='$id'");
            $oldfile = $oldfile->fetch_assoc()['file_name'];

            unlink(report_upload . $oldfile);

            $ext = explode(".", $filename);
            $ext = end($ext);
            $filename = str_replace(" ", "_", $title)  . ".$ext";
            move_uploaded_file($_FILES['files']['tmp_name'],  report_upload . $filename);
            $sql = "update reports set file_name='$filename'";
            $conn->query($sql);
        }
        $_SESSION['report_updated'] = "successful";
    } else {
        $_SESSION['report_updated'] = "unsuccessful";
    }
}
header("Location:reports.php?id=$id");
