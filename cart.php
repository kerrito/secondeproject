<?php
include_once "slicing/headerlinks.php";
$page = "Shopping Cart";
if (isset($_GET['orderbtn'])) {
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $ema = mysqli_real_escape_string($con, $_GET['email']);
    $number = $_GET['number'];
    $city = mysqli_real_escape_string($con, $_GET['city']);
    $country = mysqli_real_escape_string($con, $_GET['country']);
    $address = mysqli_real_escape_string($con, $_GET['address']);
    $cardname = mysqli_real_escape_string($con, $_GET['cardname']);
    $cardnumber = $_GET['cardnum'] != null ?: 0;
    $cardcvv = $_GET['cardcvv'] != null ?: 0;
    $cardexp = mysqli_real_escape_string($con, $_GET['expdate'] != null ?: 0);
    if (isset($_GET['online'])) {
        $email = $_SESSION['email'];
        $ls = "SELECT * FROM `addtocart` WHERE `user_email`='$email' AND `state`='pending'";
        $r = mysqli_query($con, $ls);
        if (mysqli_num_rows($r) > 0) {
            $cart_id = date("hisa") . time();
            foreach ($r as $value) {
                $idd = $value['product_id'];
                $quantity = $value['quantity'];
                $a = "SELECT * FROM `product` WHERE `id`=$idd";
                $as = mysqli_query($con, $a);
                if (mysqli_num_rows($as) > 0) {
                    $ans = mysqli_fetch_assoc($as);
                    $price = $ans['price'] * $quantity;
                    $s = "INSERT INTO `order` SET `id`=$cart_id, `name`='$name',`email`='$ema',`user_email`='$email',`city`='$city',`country`='$country',`address`='$address',`number`=$number,`payment`='1',`quantity`=$quantity,`product_id`=$idd,`card_name`='$cardname',`card_number`=$cardnumber,`card_cvv`=$cardcvv,`card_exp`='$cardexp',`price`=$price";
                    if (mysqli_query($con, $s)) {
                        $t = "UPDATE `addtocart` SET `state`='done' WHERE `user_email`='$email'";
                        if (mysqli_query($con, $t)) {
                            $_SESSION['error'] = $cart_id;
                            header("location:index");
                            exit;
                        }
                    }
                }
            }
        }
    }
    if (isset($_GET['ondelivery'])) {
        $email = $_SESSION['email'];
        $ls = "SELECT * FROM `addtocart` WHERE `user_email`='$email' AND `state`='pending'";
        $r = mysqli_query($con, $ls);
        if (mysqli_num_rows($r) > 0) {
            $cart_id = "OA" . date("md") . time();
            foreach ($r as $value) {
                $idd = $value['product_id'];
                $quantity = $value['quantity'];
                $a = "SELECT * FROM `product` WHERE `id`=$idd";
                $as = mysqli_query($con, $a);
                if (mysqli_num_rows($as) > 0) {
                    $ans = mysqli_fetch_assoc($as);
                    $price = $ans['price'] * $quantity;
                    $s = "INSERT INTO `order` SET `tracking_id`='$cart_id', `name`='$name',`email`='$ema',`user_email`='$email',`city`='$city',`country`='$country',`address`='$address',`number`=$number,`payment`='0',`quantity`=$quantity,`product_id`=$idd,`card_name`='$cardname',`card_number`=$cardnumber,`card_cvv`=$cardexp,`card_exp`='$cardexp' ,`price`=$price";
                    if (mysqli_query($con, $s)) {
                        $t = "UPDATE `addtocart` SET `state`='done' WHERE `user_email`='$email'";
                        if (mysqli_query($con, $t)) {
                        }
                    }
                }
            }
            $_SESSION['tracking_id'] = $cart_id;
            header("location:order-complete.php");
            exit;
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

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">
                    <form action="#">
                        <h2 class="cart__title mb-40">Shopping Cart</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="cart__table">
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                            <tr class="cart__table--header__items">
                                                <th class="cart__table--header__list">Product</th>
                                                <th class="cart__table--header__list">Price</th>
                                                <th class="cart__table--header__list">Quantity</th>
                                                <th class="cart__table--header__list">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__table--body">
                                            <?php
                                            $total = 0;
                                            $email = $_SESSION['email'];
                                            $sql = "SELECT * FROM `addtocart` WHERE `user_email`='$email' AND `state`='pending'";
                                            $res = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($res) > 0) {
                                                foreach ($res as $resu) {
                                                    $product_id = $resu['product_id'];
                                                    $ql = "SELECT * FROM `product` WHERE `id`=$product_id";
                                                    $result = mysqli_query($con, $ql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $finalresult = mysqli_fetch_assoc($result);
                                                        for ($x = 0; $x < $resu['quantity']; $x++) {
                                                            $GLOBALS['total'] += $finalresult['price'];
                                                        }
                                            ?>
                                                        <tr class="cart__table--body__items">
                                                            <h4 class="text-center text-danger" id="showerror"></h4>
                                                            <td class="cart__table--body__list">
                                                                <div class="cart__product d-flex align-items-center">
                                                                    <button class="cart__remove--btn" aria-label="search button" type="button" onclick="deletecard(<?= $resu['id'] ?>)">
                                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                                            <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                                        </svg>
                                                                    </button>
                                                                    <div class="cart__thumbnail">
                                                                        <a href="product-details.html"><img class="border-radius-5" src="uploads/img/<?= $finalresult['img'] ?>" alt="cart-product"></a>
                                                                    </div>
                                                                    <div class="cart__content">
                                                                        <h4 class="cart__content--title"><a href="product-details.html"><?= $finalresult['name'] ?></a></h4>
                                                                        <span class="cart__content--variant">
                                                                            <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $finalresult['desc'] ?></p>
                                                                        </span>
                                                                        <span class="cart__content--variant"><?= $finalresult['brand'] ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="cart__table--body__list">
                                                                <span class="cart__price"><span id="amount<?= $resu['id'] ?>"><?= $finalresult['price'] ?></span>.00 Rs</span>
                                                            </td>
                                                            <td class="cart__table--body__list">
                                                                <div class="quantity__box">
                                                                    <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" onclick="calculatesub(<?= $resu['id'] ?>,<?= $finalresult['price'] ?>)" value="Decrease Value">-</button>
                                                                    <label>
                                                                        <input type="number" class="quantity__number quickview__value--number" id="total<?= $resu['id'] ?>" value="<?= $resu['quantity'] ?>" data-counter readonly />
                                                                    </label>
                                                                    <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value" onclick="calculateadd(<?= $resu['id'] ?>,<?= $finalresult['price'] ?>)">+</button>
                                                                </div>
                                                            </td>
                                                            <td class="cart__table--body__list">
                                                                <span class="cart__price end"><span id="totalamount<?= $resu['id'] ?>"><?= $finalresult['price'] * $resu['quantity'] ?></span>.00 Rs</span>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="continue__shopping d-flex justify-content-between">
                                        <a class="continue__shopping--link" href="product.php">Continue shopping</a>
                                        <button class="continue__shopping--clear" type="submit">Clear Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="cart__summary border-radius-10 mt-5 pt-5 mb-5 pb-5">
                                    <div class="coupon__code mb-30">
                                        <h3 class="coupon__code--title mt-2">CHECK OUT</h3>
                                        <p class="coupon__code--desc mt-2 mb-5 pb-5">Please Cheack the amount below before checkout</p>
                                    </div>
                                    <div class="cart__summary--total mb-20 mt-5 pt-5">
                                        <table class="cart__summary--total__table mt-5">
                                            <tbody>
                                                <tr class="cart__summary--total__list">
                                                    <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                    <td class="cart__summary--amount text-right"><span id="subtotal"><?= $GLOBALS['total'] ?></span>.00 Rs</td>
                                                </tr>
                                                <tr class="cart__summary--total__list">
                                                    <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                    <td class="cart__summary--amount text-right"><span id="grandtotal"><?= $GLOBALS['total'] ?></span>.00 Rs</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart__summary--footer">
                                        <p class="cart__summary--footer__desc">Shipping & taxes is not included in Prices Of Product</p>
                                        <ul class="d-flex justify-content-between">
                                            <?php 
                                            if($_SESSION['login']=="true"){                              
                                                $email = $_SESSION['email'];
                                                $pass = $_SESSION['pass'];
                                                $catcart="SELECT * FROM `addtocart` WHERE `user_email`='$email' AND `state`='pending'";
                                                $catcartres=mysqli_query($con,$catcart);
                                                if(mysqli_num_rows($catcartres)>0){
                                                    ?>
                                            <li><a class="cart__summary--footer__btn primary__btn checkout" href="#order_info" id="checkoutbtn">Check Out</a></li>
                                                    <?php
                                                }else{
                                                    ?>
                                            <li><a class="cart__summary--footer__btn primary__btn checkout" onclick="psel()">Check Out</a></li>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                            <li><a class="cart__summary--footer__btn primary__btn checkout" onclick="login()">Check Out</a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- cart section end -->
        <!-- order data section -->
        <div class="row justify-content-center m-0 p-0 d-none" id="order_info">
            <?php
            if ($_SESSION['login'] == "true") {
                $email = $_SESSION['email'];
                $pass = $_SESSION['pass'];
                $catcart="SELECT * FROM `addtocart` WHERE `user_email`='$email' AND `state`='pending'";
                $catcartres=mysqli_query($con,$catcart);
                if(mysqli_num_rows($catcartres)>0){
                $sql = "SELECT * FROM `signup` WHERE `email`='$email' AND `pass`='$pass'";
                $res = mysqli_query($con, $sql);
                if ($res) {
                    $result = mysqli_fetch_assoc($res);
            ?>
                    <div class="col-md-6">
                        <section class="product__section section--padding color-scheme-2 pt-0">
                            <div class="section__heading text-center mb-35">
                                <h2 class="section__heading--maintitle style2">Shipment Details</h2>
                            </div>
                            <form action="" class="row">
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">Name</p>
                                    <input type="text" value="<?= $result['name'] ?>" class="form-control py-3 fs-4" name="name" placeholder="Enter Your Name" pattern="[A-za-z ]{3,16}" title="Name must contain 3 to 16 character no special character allowed" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">Email</p>
                                    <input type="text" value="<?= $result['email'] ?>" class="form-control py-3 fs-4" name="email" placeholder="Enter Your Email" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" title="Please enter valid email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">Number</p>
                                    <input type="number" value="<?= $result['number'] ?>" class="form-control py-3 fs-4" name="number" placeholder="Enter Your Number" pattern="[0-9]{11}" title="number must contain 11 numbers" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">City</p>
                                    <input type="text" class="form-control py-3 fs-4" name="city" placeholder="Enter Your City" pattern="[A-za-z ]{3,16}" title="City Name must contain 3 to 16 character no special character allowed" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">Country</p>
                                    <input type="text" class="form-control py-3 fs-4" name="country" placeholder="Enter Your Country" pattern="[A-za-z ]{3,16}" title="Country Name must contain 3 to 16 character no special character allowed" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="fs-3">Payment Method</p>
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <input type="checkbox" name="online" placeholder="" id="payment_card" required><span class="fs-4"> Pay With Card</span>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="ondelivery" placeholder="" id="payment_delivery" required><span class="fs-4"> Cash On Delivery</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <p class="fs-3">Address</p>
                                    <input type="text" class="form-control py-3 fs-4" name="address" placeholder="Address" value="<?= $result['address'] ?>" pattern="[A-Za-z0-9,/-_ ]{15,100}" title="Address must conyain 15 to 200 character" required>
                                </div>
                                <div class="col-12 mb-3 d-none" id="carddetail">
                                    <div class="row">
                                        <div class="section__heading text-center mb-35">
                                            <h2 class="section__heading--maintitle style2">Credit Card Details</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-3">Card Holder</p>
                                            <input type="text" class="form-control py-3 fs-4" name="cardname" id="cd1" placeholder="Enter Card Holder Name" pattern="[A-za-z ]{3,16}" title="Card Holder Name must contain 3 to 16 character no special character allowed" required>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-3">Credit Card Number</p>
                                            <input type="text" class="form-control py-3 fs-4" name="cardnum" id="cd2" placeholder="Enter Credit Card Number" pattern="[0-9]{16}" title="Card Number must contain 16 no white spaces allowed numbers" required>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-3">Card Exp Date</p>
                                            <input type="text" class="form-control py-3 fs-4" name="expdate" id="cd3" placeholder="Enter Exp Date Of Credit Card" pattern="[0-9]{4}" title="Exp number must contain 4 numbers" required>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-3">CVV</p>
                                            <input type="password" class="form-control py-3 fs-4" name="cardcvv" id="cd4" placeholder="Enter CVV Code Of Credit Card" pattern="[0-9]{3}" title="CVV number must contain 3 numbers" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <button class="form-control py-3 an_button fs-4" name="orderbtn">Place Your Order</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </section>

                    </div>
            <?php
                }
            }
        }
            ?>

        </div>


    </main>

    <!-- Start footer section -->
    <?php
    include_once "slicing/footer.php";
    ?>
    <!-- End footer section -->

    <!-- Quickview Wrapper -->
    <div class="modal" id="modal1" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__product--media product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product1.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product1.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product1.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product2.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product2.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product2.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product3.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product3.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product3.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product4.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product4.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product4.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product5.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product5.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product5.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product6.jpg"><img class="product__media--preview__items--img" src="assets/img/product/big-product6.jpg" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product6.jpg" data-gallery="product-media-preview">
                                                    <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product7.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product8.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product9.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product10.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product11.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product12.png" alt="product-nav-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">Oversize Cotton Dress</h2>
                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">$58.00</span>
                                    <span class="old__price">$68.00</span>
                                </div>
                                <div class="quickview__info--ratting d-flex align-items-center mb-10">
                                    <ul class="rating d-flex justify-content-center">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>

                                    </ul>
                                    <span class="quickview__info--review__text">(5 reviews)</span>
                                </div>
                                <p class="product__details--info__desc mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit is. Deserunt totam dolores ea numquam labore! Illum magnam totam tenetur fuga quo dolor.</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            <input id="color-red1" name="color" type="radio" checked>
                                            <label class="variant__color--value red" for="color-red1" title="Red"><img class="variant__color--value__img" src="assets/img/product/product1.png" alt="variant-color-img"></label>
                                            <input id="color-red2" name="color" type="radio">
                                            <label class="variant__color--value red" for="color-red2" title="Black"><img class="variant__color--value__img" src="assets/img/product/product2.png" alt="variant-color-img"></label>
                                            <input id="color-red3" name="color" type="radio">
                                            <label class="variant__color--value red" for="color-red3" title="Pink"><img class="variant__color--value__img" src="assets/img/product/product3.png" alt="variant-color-img"></label>
                                            <input id="color-red4" name="color" type="radio">
                                            <label class="variant__color--value red" for="color-red4" title="Orange"><img class="variant__color--value__img" src="assets/img/product/product4.png" alt="variant-color-img"></label>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <fieldset class="variant__input--fieldset weight">
                                            <legend class="product__variant--title mb-8">Weight :</legend>
                                            <input id="weight1" name="weight" type="radio" checked>
                                            <label class="variant__size--value red" for="weight1">5 kg</label>
                                            <input id="weight2" name="weight" type="radio">
                                            <label class="variant__size--value red" for="weight2">3 kg</label>
                                            <input id="weight3" name="weight" type="radio">
                                            <label class="variant__size--value red" for="weight3">2 kg</label>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-15">
                                        <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                                                    <path data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <?php
    include_once "slicing/jslinks.php";
    ?>

</body>
<script>
    function calculateadd(id, price) {
        document.getElementById("showerror").innerHTML = ""
        var quant = document.getElementById("total" + id).value
        var quantity = parseInt(quant) + 1
        if (quantity >= 6) {
            document.getElementById("total" + id).value = "4";
            document.getElementById("showerror").innerHTML = "Cann't Be More Than 5 Item"
        }
        if (quantity <= 5) {
            var total = quantity * price;
            document.getElementById("totalamount" + id).innerHTML = total
            var subtotal = document.getElementById("subtotal").innerHTML
            var sub = parseInt(price) + parseInt(subtotal)
            document.getElementById("subtotal").innerHTML = sub
            document.getElementById("grandtotal").innerHTML = sub
            $.ajax({
                url: "updatequantity.php",
                type: "POST",
                data: {
                    "id": id,
                    "add": 1
                },
                success: function(load) {
                    if (load == 1) {
                        console.log("ok")
                    } else if (load == 2) {
                        document.getElementById("total" + id).value = quant;
                        document.getElementById("showerror").innerHTML = "No More Items In Stock";
                    }
                }
            })
        }
    }

    function calculatesub(id, price) {
        document.getElementById("showerror").innerHTML = ""
        var quant = document.getElementById("total" + id).value
        var quantity = quant - 1
        if (quantity == 0) {
            document.getElementById("total" + id).value = "2";
            document.getElementById("showerror").innerHTML = "Cann't Be Less Than 1 Item"
        }
        if (quantity > 0) {
            var total = price * quantity;
            document.getElementById("totalamount" + id).innerHTML = total
            var subtotal = document.getElementById("subtotal").innerHTML
            var sub = parseInt(subtotal) - parseInt(price);
            document.getElementById("subtotal").innerHTML = sub
            document.getElementById("grandtotal").innerHTML = sub
            $.ajax({
                url: "updatequantity.php",
                type: "POST",
                data: {
                    "id": id,
                    "add": 2
                },
                success: function(load) {
                    if (load == 1) {
                        console.log("ok min")
                    }
                }
            })
        }
    }

    function deletecard(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete it from your Cart",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted',
                    'Your file has been Deleted.',
                    'success'
                )
                $.ajax({
                    url: "deletecartpost.php",
                    type: "POST",
                    data: {
                        "id": id
                    },
                    success: function(load) {
                        if (load == 1) {
                            location.reload();
                        }
                    }


                })
            }
        })
    }
    var i = 1
    var x = 1
    $(document).ready(function() {
        $("#payment_card").click(function() {
            $("#payment_delivery").prop('checked', false);
            if (i == 1) {
                $("#carddetail").removeClass("d-none");
                $("#payment_delivery").prop('required', false);
                $("#cd1").prop('required', true);
                $("#cd2").prop('required', true);
                $("#cd3").prop('required', true);
                $("#cd4").prop('required', true);
                i = 2;
            } else {
                $("#carddetail").addClass("d-none");
                $("#payment_delivery").prop('required', true);
                $("#cd1").prop('required', false);
                $("#cd2").prop('required', false);
                $("#cd3").prop('required', false);
                $("#cd4").prop('required', false);
                i = 1
            }
        });
        $("#payment_delivery").click(function() {
            $("#payment_card").prop('checked', false);
            $("#carddetail").addClass("d-none");
            i = 1
            if (x == 1) {

                $("#payment_card").prop('required', false);
                $("#cd1").prop('required', false);
                $("#cd2").prop('required', false);
                $("#cd3").prop('required', false);
                $("#cd4").prop('required', false);
                x = 2
            } else {

                $("#payment_card").prop('required', true);
                $("#cd1").prop('required', true);
                $("#cd2").prop('required', true);
                $("#cd3").prop('required', true);
                $("#cd4").prop('required', true);
                x = 1
            }
        });
        $("#checkoutbtn").click(function() {
            $("#order_info").removeClass("d-none");
        });
    });

    function psel(){
        Swal.fire({
            title: 'No Product In Cart?',
            text: "You need to select product first",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Products'
        }).then((result) => {
            if (result.isConfirmed) {
               location.href="product.php"
            }
        })  
    }
</script>

</html>