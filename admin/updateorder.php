<?php
include_once "slicing/headerlinks.php";
if (isset($_GET['btn'])) {
    $name = $_GET['name'];
    $ema = $_GET['email'];
    $number = $_GET['number'];
    $city = $_GET['city'];
    $country = $_GET['country'];
    $address = $_GET['address'];
    $quantity = $_GET['quantity'];
    $payment = $_GET['payment'];
    $state = $_GET['state'];
    $price = $_GET['price'];
    $iddd=$_GET['id'];
    $s = "UPDATE `order` SET `name`='$name',`email`='$ema',`city`='$city',`country`='$country',`address`='$address',`number`=$number,`payment`='$payment',`quantity`=$quantity,`price`=$price,`state`='$state' Where `id`=$iddd";
    if (mysqli_query($con, $s)) {
        $_SESSION['error']="";
        header("location:order.php");
        exit;
    }
}

?>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php
        include_once "slicing/dashheader.php";

        include_once "slicing/dashsidebar.php";
        ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2"><a href="../index.php">
                            <h1>Home</h1>
                        </a></h1>
                    <ul>
                        <li><a href="#">Edit Order Details</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form >
                            <div class="login-form">
                                <h4 class="login-title text-center mb-4">Edit Order Details Here</h4>
                                <div class="row">
                                <?php
                                        $id = $_GET['id'];
                                        $lq = "SELECT * FROM `order` WHERE `id`=$id";
                                        $res = mysqli_query($con, $lq);
                                        if ($res) {
                                            $result = mysqli_fetch_assoc($res);
                                            $idd=$result['product_id'];
                                        $u="SELECT * FROM `product` WHERE `id`=$idd";
                                        $t=mysqli_query($con,$u);
                                        if(mysqli_num_rows($t)>0){
                                            $yt=mysqli_fetch_assoc($t);

                                        
                                        ?>
                                    <div class="col-md-6 mb-3 d-none">
                                        <label for="email">id</label>
                                        <input class="mb-0 form-control" value="<?=$result['id']?>" type="text" name="id" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Name</label>
                                        <input class="mb-0 form-control" value="<?=$result['name']?>" type="text" name="name" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input class="mb-0 form-control" value="<?=$result['email']?>" type="text" name="email" placeholder="Enter Your Email Address Here" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Product Name</label>
                                        <input class="mb-0 form-control" type="text" value="<?=$yt['name']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Product Brand</label>
                                        <input class="mb-0 form-control" type="text" value="<?=$yt['brand']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Categories</label>
                                            <select name="categories" id="" class="form-control">
                                                <option value="<?= $yt['categories'] ?>"><?= $yt['categories'] ?></option>
                                                <?php if($yt['categories']!="Gift"){ ?>
                                                <option value="Gift">Gift Articals</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="Art"){ ?>
                                                <option value="Art">Art Articals</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="Hand Bags"){ ?>
                                                <option value="Hand Bags">Hand Bags</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="Wallet"){ ?>
                                                <option value="Wallet">Wallet</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="Doll"){ ?>
                                                <option value="Doll">Dolls</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="Greeting Card"){ ?>
                                                <option value="Greeting Card">Greeting Card</option>
                                                <?php }?>
                                                <?php if($yt['categories']!="File"){ ?>
                                                <option value="File">Files</option>
                                                <?php }?>
                                            </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Process Stage</label>
                                        <select name="state" class="form-control" id="">
                                        <option value="<?=$result['state']?>"><?=$result['state']?></option>
                                        <?php if($result['state']!="Pending"){ ?>
                                        <option value="Pending">Pending</option>
                                        <?php }?>
                                        <?php if($result['state']!="Dispatch"){ ?>
                                        <option value="Dispatch">Dispatch</option>
                                        <?php }?>
                                        <?php if($result['state']!="Delivered"){ ?>
                                        <option value="Delivered">Delivered</option>
                                        <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Number</label>
                                        <input class="mb-0 form-control" value="<?=$result['number']?>" type="number" name="number" placeholder="Enter Your Number Here" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Quantity</label>
                                        <input class="mb-0 form-control" type="number" name="quantity" placeholder="Enter Product Quantity In Numbers Here" value="<?=$result['quantity']?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Amount</label>
                                        <input class="mb-0 form-control" type="number" name="price" placeholder="Enter Amount In Numbers Here" value="<?=$result['price']?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">City</label>
                                        <input class="mb-0 form-control" type="text" name="city" placeholder="Enter City Name Here" value="<?=$result['city']?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Country</label>
                                        <input class="mb-0 form-control" type="text" name="country" placeholder="Enter Country Name Here" value="<?=$result['country']?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Payment Method</label>
                                        <select name="payment" class="form-control" id="">
                                        <option value="<?=$result['payment']?>"><?=$result['payment']==0?"On Delivery":"By Card"?></option>
                                        <?php if($result['payment']!=0){ ?>
                                        <option value="0">On delivery</option>
                                        <?php }?>
                                        <?php if($result['payment']!=1){ ?>
                                        <option value="1">By Card</option>
                                        <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3 d-flex flex-column">
                                        <label for="name">Address</label>
                                        <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Enter Your Address Here"><?=$result['address']?></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" name="btn">edit order</button>
                                    </div>
                                    <?php 
                                    }
                                }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <?php
    include_once "slicing/dashjslinks.php";
    ?>

</body>

</html>