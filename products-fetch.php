<?php
require_once('./config/db_config.php');
$category = $_POST['category'];
$sql = "select * from products where category = 'Consumable Goods'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);
