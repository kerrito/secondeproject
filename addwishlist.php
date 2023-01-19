<?php 
include_once "config.php";
$product_id=$_POST['id'];
$email=$_SESSION['email'];
$pass=$_SESSION['pass'];
$sql="SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
$res=mysqli_query($con,$sql);
if($res){
    $result=mysqli_fetch_assoc($res);
    $user_id=$result['id'];
    $ql="INSERT INTO `wishlist` SET `product_id`=$product_id,`user_id`=$user_id,`user_email`='$email'";
    if(mysqli_query($con,$ql)){
        echo 1;
    }
}

?>
