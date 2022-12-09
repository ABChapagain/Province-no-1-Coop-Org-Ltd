<?php
include "../config/config.php";


$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

unlink(product_upload . $name);

// $sql = "delete from members where id='$id' and name='$name'";
$sql = "update members set image='' where id='$id' and image='$name'";
$conn->query($sql);
