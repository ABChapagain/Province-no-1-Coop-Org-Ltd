<?php
require "../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $old_pass = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_password']);


    $sql = "select * from users where name='$name'";
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
