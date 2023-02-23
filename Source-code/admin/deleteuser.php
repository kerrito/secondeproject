<?php 
include_once "../config.php";
if($_SESSION['login']!="true"){
    header("location:../index.php");
    exit;
}
$email=$_SESSION['email'];
$chkid="SELECT * FROM `signup` WHERE `email`='$email'";
$chkres=mysqli_query($con,$chkid);
if(mysqli_num_rows($chkres)>0){
    $chkresult=mysqli_fetch_assoc($chkres);
    $userrol=$chkresult['user_rol'];
    if($userrol==2){

    }else if( $userrol==3){
        header("location:order.php");
        exit;
    }else{
        header("location:../index.php");
        exit;
    }
}
$id=$_POST['id'];
$l="SELECT * FROM `signup` WHERE `id`=$id";
$res=mysqli_query($con,$l);
if(mysqli_num_rows($res)>0){
    $result=mysqli_fetch_assoc($res);
    $email=$result['email'];
    $pass=$result['pass'];
    $s="INSERT INTO `banuser` SET `email`='$email',`pass`='$pass'";


$sql="DELETE FROM `signup` WHERE id=$id";

if(mysqli_query($con,$s)){
if(mysqli_query($con,$sql)){
    echo 1;
    }
}
}
