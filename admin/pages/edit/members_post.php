<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";


    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    if (strlen($_FILES['img']['name']) > 0) {
        $validation = validation($_FILES['img']['size']);
        if (!$validation) {
            $_SESSION['validation'] = "error";
            header("Location:members.php?id=" . $id);
            exit;
        }
    }


    $sql = "select id from department where department_name='$department'";
    $department = $conn->query($sql)->fetch_assoc()['id'];
    $sql = "update members set name='$name', department_id='$department',position='$position' where id='$id'";
    if ($conn->query($sql)) {
        if (strlen($_FILES['img']['name']) > 0) {

            $sql = "select image from members where id='$id' ";
            $img = $conn->query($sql)->fetch_assoc()['image'];
            unlink(member_upload . $img);

            $img = $_FILES['img']['name'];
            $filename =  uniqid() . ".jpg";
            move_uploaded_file($_FILES['img']['tmp_name'],  member_upload . $filename);
            $sql = "update members set image='$filename' where id='$id'";
            $conn->query($sql);
        }

        $_SESSION['member_updated'] = "successful";
    } else {
        $_SESSION['member_updated'] = "unsuccessful";
    }
}

header("Location:members.php?id=$id");
