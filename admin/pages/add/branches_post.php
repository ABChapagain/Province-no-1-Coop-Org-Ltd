<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $coords = mysqli_real_escape_string($conn, $_POST['coord']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = "select * from branches where name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into branches (name,address,phone,coords,email) values('$name','$address','$phone','$coords','$email')";
        if ($conn->query($sql)) {
            $_SESSION['branches_added'] = "successful";
        } else {
            $_SESSION['branches_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['branches_added'] = "exists";
    }
}
header("Location:branches.php");
