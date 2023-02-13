<?php
include_once "slicing/headerlinks.php";
$page="Register Page";
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address=$_POST['address'];
    $pass = md5($_POST['pass']);
    $qu="SELECT * FROM `banuser` WHERE email='$email' AND `pass`='$pass'";
    $r=mysqli_query($con,$qu);
    if(mysqli_num_rows($r)==0){
    $sql = "INSERT INTO `signup` SET  `name`='$name',`email`='$email',`number`=$number,`address`='$address',`pass`='$pass',`status`=1";
    if (mysqli_query($con, $sql)) {
        $_SESSION['login'] = "true";
        $_SESSION['email'] = "$email";
        $_SESSION['pass'] = "$pass";
        $q = "SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
        $res = mysqli_query($con, $q);
        if ($res) {
            $result = mysqli_fetch_assoc($res);
                if ($result['user_rol'] == 2 || $result['user_rol'] == 3) {
                    header("location:admin/index.php");
                    exit;
                } else {
                    header("location:index.php");
                    exit;
                }
            }
        }
    }else{
        $_SESSION['msg']="You Have Been Banned By Admin For Further Information Contact The Admin on Email : Admin@gmail.com Or Call : 12345"; 
    }
}
?>

<body>
    <?php
    // Starting Navbar section
    include_once "slicing/nav.php";
    // Ending Navbar section

    // Starting Side Navbar section
    include_once "slicing/sidenav.php";
    // Ending Side Navbar section


    ?>
    <main class="main__content_wrapper">

         <!-- Starting breadcrum section  -->
       <?php
        include_once "slicing/breadcrum.php";
        ?>
        <!-- End breadcrumb section -->

        <!-- Start signup section  -->
        <div class="login__section section--padding">
            <div class="container">
                <form action="#" method="POST">
                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1 justify-content-center">
                            <!-- <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                        <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Email Addres" name="logemail" type="text">
                                        <input class="account__login--input" placeholder="Password" name="logpass" type="password">
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Remember me</label>
                                            </div>
                                            <button class="account__login--forgot" type="submit">Forgot Your Password?</button>
                                        </div>
                                        <button class="account__login--btn primary__btn" name="btnn1" type="submit">Login</button>
                                        <div class="account__login--divide">
                                            <span class="account__login--divide__text">OR</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                            <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                                            <a class="account__social--link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                                        </div>
                                        <p class="account__login--signup__text">Don,t Have an Account? <button type="submit">Sign up now</button></p>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                    <?php 
                                        if($_SESSION['msg']!=null){
                                            ?>
                                            <p class="account__login--header__desc text-danger text-center"><?=$_SESSION['msg']?></p>
                                            <?php
                                            $_SESSION['msg']="";
                                        }
                                        ?>
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Username" type="text" name="name" pattern="[A-za-z ]{3,16}" title="Name must contain 3 to 16 character no special character allowed" required>
                                        <input class="account__login--input" placeholder="Email Addres" type="text" name="email" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" title="Your email must contain least 3 character at starting and @" required>
                                        <input class="account__login--input" placeholder="Number" type="tel" name="number" pattern="[0-9]{11}" title="number must contain 11 numbers" required>
                                        <input class="account__login--input" placeholder="Password" type="password" name="pass" pattern="[A-Za-z0-9]{6,}" title="password must have 6 digits" required>
                                        <input name="address" class="account__login--input" id="" rows="3" placeholder="Address" pattern="[A-Za-z0-9,/-_\ ]{20,100}" title="Address must contain 15 to 200 character No special character other than , / - _ \ allowed" required>
                                        <!-- <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div> -->
                                        <button class="account__login--btn primary__btn mb-10" name="btn" type="submit">Submit & Register</button>
                                    </div>
                                    <p class="account__login--signup__text">Already Have An Account <button type="submit"><a href="login.php">Login now</a></button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End signup section  -->

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