<?php
include_once "config.php";
$id = $_POST['id'];
$add = $_POST['add'];

//checking weither its addition or Subtraction needed 

if ($add == 1) {

    // fetching id of product and quantity

    $sql = "SELECT * FROM `addtocart` WHERE id=$id";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        $result = mysqli_fetch_assoc($res);
        $quan = $result['quantity'] + 1;
        $product_id = $result['product_id'];

        // updating stock value in product table

        $ql = "SELECT * FROM `product` WHERE `id`=$product_id";
        $r = mysqli_query($con, $ql);
        if (mysqli_num_rows($r) > 0) {
            $resu = mysqli_fetch_assoc($r);

            // checking if the item is available

            if ($resu['stock'] > 0) {
                $stock = $resu['stock'] - 1;
                $sl = "UPDATE `product` SET `stock`=$stock WHERE id=$product_id";
                if (mysqli_query($con, $sl)) {

                    //updating quantity 

                    $sq = "UPDATE `addtocart` SET `quantity`=$quan WHERE `id`=$id";
                    if (mysqli_query($con, $sq)) {
                        echo 1;
                    }
                }
            } else {
                echo 2;
            }
        }
    }
}

//checking weither its addition or Subtraction needed

if ($add != 1) {

    // fetching id of product and quantity

    $sql = "SELECT * FROM `addtocart` WHERE id=$id";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        $result = mysqli_fetch_assoc($res);
        $quan = $result['quantity'] + 1;
        $product_id = $result['product_id'];

        // updating stock value in product table

        $ql = "SELECT * FROM `product` WHERE `id`=$product_id";
        $r = mysqli_query($con, $ql);
        if (mysqli_num_rows($r) > 0) {
            $resu = mysqli_fetch_assoc($r);
            $stock = $resu['stock'] + 1;
            $sl = "UPDATE `product` SET `stock`=$stock WHERE id=$product_id";
            if (mysqli_query($con, $sl)) {

                //updating quantity 

                $sq = "UPDATE `addtocart` SET `quantity`=$quan WHERE `id`=$id";
                if (mysqli_query($con, $sq)) {
                    echo 1;
                }
            }
        }
    }
}
