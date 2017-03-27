<?php
session_start();
ob_start();
if($_SESSION['is-logged-calc'] == false || $_SESSION['user']['rank'] == 1)
{
    header("Location: ../index.php");
}
else
{
include "../../includes/config.php";
    if(isset($_FILES['image'])){
        $errors= array();
        $id = $_SESSION['user']['id'];
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type']; 
        $newname = $id . ".jpg";
        $file_ext=$_FILES['image']['name'];
        $check = mysql_query("SELECT `id` FROM `users` WHERE `id` = '$id'");
        $num = mysql_num_rows($check);
        
        $expensions= array("jpeg","jpg","png","gif");         
        if(in_array($file_ext,$expensions)!= false){
            echo "Не е снимка";
        }
        if($file_size > 2097152){
        echo 'Прекалено голям е.';
        }               
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"uploads/".$newname);
        header("Location: index.php");

        }else{
        header("Location: error.php");
        }
    }
}
?>