<?php
session_start();
require_once('./config/db_config.php');


if (isset($_POST['submit']) && isset($_FILES['resume'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $apply_for = mysqli_real_escape_string($conn, $_POST['apply-for']);
    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover-letter']);
    $date = date('Y-m-d');

    // Get file name
    $file_name = $_FILES['resume']['name'];

    // Allowed extensions
    $allowed_ext = array('pdf', 'doc', 'docx');

    // Get file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_ext, $allowed_ext)) {
        // Set unique id with the extension

        $uniqID =  uniqid() . "." . pathinfo($file_name, PATHINFO_EXTENSION);
        $file_tem_loc = $_FILES['resume']['tmp_name'];
        $file_store = "uploads/resume/" . $uniqID;


        $sql = "INSERT INTO `job_application` (`vacancy_id`, `name`, `email`, `phone`, `address`, `resume`, `cover_letter`, `date`) VALUES ('$apply_for', '$name', '$email', '$phone', '$address', '$uniqID', '$cover_letter', '$date')";

        if ($conn->query($sql)) {
            move_uploaded_file($file_tem_loc, $file_store);
            $_SESSION['apply_success'] = 'Your application has been submitted successfully.';
            header("Location: career-apply.php?id=$apply_for");
        } else {
            $_SESSION['apply_error'] = 'Something went wrong. Please try again.';
            header("Location: career-apply.php?id=$apply_for");
        }
    } else {
        $_SESSION['apply_error'] = 'File type not allowed. Allowed file types: pdf, doc,docx';
        header("Location: career-apply.php?id=$apply_for");
    }
} else {
    $_SESSION['apply_error'] = 'Something went wrong. Please try again.';
    header("Location: career-apply.php?id=$apply_for");
}