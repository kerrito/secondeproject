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
$page=$_POST['page'];
if($page==1){
    $sql="DELETE FROM `contact` WHERE `id`=$id";
}
if($page==2){
$sql="DELETE FROM `feedback` WHERE `id`=$id";
}
if(mysqli_query($con,$sql)){
    echo 1;
}




?>