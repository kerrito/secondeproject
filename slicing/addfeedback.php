<?php
include_once "../config.php";
    $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $msg=mysqli_real_escape_string($con,$_POST['message']);
    $number=$_POST['number'];
    $page=$_POST['page'];
    if($page==1){
    $sql="INSERT INTO `feedback` SET `name`='$firstname',`lastname`='$lastname',`email`='$email',`feedback`='$msg',`number`=$number";
    }
    if($page==2){
    $sql="INSERT INTO `contact` SET `name`='$firstname',`lastname`='$lastname',`email`='$email',`msg`='$msg',`number`=$number";
    }
    if(mysqli_query($con,$sql)){
        echo 1;
        
    }else{
echo 2;
    }
    ?>