<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "select * from notice_images where id='$id'";
    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


    $sql = "delete from notice_images where id='$id'";
    $conn->query($sql);
    $sql = "delete from notices where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['notice_deleted'] = "successful";
        foreach ($result as $key) {
            unlink(notice_upload . $key['image']);
        }
    } else {
        $_SESSION['notice_deleted'] = "error";
    }
}
header("Location:" . url . "notices.php");
