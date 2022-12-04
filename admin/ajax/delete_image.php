<?php
include "../config/config.php";

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "delete from product_image where id='$id' and name='$name'";
$conn->query($sql);
