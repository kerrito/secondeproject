<?php
include_once "config.php";
if ($_SESSION['login'] != "true") {
    header("location:index.php");
    exit;
}
$product_id = $_POST['id'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
$sql = "SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
$res = mysqli_query($con, $sql);
if ($res) {
    $result = mysqli_fetch_assoc($res);
    $user_id = $result['id'];

    $l = "SELECT * FROM `product` WHERE `id`=$product_id";
    $lres = mysqli_query($con, $l);
    if (mysqli_num_rows($lres) > 0) {
        $lr = mysqli_fetch_assoc($lres);
        if ($lr['stock'] > 0) {

            $stock = $lr['stock'] - 1;
            $lsq = "UPDATE `product` SET `stock`=$stock WHERE `id`=$product_id";
            if (mysqli_query($con, $lsq)) {
                $ql = "INSERT INTO `addtocart` SET `product_id`=$product_id,`user_id`=$user_id,`user_email`='$email'";
                if (mysqli_query($con, $ql)) {
                    echo 1;
                }
            } 
        }else {
            echo 2;
        }
    }
}
