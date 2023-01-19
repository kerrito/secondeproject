<?php 
include "config.php";
$id=$_POST['id'];
$sql="DELETE FROM `addtocart` WHERE `id`=$id";
if(mysqli_query($con,$sql)){
    echo 1;
}
?>