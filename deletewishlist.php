<?php 
include "config.php";
$id=$_POST['id'];
$sql="DELETE FROM `wishlist` WHERE `id`=$id";
if(mysqli_query($con,$sql)){
    echo 1;
}





?>