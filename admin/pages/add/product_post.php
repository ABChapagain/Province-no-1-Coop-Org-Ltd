<?php
session_start();
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //count total files
    $countfiles = count($_FILES['img']['name']);

    $product = $_POST['name'];
    $description = $_POST['description'];
    $sql = "insert into products (name,description) values('$product','$description')";
    if ($conn->query($sql)) {
        $sql = "select id from products where name='$product'";
        $id = $conn->query($sql)->fetch_assoc()['id'];
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['img']['name'][$i];
            // Upload file
            $filename = "/uploads/products/" . uniqid() . ".jpg";
            move_uploaded_file($_FILES['img']['tmp_name'][$i],  app . $filename);
            $sql = "insert into product_image (id,name) values('$id','$filename')";
            $conn->query($sql);
        }

        $_SESSION['product_added'] = "successful";
    } else {
        $_SESSION['product_added'] = "unsuccessful";
    }


    // Looping all files


    // $countfiles = count($_FILES['img']['name']);
    // print_r($_FILES['img']['name']);

    // Looping all files
    // for ($i = 0; $i < $countfiles; $i++) {
    //     // $filename = $_FILES['file']['name'][$i];

    //     // Upload file
    //     // move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/' . $filename);

    //     // $img = $_FILES['img'];
    //     // $name = $img['name'][$i];
    //     // $tempName = $img['tmp_name'];
    //     // $name = uniqid();
    //     // $fileDestination = "/$name.jpg";
    //     // $image = "/uploads/products" . $fileDestination;
    //     // move_uploaded_file($tempName[$i], app . $image);
    // }









}
header("Location:products.php");
