<?php 
include_once "../config.php";
$id=$_POST['id'];
$l="SELECT * FROM `signup` WHERE `id`=$id";
$res=mysqli_query($con,$l);
if(mysqli_num_rows($res)>0){
    $result=mysqli_fetch_assoc($res);
    $email=$result['email'];
    $pass=$result['pass'];
    $s="INSERT INTO `banuser` SET `email`='$email',`pass`='$pass'";


$sql="DELETE FROM `signup` WHERE id=$id";
if(mysqli_query($con,$sql)){
    if(mysqli_query($con,$s)){
    echo 1;
    }
}
}
