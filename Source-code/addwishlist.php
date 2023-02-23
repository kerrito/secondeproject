<?php 
include_once "config.php";
if($_SESSION['login']!="true"){
    header("location:index.php");
    exit;
}
$product_id=$_POST['id'];
$email=$_SESSION['email'];
$pass=$_SESSION['pass'];
$sql="SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
$res=mysqli_query($con,$sql);
if($res){
    $result=mysqli_fetch_assoc($res);
    $user_id=$result['id'];
    $ckrecord="SELECT * FROM `wishlist` WHERE `product_id`=$product_id AND `user_id`=$user_id";
    $resckrecord=mysqli_query($con,$ckrecord);
    if(mysqli_num_rows($resckrecord)==0){
        $ql="INSERT INTO `wishlist` SET `product_id`=$product_id,`user_id`=$user_id,`user_email`='$email'";
    if(mysqli_query($con,$ql)){
        echo 1;
    }else {
        echo 2;
    }
    }else{
        echo 9;
    }
    
}

?>
