<?php
session_start();
require_once('./config/db_config.php');


if (isset($_POST['con_submit'])) {
    $name = $_POST['con_name'];
    $email = $_POST['con_email'];
    $subject = $_POST['con_subject'];
    $message = $_POST['con_message'];

    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['contact_success'] = "Your message has been sent successfully.";
        header("Location: contact-us.php");
    } else {
        $_SESSION['contact_error'] = "Something went wrong.";
        header("Location: contact-us.php");
    }
}