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

    if (strlen($_FILES['featured_img']['name']) > 0) {
        $validation = validation($_FILES['featured_img']['size'], $_FILES['featured_img']['name']);
        if (!$validation) {
            $_SESSION['validation'] = "error";
            header("Location:events.php?id=" . $id);
            exit;
        }
    }

    $sql = "update events set title='$title', description='$description',short_description='$short_description',start_popup='$popup_start',end_popup='$popup_end' where id='$id'";
    if ($conn->query($sql)) {
        if (strlen($_FILES['featured_img']['name']) > 0) {

            $sql = "select name from event_images where id='$id' and featured='1'";
            $featured_img = $conn->query($sql)->fetch_assoc()['name'];
            unlink(event_upload . $featured_img);

            $featured_img = $_FILES['featured_img']['name'];
            $filename =  uniqid() . ".jpg";
            move_uploaded_file($_FILES['featured_img']['tmp_name'],  event_upload . $filename);
            $sql = "update event_images set name='$filename' where id='$id' and featured='1'";
            $conn->query($sql);
        }
        $countfiles = count($_FILES['img']['name']);
        if (strlen($_FILES['img']['name'][0]) != 0)
            for ($i = 0; $i < $countfiles; $i++) {
                $validation = validation($_FILES['img']['size'][$i], $_FILES['img']['name'][$i]);
                if ($validation) {
                    $filename = $_FILES['img']['name'][$i];
                    // Upload file
                    $filename = uniqid() . ".jpg";
                    $sql = "insert into event_images (id,name) values('$id','$filename')";
                    if ($conn->query($sql)) {
                        move_uploaded_file($_FILES['img']['tmp_name'][$i],  event_upload . $filename);
                    }
                } else {
                    $_SESSION['validation'] = "warning";
                }
            }
        $_SESSION['event_updated'] = "successful";
    } else {
        $_SESSION['event_updated'] = "unsuccessful";
    }
}
header("Location:events.php?id=$id");
