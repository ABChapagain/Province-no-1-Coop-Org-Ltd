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


    $validation = validation($_FILES['featured_img']['size']);

    if (!$validation) {
        $_SESSION['validation'] = "error";
        header("Location:events.php");
        exit;
    }



    $sql = "select * from events where title='$title'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $stmt = $conn->prepare("insert into events (title,description,posted_date,start_popup,end_popup,short_description) values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $title, $description, $today, $popup_start, $popup_end, $short_description);
        if ($stmt->execute()) {
            $featured_img = $_FILES['featured_img']['name'];
            $filename =  uniqid() . ".jpg";

            $sql = "select id from events where title='$title' order by id desc limit 1";
            $id = $conn->query($sql)->fetch_assoc()['id'];

            $sql = "insert into event_images(id,name,featured) values('$id','$filename','1')";
            if ($conn->query($sql))
                move_uploaded_file($_FILES['featured_img']['tmp_name'],  event_upload . $filename);

            if (strlen($_FILES['img']['name'][0]) != 0) {
                for ($i = 0; $i < $countfiles; $i++) {
                    $validation = validation($_FILES['img']['size'][$i]);
                    if ($validation) {
                        $filename = $_FILES['img']['name'][$i];
                        $ext = explode(".", $filename);
                        $ext = end($ext);
                        // Upload file
                        $filename =  uniqid() . ".jpg";
                        $sql = "insert into event_images (id,name) values('$id','$filename')";
                        if ($conn->query($sql))
                            move_uploaded_file($_FILES['img']['tmp_name'][$i],  event_upload . $filename);
                    } else {
                        // echo "<script> alert('please upload photos of specified format') </script>";
                        $_SESSION['validation'] = "warning";
                    }
                }
            }
            $_SESSION['events_added'] = "successful";
        } else {
            $_SESSION['events_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['events_added'] = "exists";
    }
}
header("Location:events.php");
