<?php
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "select * from products where name='$name'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into category (name) values('$name')";
        if ($conn->query($sql)) {
            $_SESSION['category_added'] = "successful";
        } else {
            $_SESSION['category_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['category_added'] = "exists";
    }
}
header("Location:category.php");
