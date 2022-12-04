<?php
session_start();
include "../../config/config.php";
$id = $_GET['id'];

$sql = "delete from product_image where id='$id'";
if ($conn->query($sql)) {
    $sql = "delete from products where id='$id'";
    if ($conn->query($sql))
        $_SESSION['product_deleted'] = "successful";
    else
        $_SESSION['product_deleted'] = "error";
}
header("Location:" . url . "products.php");
