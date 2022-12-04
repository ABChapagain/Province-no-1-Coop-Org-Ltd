<?php
session_start();
include "../../config/config.php";
$id = $_GET['id'];

$sql = "select * from product_image where id='$id'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


$sql = "delete from product_image where id='$id'";
if ($conn->query($sql)) {
    $sql = "delete from products where id='$id'";
    if ($conn->query($sql)) {
        $_SESSION['product_deleted'] = "successful";
        foreach ($result as $key) {
            unlink(app . $key['name']);
        }
    } else
        $_SESSION['product_deleted'] = "error";
}
header("Location:" . url . "products.php");
