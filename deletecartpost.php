<?php 
include "config.php";
if($_SESSION['login']!="true"){
    header("location:index.php");
    exit;
}
$id=$_POST['id'];
$ql="SELECT * FROM `addtocart` WHERE `id`=$id";
$res=mysqli_query($con,$ql);
if(mysqli_num_rows($res)>0){
    $resu=mysqli_fetch_assoc($res);
    $product_id=$resu['product_id'];
    $quantity=$resu['quantity'];
    $sql="DELETE FROM `addtocart` WHERE `id`=$id";
    if(mysqli_query($con,$sql)){
        $q="SELECT * FROM `product` WHERE `id`=$product_id";
        $resul=mysqli_query($con,$q);
        if(mysqli_num_rows($resul)>0){
            $resilt=mysqli_fetch_assoc($resul);
            $stock=$resilt['stock']+$quantity;
            $l="UPDATE `product` SET `stock`=$stock WHERE `id`=$product_id";
            if(mysqli_query($con,$l)){
                echo 1;
            }
        }
    }
}

?>