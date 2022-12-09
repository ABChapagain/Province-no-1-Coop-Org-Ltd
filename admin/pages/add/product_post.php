<?php
require "../../config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //count total files
    $countfiles = count($_FILES['img']['name']);

    $product = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $sql = "select * from products where name='$product'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $sql = "insert into products (name,description,category) values('$product','$description','$category')";
        if ($conn->query($sql)) {

            $featured_img = $_FILES['featured_img']['name'];
            $filename =  uniqid() . ".jpg";

            $sql = "select id from products where name='$product'";
            $id = $conn->query($sql)->fetch_assoc()['id'];

            $sql = "insert into product_image(id,name,featured) values('$id','$filename','1')";
            if ($conn->query($sql))
                move_uploaded_file($_FILES['featured_img']['tmp_name'],  product_upload . $filename);

            if (strlen($_FILES['img']['name'][0]) != 0) {
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['img']['name'][$i];
                    $ext = explode(".", $filename);
                    $ext = end($ext);
                    if (in_array($ext, ["jpg", "png", "jpeg", "svg", "webp"])) {
                        // Upload file
                        $filename =  uniqid() . ".jpg";
                        move_uploaded_file($_FILES['img']['tmp_name'][$i],  product_upload . $filename);
                        $sql = "insert into product_image (id,name) values('$id','$filename')";
                        $conn->query($sql);
                    } else {
                        // echo "<script> alert('please upload photos of specified format') </script>";
                        die("please upload photos of specified fromat");
                    }
                }
            }

            $_SESSION['product_added'] = "successful";
        } else {
            $_SESSION['product_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['product_added'] = "exists";
    }
}
header("Location:products.php");
