<?php
session_start();
define("app", dirname(dirname(__FILE__)));
define("url", "http://localhost/Province-no-1-Coop-Org-Ltd/admin/");
define("product_url", url . "../uploads/products/");
define("product_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/products/");

define("member_url", url . "../uploads/members/");
define("member_upload", dirname(dirname(dirname(__FILE__))) . "/uploads/members/");

define("reports", dirname(dirname(dirname(__FILE__))) . "/uploads/reports/");



require app . "/../config/db_config.php";
