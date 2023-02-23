<?php 
include_once "config.php";

$email=$_SESSION['email'];
$pass=$_SESSION['pass'];
$sql="UPDATE `signup` SET `status`=0 WHERE `email`='$email' AND `pass`='$pass'";
$res=mysqli_query($con,$sql);
if($res){
session_destroy();
header("location:index.php");
exit;
}
?>