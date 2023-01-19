<?php
include_once "slicing/headerlinks.php";
$page="";
?>

<body>
    <?php
    include_once "slicing/nav.php";
    include_once "slicing/sidenav.php";
    ?>

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <?php
                            if($_SESSION['login']=="true"){
                            $email=$_SESSION['email'];
                            $pass=$_SESSION['pass'];
                            $sql="SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
                            $res=mysqli_query($con,$sql);
                            if($res){
                                $result=mysqli_fetch_assoc($res);
                                if($result['user_rol']==2 || $result['user_rol']==3){
                                    
                            
                            ?>
                            <li class="account__menu--list"><a href="admin/index.php">Dashboard</a></li>
                            <?php 
                            }
                            ?>
                            <li class="account__menu--list active"><a href="account.php"><?=$result['user_rol']==2 || $result['user_rol']==3?"Admin":"User"?> Profile</a></li>
                            <li class="account__menu--list"><a href="wishlist.php">Wishlist</a></li>
                            <li class="account__menu--list"><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h3 class="account__content--title mb-20"><?=$result['user_rol']==2 || $result['user_rol']==3?"Admin":"User"?> Profile</h3>
                            <!-- <button class="new__address--btn primary__btn mb-25" type="button">Add a new address</button> -->
                            <div class="account__details two">
                                <h4 class="account__details--title"><?=$result['user_rol']==2 || $result['user_rol']==3?"Admin":"User"?> Account Detail</h4>
                                <p class="account__details--desc">Name : <?=$result['name']?> <br>Email : <?=$result['email']?> <br>Number : <?=$result['number']?> <br>Address : <?=$result['address']?></p>
                            </div>
                            <div class="account__details--footer d-flex">
                                <button class="account__details--footer__btn" type="button">Edit</button>
                            </div>
                        </div>
                    </div>  
                            <?php
                        }
                    }else{
                        ?>
                        <li class="account__menu--list active"><a href="account.php">Addresses</a></li>
                            <li class="account__menu--list"><a href="wishlist.php">Wishlist</a></li>
                            <li class="account__menu--list"><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h3 class="account__content--title mb-20">Addresses</h3>
                            <button class="new__address--btn primary__btn mb-25" type="button">Add a new address</button>
                            <div class="account__details two">
                                <h4 class="account__details--title">Default</h4>
                                <p class="account__details--desc">Guest <br> Not Known <br> Not Known <br>Not Known</p>
                                <a class="account__details--link" href="my-account-2.html">View Addresses (1)</a>
                            </div>
                            <div class="account__details--footer d-flex">
                                <button class="account__details--footer__btn" type="button">Edit</button>
                                <button class="account__details--footer__btn" type="button">Delete</button>
                            </div>
                        </div>
                    </div> 
                    <?php 
                    }
                            ?>
                          
                </div>
            </div>
        </section>
        <!-- my account section end -->


    </main>

    <?php
    include_once "slicing/footer.php";
    ?>

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

        <?php 
include_once "slicing/jslinks.php";
?>

</body>

</html>