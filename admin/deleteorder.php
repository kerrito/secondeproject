<?php 
include_once "../config.php";
$id=$_POST['id'];
$sql="DELETE FROM `order` WHERE `id`=$id";
if(mysqli_query($con,$sql)){
    $_SESSION['error']=20;
    header("location:order.php");
    exit;
}




?>