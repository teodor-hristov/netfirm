<?php
error_reporting(0);
session_start();
ob_start();
include "../../includes/config.php";


$userid = $_POST['id'];
$query = mysql_query("DELETE FROM `calculator` WHERE `id` = '$userid'");
?>