<?php
session_start();



define("app", dirname(dirname(__FILE__)));
define("url", "http://localhost/Province-no-1-Coop-Org-Ltd/admin/");

define("product_url", url . "../uploads/products/");
define("product_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/products/");

define("member_url", url . "../uploads/members/");
define("member_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/members/");

define("event_url", url . "../uploads/events/");
define("event_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/events/");

define("report_url", url . "../uploads/reports/");
define("report_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/reports/");

define("notice_url", url . "../uploads/notices/");
define("notice_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/notices/");

define("resume_url", url . "../uploads/resume/");
define("resume_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/resume/");


require app . "/../config/db_config.php";

$link = $_SERVER['REQUEST_URI'];

$login = strpos($link, "login");
$forgot_password = strpos($link, "forgot_password");


if (!isset($_SESSION['user_name']) && !$login && !$forgot_password) {
    header("Location:" . url . "login.php");
    exit;
}

$staff = ['product', 'event', 'report', 'notice', 'index'];
$hr = ['application', 'vacancy', 'index'];

if (!$login && !$forgot_password) {
    if ($_SESSION['role'] == 3) {
        $counter = 0;
        foreach ($staff as $auth) {
            if (strpos($link, $auth)) {
                $counter++;
            }
        }
        if (!$counter) {
            header("Location:" . url . "products.php");
            exit;
        }
    }

    if ($_SESSION['role'] == 2) {
        $counter = 0;
        foreach ($hr as $auth) {
            if (strpos($link, $auth)) {
                $counter++;
            }
        }
        if (!$counter) {
            header("Location:" . url . "vacancy.php");
            exit;
        }
    }
}

function validation($size, $name)
{
    $allowed = ['jpg', 'jpeg', 'png'];
    $name = explode(".", $name);
    $name = end($name);
    // if ($size < 10)
    if ($size < 1048576 && in_array($name, $allowed))
        return 1;
    else
        return 0;
}


function pdfValidation($name)
{
    $allowed = ['pdf'];
    $name = explode(".", $name);
    $name = end($name);
    // if ($size < 10)
    if (in_array($name, $allowed))
        return 1;
    else
        return 0;
}
