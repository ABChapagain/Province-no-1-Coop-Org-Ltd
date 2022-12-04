<?php
include "../../config/config.php";

$id = $_GET['id'];
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "update products set name='$name', description='$description' where id='$id'";
if ($conn->query($sql)) {
    $countfiles = count($_FILES['img']['name']);
    if (strlen($_FILES['img']['name'][0]) != 0)
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['img']['name'][$i];
            // Upload file
            $filename = "/uploads/products/" . uniqid() . ".jpg";
            move_uploaded_file($_FILES['img']['tmp_name'][$i],  app . $filename);
            $sql = "insert into product_image (id,name) values('$id','$filename')";
            $conn->query($sql);
        }
    $_SESSION['product_updated'] = "successful";
} else {
    $_SESSION['product_updated'] = "unsuccessful";
}

header("Location:products.php?id=$id");
