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


if (!isset($_SESSION['user_name']) && !$login && !$forgot_password)
    header("Location:" . url . "login.php");
