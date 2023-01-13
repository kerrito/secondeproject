<?php 
session_start();
$con=mysqli_connect("localhost","root","","oscart");
if(!$son){
    echo "Failed To Connect With Database";
}


?>