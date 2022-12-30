<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    //count total files
    $countfiles = count($_FILES['img']['name']);

    $product = mysqli_real_escape_string($conn, $_POST['name']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);

    $validation = validation($_FILES['featured_img']['size'], $_FILES['featured_img']['name']);

    if (!$validation) {
        $_SESSION['validation'] = "error";
        header("Location:products.php");
        exit;
    }

    $sql = "select * from products where name='$product'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $stmt = $conn->prepare("insert into products (name,description,category,short_description,tags) values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $product, $description, $category, $short_description, $tags);
        if ($stmt->execute()) {

            $sql = "select id from products where name='$product'";
            $id = $conn->query($sql)->fetch_assoc()['id'];

            $featured_img = $_FILES['featured_img']['name'];
            $filename =  uniqid() . ".jpg";
            $sql = "insert into product_image(id,name,featured) values('$id','$filename','1')";
            if ($conn->query($sql))
                move_uploaded_file($_FILES['featured_img']['tmp_name'],  product_upload . $filename);

            if (strlen($_FILES['img']['name'][0]) != 0) {
                for ($i = 0; $i < $countfiles; $i++) {
                    $validation = validation($_FILES['img']['size'][$i], $_FILES['img']['name'][$i]);
                    if ($validation) {
                        $filename = $_FILES['img']['name'][$i];
                        $ext = explode(".", $filename);
                        $ext = end($ext);
                        // Upload file
                        $filename =  uniqid() . ".jpg";
                        $sql = "insert into product_image (id,name) values('$id','$filename')";
                        if ($conn->query($sql))
                            move_uploaded_file($_FILES['img']['tmp_name'][$i],  product_upload . $filename);
                    } else {
                        $_SESSION['validation'] = "warning";
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