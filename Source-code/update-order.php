<?php 
include_once "config.php";
if($_SESSION['login']!="true"){
    header("location:index.php");
    exit;
}
if($_POST['page']==1){
$id=$_POST['id'];
$time=time();
$sql="UPDATE `order` SET `state`='Recieved',`remainning_time`=$time  WHERE `id`='$id'";
if(mysqli_query($con,$sql)){
echo 1;
}
}

if($_POST['page']==2){
    $id=$_POST['id'];
    $val=$_POST['val'];
    $time=time();
$sql="UPDATE `order` SET `state`='Return',`remainning_time`=$time ,`reason`='$val' WHERE `id`='$id'";
if(mysqli_query($con,$sql)){
echo 1;
}
}

?>