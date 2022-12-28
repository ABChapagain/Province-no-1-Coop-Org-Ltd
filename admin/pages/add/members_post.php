<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);


    $validation = validation($_FILES['img']['size']);

    if (!$validation) {
        $_SESSION['validation'] = "error";
        header("Location:members.php");
        exit;
    }


    $sql = "select * from members where name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if (!$rowcount) {
        $img = $_FILES['img'];
        $img_name = $img['name'];
        $tempName = $img['tmp_name'];
        $img_name = uniqid() . ".jpg";


        $sql = "select id from department where department_name='$department'";
        $department = $conn->query($sql)->fetch_assoc()['id'];

        if ($validation) {
            move_uploaded_file($tempName,  member_upload . $img_name);
            $stmt = $conn->prepare("insert into members (name,position,department_id,image) values(?,?,?,?)");
            $stmt->bind_param("ssis", $name, $position, $department, $img_name);
        } else {
            $stmt = $conn->prepare("insert into members (name,position,department_id) values(?,?,?)");
            $stmt->bind_param("ssi", $name, $position, $department);
        }

        if ($stmt->execute()) {
            $_SESSION['member_added'] = "successful";
        } else {
            $_SESSION['member_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['member_added'] = "exists";
    }
}
header("Location:members.php");
