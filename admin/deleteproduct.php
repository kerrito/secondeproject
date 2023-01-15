<?php 
include_once "../config.php";
$id=$_GET['id'];
$sql="DELETE FROM `product` WHERE id=$id";
if(mysqli_query($con,$sql)){
    $_SESSION['error']=2;
    header("location:product.php");
    exit;
}else{
    $_SESSION['error']=3;
    header("location:product.php");
    exit;
}

?>