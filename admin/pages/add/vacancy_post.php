<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../config/config.php";

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $registration =  mysqli_real_escape_string($conn, $_POST['registration']);
    $popup =  mysqli_real_escape_string($conn, $_POST['popup']);
    $vacant =  mysqli_real_escape_string($conn, $_POST['vacant']);

    $today = date("Y-m-d");

    $registration = explode("-", $registration);
    $registration_start = $registration[0];
    $registration_end = $registration[1];

    $popup = explode("-", $popup);
    $popup_start = $popup[0];
    $popup_end = $popup[1];

    $sql = "select * from vacancy where title='$title'";
    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $stmt = $conn->prepare("insert into vacancy (title,description,published_date,starting_date,termination_date,short_description,vacancy_seats,start_popup_date,end_popup_date) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssi", $title, $description, $today, $registration_start, $registration_end, $short_description, $vacant, $popup_start, $popup_end);

        if ($stmt->execute()) {

            $_SESSION['vacancy_added'] = "successful";
        } else {
            $_SESSION['vacancy_added'] = "unsuccessful";
        }
    } else {
        $_SESSION['vacancy_added'] = "exists";
    }
}
header("Location:vacancy.php");
