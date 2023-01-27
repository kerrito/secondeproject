<?php 
include_once "../config.php";
$id=$_POST['id'];
$sql="DELETE FROM `contact` WHERE `id`=$id";
if(mysqli_query($con,$sql)){
    echo 1;
}




?>