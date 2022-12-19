<?php

require_once('../config/db_config.php');

$sql = "SELECT * FROM branches";
$res = mysqli_query($conn, $sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode(array('status' => 'error'));
}