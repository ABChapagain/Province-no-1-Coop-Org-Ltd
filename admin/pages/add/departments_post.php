<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../config/config.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "select * from department where department_name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {

        $stmt = $conn->prepare("insert into department (department_name)  VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            $_SESSION['department_added'] = "successful";
        } else {
            $_SESSION['department_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['department_added'] = "exists";
    }
}
header("Location:departments.php");
