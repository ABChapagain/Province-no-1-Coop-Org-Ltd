<?php
require_once('../config/db_config.php');


$category = $_POST['category'];
if ($category == 'all') {

    $sql = "select products.name, product_image.name as image, products.short_description, products.id from products JOIN product_image WHERE product_image.id = products.id AND product_image.featured = 1 ORDER BY products.id DESC";
} else {
    $sql = "select products.name, product_image.name as image, products.short_description, products.id from products JOIN product_image WHERE product_image.id = products.id AND product_image.featured = 1 AND products.category = '$category' ORDER BY products.id DESC";
}
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);