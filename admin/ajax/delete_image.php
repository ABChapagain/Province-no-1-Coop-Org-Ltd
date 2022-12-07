<?php
include "../config/config.php";


$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

unlink(app . $name);

$sql = "delete from product_image where id='$id' and name='$name'";
$conn->query($sql);
