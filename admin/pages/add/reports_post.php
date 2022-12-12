<?php
require "../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    // $popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);
    $countfiles = count($_FILES['files']['name']);

    $today = date("Y-m-d");

    // $popupdate = explode("-", $popupdate);
    // $popup_start = $popupdate[0];
    // $popup_end = $popupdate[1];


    $sql = "select * from reports where title='$title'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into reports (title,description,published_date) values('$title','$description','$today')";
        if ($conn->query($sql)) {

            $sql = "select id from reports where title='$title' order by id desc limit 1";
            $id = $conn->query($sql)->fetch_assoc()['id'];

            if (strlen($_FILES['files']['name'][0]) != 0) {
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['files']['name'][$i];
                    $ext = explode(".", $filename);
                    $ext = end($ext);
                    if (1) { //in_array($ext, ["jpg", "png", "jpeg", "svg", "webp"])
                        // Upload file
                        $filename =  uniqid() . ".$ext";
                        move_uploaded_file($_FILES['files']['tmp_name'][$i],  report_upload . $filename);
                        $sql = "insert into reports_list (report_id,name) values('$id','$filename')";
                        $conn->query($sql);
                    } else {
                        // echo "<script> alert('please upload photos of specified format') </script>";
                        die("please upload files of specified fromat");
                    }
                }
            }
            $_SESSION['reports_added'] = "successful";
        } else {
            $_SESSION['reports_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['reports_added'] = "exists";
    }
}
header("Location:reports.php");