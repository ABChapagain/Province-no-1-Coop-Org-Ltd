<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../config/config.php";


    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);


    if (strlen($_FILES['featured_img']['name']) > 0) {
        $validation = validation($_FILES['featured_img']['size'], $_FILES['featured_img']['name']);
        if (!$validation) {
            $_SESSION['validation'] = "error";
            header("Location:products.php?id=" . $id);
            exit;
        }
    }

    $sql = "update products set name='$name', description='$description',short_description='$short_description',category='$category', tags='$tags' where id='$id'";
    if ($conn->query($sql)) {



        if (strlen($_FILES['featured_img']['name']) > 0) {

            $sql = "select name from product_image where id='$id' and featured='1'";
            $featured_img = $conn->query($sql)->fetch_assoc()['name'];
            unlink(product_upload . $featured_img);

            $featured_img = $_FILES['featured_img']['name'];
            $filename =  uniqid() . ".jpg";
            move_uploaded_file($_FILES['featured_img']['tmp_name'],  product_upload . $filename);
            $sql = "update product_image set name='$filename' where id='$id' and featured='1'";
            $conn->query($sql);
        }
        $countfiles = count($_FILES['img']['name']);
        if (strlen($_FILES['img']['name'][0]) != 0)
            for ($i = 0; $i < $countfiles; $i++) {
                $validation = validation($_FILES['img']['size'][$i], $_FILES['img']['name'][$i]);
                if ($validation) {
                    $filename = $_FILES['img']['name'][$i];
                    // Upload file
                    $filename = uniqid() . ".jpg";
                    move_uploaded_file($_FILES['img']['tmp_name'][$i],  product_upload . $filename);
                    $sql = "insert into product_image (id,name) values('$id','$filename')";
                    $conn->query($sql);
                } else {
                    $_SESSION['validation'] = "warning";
                }
            }
        $_SESSION['product_updated'] = "successful";
    } else {
        $_SESSION['product_updated'] = "unsuccessful";
    }
}
header("Location:products.php?id=$id");
