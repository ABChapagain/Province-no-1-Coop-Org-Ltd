<?php
require "./config/config.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $stmt = $conn->prepare("select * from users where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $new_pass = uniqid();
        $hash_password = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("update users set password=? where email=?");
        $stmt->bind_param("ss", $hash_password, $email);
        $stmt->execute();

        $_SESSION['url'] = url;
        $_SESSION['password'] = $new_pass;
        $_SESSION['email'] = $email;

        header("Location:" . url . "plugins/PHPMail/send_mail.php");
        echo "<br>";
        echo $new_pass;
    } else {
        echo "sorry user with that email does not exist";
    }
}
// header("Location:" . url . "/login.php");
