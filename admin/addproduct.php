<?php
include_once "slicing/headerlinks.php";
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
if(isset($_POST['btn'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $price=$_POST['price'];
    $brand=mysqli_real_escape_string($con,$_POST['brand']);
    $categories=mysqli_real_escape_string($con,$_POST['categories']);
    $desc=mysqli_real_escape_string($con,$_POST['desc']);
    $stock=$_POST['stock'];
    $image=$_FILES['image']['name'];
    $format=array("jpg","png","JPG","PNG");
    $path=pathinfo($image,PATHINFO_EXTENSION);
    if(in_array($path,$format)){
        $tmp=$_FILES['image']['tmp_name'];
        $newpath=time()."PNG";
    if(move_uploaded_file($tmp,"../uploads/img/".$newpath)){
        $sql="INSERT INTO `product` SET `name`='$name',`price`=$price,`brand`='$brand',`categories`='$categories',`desc`='$desc',`img`='$newpath',`stock`=$stock";
        if(mysqli_query($con,$sql)){
            $_SESSION['error']=1;
            header("location:product.php");
            exit;
        }
    }
        
    }else{
        $_SESSION['error']="Image only allowed in .JPG(.jpg) and .PNG(.png) format";
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
                        <li><a href="product.php">Add Products</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="login-form">
                                <h4 class="login-title text-center mb-4">Add Product Here</h4>
                                <?php 
                                if($_SESSION['error']!=null){
                                    ?>
                                    <p class="text-center text-danger"></p>
                                    <?php
                                    $_SESSION['error']="";
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Name</label>
                                        <input class="mb-0 form-control" type="text" name="name" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Price</label>
                                        <input class="mb-0 form-control" type="number" name="price" placeholder="Enter Your Email Address Here" required>
                                    </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Brand</label>
                                            <input class="mb-0 form-control" type="text" name="brand" placeholder="Enter Your Email Address Here" required>
                                        </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Stock</label>
                                        <input class="mb-0 form-control" type="number" name="stock" placeholder="Enter Stock In Numbers" required>
                                    </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="email">Categories</label>
                                            <select name="categories" id="" class="form-control">
                                                <option value="Gift">Gift Articals</option>
                                                <option value="Art">Art Articals</option>
                                                <option value="Hand Bags">Hand Bags</option>
                                                <option value="Wallet">Wallet</option>
                                                <option value="Doll">Dolls</option>
                                                <option value="Greeting Card">Greeting Cards</option>
                                                <option value="File">Files</option>
                                                </select>
                                            <!-- <input class="mb-0 form-control" type="text" name="pub" placeholder="Enter Your Email Address Here" required> -->
                                        </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="password">Image</label>
                                        <input class="mb-0 form-control" type="file" name="image" required>
                                    </div>
                                    <div class="col-md-12 mb-3 d-flex flex-column">
                                        <label for="name">Description</label>
                                        <textarea name="desc" id="" cols="30" rows="3" placeholder="Enter Description Here"></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" name="btn">Add Product</button>
                                    </div>
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