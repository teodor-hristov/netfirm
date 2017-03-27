<?php
session_start();
ob_start();
include "../../includes/config.php";


$userid = $_POST['id'];
$query = mysql_query("DELETE FROM `emploee` WHERE `id` = '$userid'");
?>