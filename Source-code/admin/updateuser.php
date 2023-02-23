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
if (isset($_POST['btn'])) {
    if (isset($_POST['btn'])) {
        $is=$_GET['id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $pass =md5($_POST['pass']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $userrol=$_POST['userrol'];
        $number=$_POST['number'];
        $sql = "UPDATE `signup` SET `name`='$name',`email`='$email',`number`=$number,`address`='$address',`pass`='$pass' ,`user_rol`=$userrol WHERE `id`=$is";
        if (mysqli_query($con, $sql)) {
            $_SESSION['error'] = 1;
            header("location:index.php");
            exit;
        }
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
                        <li><a href="product.php">Edit User</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="login-form">
                                <h4 class="login-title text-center mb-4">Edit User Here</h4>
                                <div class="row">
                                <?php
                                        $id = $_GET['id'];
                                        $lq = "SELECT * FROM `signup` WHERE `id`=$id";
                                        $res = mysqli_query($con, $lq);
                                        if ($res) {
                                            $result = mysqli_fetch_assoc($res);
                                        
                                        ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Name</label>
                                        <input class="mb-0 form-control" value="<?=$result['name']?>" type="text" name="name" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input class="mb-0 form-control" value="<?=$result['email']?>" type="text" name="email" placeholder="Enter Your Email Address Here" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Number</label>
                                        <input class="mb-0 form-control" value="<?=$result['number']?>" type="number" name="number" placeholder="Enter Your Number Here" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Account</label>
                                        <select name="userrol" class="form-control" id="">
                                        <?php 
                                        if($result['user_rol']==1){
                                        ?>
                                            <option value="1">User</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Employee</option>
                                            <?php 
                                            }
                                            if($result['user_rol']==2){
                                            ?>
                                            
                                            <option value="2">Admin</option>
                                            <option value="1">User</option>
                                            <option value="3">Employee</option>
                                            <?php 
                                            }
                                            if($result['user_rol']==3){
                                                
                                            ?>
                                            <option value="3">Employee</option>
                                            <option value="1">User</option>
                                            <option value="2">Admin</option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="password">Password</label>
                                        <input class="mb-0 form-control" type="password" name="pass" placeholder="Enter Your Password In Numbers Here" required>
                                    </div>
                                    <div class="col-md-12 mb-3 d-flex flex-column">
                                        <label for="name">Address</label>
                                        <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Enter Your Address Here"><?=$result['address']?></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" name="btn">edit Product</button>
                                    </div>
                                    <?php 
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