<?php
include "../../config/config.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
$popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);
$countfiles = count($_FILES['files']['name']);

$popupdate = explode("-", $popupdate);
$popup_start = $popupdate[0];
$popup_end = $popupdate[1];


$sql = "update reports set title='$title', description='$description',short_description='$short_description',start_popup='$popup_start',end_popup='$popup_end' where id='$id' ";
if ($conn->query($sql)) {

    $countfiles = count($_FILES['files']['name']);
    if (strlen($_FILES['files']['name'][0]) != 0)
        for ($i = 0; $i < $countfiles; $i++) {
            $j = $i;
            $filename = $_FILES['files']['name'][$i];
            $ext = explode(".", $filename);
            $ext = end($ext);
            $repeat = true;
            while ($repeat) {
                $filename = str_replace(" ", "_", $title) . $j + 1 . ".$ext";
                echo $filename . "<br>";
                $sql = "select * from reports_list where name='$filename'";
                $res = $conn->query($sql);
                echo $res->num_rows . "<br>";
                if ($res->num_rows == 0) {
                    $repeat = false;
                }
                $j++;
            }
            move_uploaded_file($_FILES['files']['tmp_name'][$i],  report_upload . $filename);
            $sql = "insert into reports_list (report_id,name) values('$id','$filename')";
            $conn->query($sql);
        }
    $_SESSION['report_updated'] = "successful";
} else {
    $_SESSION['report_updated'] = "unsuccessful";
}
header("Location:reports.php?id=$id");
