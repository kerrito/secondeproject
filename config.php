<?php 
session_start();
$con=mysqli_connect("localhost","root","","oscart");
if(!$con){
    echo "Failed To Connect With Database";
}
if(!isset($_SESSION['error'])){
$_SESSION['error']="";
}
if(!isset($_SESSION['login'])){
$_SESSION['login']="";
}
if(!isset($_SESSION['email'])){
    $_SESSION['email']="";
}
if(!isset($_SESSION['pass'])){
    $_SESSION['pass']="";
}
if(!isset($_SESSION['msg'])){
    $_SESSION['msg']="";
}

?>