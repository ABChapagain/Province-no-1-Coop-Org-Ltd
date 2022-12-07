<?php
include "../../config/config.php";
$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "delete from category where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['category_deleted'] = "successful";
} else {
    $_SESSION['category_deleted'] = "error";
}
header("Location:" . url . "category.php");
