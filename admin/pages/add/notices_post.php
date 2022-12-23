<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";


    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);
    $countfiles = count($_FILES['img']['name']);

    $today = date("Y-m-d");

    $popupdate = explode("-", $popupdate);
    $popup_start = $popupdate[0];
    $popup_end = $popupdate[1];




    $sql = "select * from notices where title='$title'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into notices (title,description,published_date,popup_start_date,popup_end_date,short_description) values('$title','$description','$today','$popup_start','$popup_end','$short_description')";
        if ($conn->query($sql)) {
            // $featured_img = $_FILES['featured_img']['name'];
            // $filename =  uniqid() . ".jpg";

            $sql = "select id from notices where title='$title' order by id desc limit 1";
            $id = $conn->query($sql)->fetch_assoc()['id'];

            // $sql = "insert into notice_images(id,name,featured) values('$id','$filename','1')";
            // if ($conn->query($sql))
            //     move_uploaded_file($_FILES['featured_img']['tmp_name'],  event_upload . $filename);

            if (strlen($_FILES['img']['name'][0]) != 0) {
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['img']['name'][$i];
                    $ext = explode(".", $filename);
                    $ext = end($ext);
                    if (in_array($ext, ["jpg", "png", "jpeg", "svg", "webp"])) {
                        // Upload file
                        $filename =  uniqid() . ".jpg";
                        move_uploaded_file($_FILES['img']['tmp_name'][$i],  notice_upload . $filename);
                        $sql = "insert into notice_images (id,image) values('$id','$filename')";
                        $conn->query($sql);
                    } else {
                        // echo "<script> alert('please upload photos of specified format') </script>";
                        die("please upload photos of specified fromat");
                    }
                }
            }
            $_SESSION['notice_added'] = "successful";
        } else {
            $_SESSION['notice_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['notice_added'] = "exists";
    }
}
header("Location:notices.php");
