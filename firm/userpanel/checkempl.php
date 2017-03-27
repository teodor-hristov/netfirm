<?php
session_start();
ob_start();
include "../../includes/config.php";


$userid = $_POST['id'];
$query = mysql_query("SELECT * FROM `emploee` WHERE `id` = '$userid'");
$array = mysql_fetch_array($query);
$check = mysql_num_rows($query);


	$_SESSION['employer'] = $array;

?>