<?php
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //count total files
    $countfiles = count($_FILES['img']['name']);

    $product = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);


    $sql = "insert into products (name,description,category) values('$product','$description','$category')";
    if ($conn->query($sql)) {
        if (strlen($_FILES['img']['name'][0]) != 0) {
            $sql = "select id from products where name='$product'";
            $id = $conn->query($sql)->fetch_assoc()['id'];
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['img']['name'][$i];
                // Upload file
                $filename = "/../uploads/products/" . uniqid() . ".jpg";
                move_uploaded_file($_FILES['img']['tmp_name'][$i],  app . $filename);
                $sql = "insert into product_image (id,name) values('$id','$filename')";
                $conn->query($sql);
            }
        }

        $_SESSION['product_added'] = "successful";
    } else {
        $_SESSION['product_added'] = "unsuccessful";
    }
}
header("Location:products.php");
