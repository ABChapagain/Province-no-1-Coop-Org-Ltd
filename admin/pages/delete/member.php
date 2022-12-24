<?php

if (isset($_GET['id'])) {

    include "../../config/config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "select * from members where id='$id'";
    $result = $conn->query($sql)->fetch_assoc()['image'];


    $sql = "delete from members where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['member_deleted'] = "successful";
        unlink(member_upload . $result);
    } else
        $_SESSION['member_deleted'] = "error";
}
header("Location:" . url . "members.php");
