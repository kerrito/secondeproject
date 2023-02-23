<?php
include_once "slicing/headerlinks.php";
$page="Login Page";
if (isset($_POST['btnn1'])) {
    $email =mysqli_real_escape_string($con,$_POST['logemail']);
    $pass = md5($_POST['logpass']);
    $s = "SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
    $res = mysqli_query($con, $s);
    if (mysqli_num_rows($res)>0 ) {
        $_SESSION['login'] = "true";
        $_SESSION['email'] = "$email";
        $_SESSION['pass'] = "$pass";
        $result = mysqli_fetch_assoc($res);
        $sl = "UPDATE `signup` SET `status`=1 WHERE `email`='$email' AND `pass`='$pass'";
        if (mysqli_query($con, $sl)) {
            if ($result['user_rol'] == 2 || $result['user_rol'] == 3) {
                header("location:admin/index.php");
                exit;
            } else {
                header("location:index.php");
                exit;
            }
        }
    }else{
        $qu="SELECT * FROM `banuser` WHERE `email`='$email' AND `pass`='$pass'";
        $or=mysqli_query($con,$qu);
        if(mysqli_num_rows($or)>0){
            $_SESSION['msg']="You Have Been Banned By Admin For Further Information Contact The Admin on Email : Admin@gmail.com Or Call : 12345"; 
        }else{
            $_SESSION['msg']="Incorrect Email Or Password";
        }
    }
}

?>

<body>
    <?php
    // starting Navbar section
    include_once "slicing/nav.php";
    // Ending Navbar section

    // Starting Side Navbar section
    include_once "slicing/sidenav.php";
    // Ending side Navbar section


    ?>
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
       <?php 
       include_once "slicing/breadcrum.php";
       ?>
        <!-- End breadcrumb section -->

        <!-- Start login form section  -->
        <div class="login__section section--padding">
            <div class="container">
                <form action="#" method="POST">
                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1 justify-content-center">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                        <?php 
                                        if($_SESSION['msg']!=null){
                                            ?>
                                            <p class="account__login--header__desc text-danger text-center"><?=$_SESSION['msg']?></p>
                                            <?php
                                            $_SESSION['msg']="";
                                        }
                                        ?>
                                        <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Email Addres" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" name="logemail" title="Please enter valid email" type="email" required>
                                        <input class="account__login--input" placeholder="Password" name="logpass" type="password" pattern="[A-Za-z0-9]{6,}" title="password must have 6 digits" required>
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <!-- <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Remember me</label>
                                            </div> -->
                                            <button class="account__login--forgot" type="submit"><a href="forgot.php">Forgot Your Password?</a></button>
                                        </div>
                                        <button class="account__login--btn primary__btn mb-5" name="btnn1" type="submit">Login</button>
                                        <!-- <div class="account__login--divide">
                                            <span class="account__login--divide__text">OR</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                            <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                                            <a class="account__social--link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                                        </div> -->
                                        <p class="account__login--signup__text">Don,t Have an Account? <button type="submit"><a href="signup.php">Sign up now</a></button></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Username" type="text" name="name">
                                        <input class="account__login--input" placeholder="Email Addres" type="text" name="email">
                                        <input class="account__login--input" placeholder="Number" type="number" name="number">
                                        <input class="account__login--input" placeholder="Password" type="password" name="pass">
                                        <textarea name="address" class="account__login--input" id="" rows="3" placeholder="Address"></textarea>
                                        <button class="account__login--btn primary__btn mb-10" name="btn" type="submit">Submit & Register</button>
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End login form section  -->

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