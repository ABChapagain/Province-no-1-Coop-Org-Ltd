<?php
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "select * from branches where name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into branches (name,address,phone) values('$name','$address','$phone')";
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
