<?php 
include_once "config.php";
session_destroy();
header("location:home.php");
exit;
?>