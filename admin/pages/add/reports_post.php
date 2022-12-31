<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    $validation = pdfValidation($_FILES['files']['name']);

    if (!$validation) {
        $_SESSION['validation'] = "error";
        header("Location:reports.php");
        exit;
    }



    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $filename = $_FILES['files']['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $filename = str_replace(" ", "_", $title) . ".$ext";
    if (file_exists(report_upload . $filename)) {
        $i = 1;
        while (file_exists(report_upload . $filename)) {
            $filename = str_replace(" ", "_", $title . "_$i") . ".$ext";
        }
    }
    move_uploaded_file($_FILES['files']['tmp_name'],  report_upload . $filename);

    $today = date("Y-m-d");
    $popupdate = explode("-", $popupdate);
    $popup_start = $popupdate[0];
    $popup_end = $popupdate[1];


    $sql = "select * from reports where title='$title'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $stmt = $conn->prepare("insert into reports (title,description,published_date,start_popup,end_popup,short_description,file_name) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $title, $description, $today, $popup_start, $popup_end, $short_description, $filename);
        if ($stmt->execute()) {
            $_SESSION['reports_added'] = "successful";
        } else {
            $_SESSION['reports_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['reports_added'] = "exists";
    }
}
header("Location:reports.php");
