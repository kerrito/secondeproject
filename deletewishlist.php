<?php 
include "config.php";
if($_SESSION['login']!="true"){
    header("location:index.php");
    exit;
}
$id=$_POST['id'];
$sql="DELETE FROM `wishlist` WHERE `id`=$id";
if(mysqli_query($con,$sql)){
    echo 1;
}





?>