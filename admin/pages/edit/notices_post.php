<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $popupdate =  mysqli_real_escape_string($conn, $_POST['popupdate']);

    $popupdate = explode("-", $popupdate);
    $popup_start = $popupdate[0];
    $popup_end = $popupdate[1];


    $sql = "update notices set title='$title', description='$description',short_description='$short_description',popup_start_date='$popup_start',popup_end_date='$popup_end' where id='$id'";
    if ($conn->query($sql)) {
        // if (strlen($_FILES['featured_img']['name']) > 0) {

        //     $sql = "select name from event_images where id='$id' and featured='1'";
        //     $featured_img = $conn->query($sql)->fetch_assoc()['name'];
        //     unlink(event_upload . $featured_img);

        //     $featured_img = $_FILES['featured_img']['name'];
        //     $filename =  uniqid() . ".jpg";
        //     move_uploaded_file($_FILES['featured_img']['tmp_name'],  event_upload . $filename);
        //     $sql = "update event_images set name='$filename' where id='$id' and featured='1'";
        //     $conn->query($sql);
        // }
        $countfiles = count($_FILES['img']['name']);
        if (strlen($_FILES['img']['name'][0]) != 0)
            for ($i = 0; $i < $countfiles; $i++) {
                $validation = validation($_FILES['img']['size'][$i]);
                if ($validation) {
                    $filename = $_FILES['img']['name'][$i];
                    // Upload file
                    $filename = uniqid() . ".jpg";
                    $sql = "insert into notice_images (id,image) values('$id','$filename')";
                    if ($conn->query($sql))
                        move_uploaded_file($_FILES['img']['tmp_name'][$i],  notice_upload . $filename);
                } else
                    $_SESSION['validation'] = "warning";
            }
        $_SESSION['notice_updated'] = "successful";
    } else {
        $_SESSION['notice_updated'] = "unsuccessful";
    }
}
header("Location:notices.php?id=$id");
