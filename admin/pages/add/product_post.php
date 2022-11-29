<?php
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $img = $_FILES['img'];
    $name = $img['name'];
    $tempName = $img['tmp_name'];
    $name = uniqid();
    $fileDestination = "/$name.jpg";


    $product = $_POST['name'];
    $description = $_POST['description'];
    $image = "/uploads/products" . $fileDestination;

    move_uploaded_file($tempName, app . $image);


    $sql = "insert into products (name,description,image) values('$product','$description','$image')";
    $conn->query($sql);
}
header("Location:products.php");
