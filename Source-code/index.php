<?php
include_once "slicing/headerlinks.php";
$page="";
?>

<body>
    <?php
    // Starting navbar
    include_once "slicing/nav.php";
    // ending navbar

    // Starting side navbar
    include_once "slicing/sidenav.php";
    // ending side navbar
    ?>


    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section color-scheme-2">
            <div class="hero__slider--inner hero__slider--activation swiper">
                <div class="hero__slider--wrapper swiper-wrapper">
                    <div class="swiper-slide ">
                        <div class="hero__slider--items home2__slider--bg">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner hero__slider--bg2__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="slider__content">
                                                <p class="slider__content--desc desc1 text-danger mb-15"> Big Offer 50% off</p>
                                                <h2 class="slider__content--maintitle text-light h1">New Collection <br> Is Here</h2>
                                                <p class="slider__content--desc desc2 d-sm-2-none text-light mb-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna</p>
                                                <a class="bg__secondary2 slider__btn primary__btn" href="product.php">Show Collection
                                                    <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                        <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="hero__slider--items home2__slider--bg two">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner hero__slider--bg2__inner">
                                    <div class="slider__content">
                                        <p class="slider__content--desc desc1 text-danger mb-15"> Big Offer 50% off</p>
                                        <h2 class="slider__content--maintitle text-light h1">New Collection <br>
                                        Is Here</h2>
                                        <p class="slider__content--desc desc2 d-sm-2-none text-light mb-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna</p>
                                        <a class="bg__secondary2 slider__btn primary__btn" href="product.php">Show Collection
                                            <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="hero__slider--items home2__slider--bg three">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner hero__slider--bg2__inner">
                                    <div class="slider__content">
                                        <p class="slider__content--desc desc1 text-danger mb-15"> Big Offer 50% off</p>
                                        <h2 class="slider__content--maintitle text-light h1">New Collection <br>
                                        Is Here</h2>
                                        <p class="slider__content--desc desc2 d-sm-2-none text-light mb-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna</p>
                                        <a class="bg__secondary2 slider__btn primary__btn" href="product.php">Show Collection
                                            <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </section>
        <!-- End slider section -->


        <!-- Start product section -->
        <section class="product__section section--padding color-scheme-2 pt-5 mt-5">
            <div class="container-fluid">
                <div class="section__heading text-center mb-35">
                    <h2 class="section__heading--maintitle style2">Our Lastest Products</h2>
                </div>
                <div class="product__section--inner">
                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                        <?php
                        $sql = "SELECT * FROM `product` WHERE `categories`='gift' ORDER BY `id` DESC LIMIT 2";
                        $res = mysqli_query($con, $sql);
                        if ($res) {
                            foreach ($res as $value) {
                        ?>

                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="productdetail.php?id=<?= $value['id'] ?>">
                                                <img class="product__items--img product__primary--img card_an an_obj_fit" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                                <img class="product__items--img product__secondary--img an_obj_fit" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <?php
                                            if ($_SESSION['login'] == "true") {
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " onclick="addtocard(<?= $value['id'] ?>)">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                <ul class="product__items--action__style2">
                                                    <li class="product__items--action__style2--list">
                                                        <a class="product__items--action__style2--btn" onclick="addwishlist(<?= $value['id'] ?>)">
                                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                <?php

                                            } else {
                                                ?>

                                                    <a class="product__add-to__cart--btn__style2 " onclick="login()">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </a>
                                                    <ul class="product__items--action__style2">
                                                        <li class="product__items--action__style2--list">
                                                            <a class="product__items--action__style2--btn" onclick="login()">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>
                                                        </li>
                                                    <?php

                                                }
                                                    ?>
                                                    </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                    <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                                </a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price'] + 200 ?></span>
                                            </div>
                                            <!-- <ul class="rating product__rating d-flex justify-content-center">
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

                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        $sl = "SELECT * FROM `product` WHERE `categories`='doll' ORDER BY `id` DESC LIMIT 2";
                        $re = mysqli_query($con, $sl);
                        if ($re) {
                            foreach ($re as $value) {
                        ?>

                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="productdetail.php?id=<?= $value['id'] ?>">
                                                <img class="product__items--img product__primary--img card_an" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                                <img class="product__items--img product__secondary--img" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <?php
                                            if ($_SESSION['login'] == "true") {
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " onclick="addtocard(<?= $value['id'] ?>)">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                <ul class="product__items--action__style2">
                                                    <li class="product__items--action__style2--list">
                                                        <a class="product__items--action__style2--btn" onclick="addwishlist(<?= $value['id'] ?>)">
                                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                <?php

                                            } else {
                                                ?>

                                                    <a class="product__add-to__cart--btn__style2 " onclick="login()">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </a>
                                                    <ul class="product__items--action__style2">
                                                        <li class="product__items--action__style2--list">
                                                            <a class="product__items--action__style2--btn" onclick="login()">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>
                                                        </li>
                                                    <?php

                                                }
                                                    ?>
                                                    </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                    <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                                </a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price'] + 200 ?></span>
                                            </div>
                                            <!-- <ul class="rating product__rating d-flex justify-content-center">
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

                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        $s = "SELECT * FROM `product` WHERE `categories`='Greeting Card' ORDER BY `id` DESC LIMIT 2";
                        $r = mysqli_query($con, $s);
                        if ($r) {
                            foreach ($r as $value) {
                        ?>

                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="productdetail.php?id=<?= $value['id'] ?>">
                                                <img class="product__items--img product__primary--img card_an" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                                <img class="product__items--img product__secondary--img" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <?php
                                            if ($_SESSION['login'] == "true") {
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " onclick="addtocard(<?= $value['id'] ?>)">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                <ul class="product__items--action__style2">
                                                    <li class="product__items--action__style2--list">
                                                        <a class="product__items--action__style2--btn" onclick="addwishlist(<?= $value['id'] ?>)">
                                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                <?php

                                            } else {
                                                ?>

                                                    <a class="product__add-to__cart--btn__style2 " onclick="login()">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </a>
                                                    <ul class="product__items--action__style2">
                                                        <li class="product__items--action__style2--list">
                                                            <a class="product__items--action__style2--btn" onclick="login()">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>
                                                        </li>
                                                    <?php

                                                }
                                                    ?>
                                                    </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                    <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                                </a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price'] + 200 ?></span>
                                            </div>
                                            <!-- <ul class="rating product__rating d-flex justify-content-center">
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

                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        $sq = "SELECT * FROM `product` WHERE `categories`='wallet' ORDER BY `id` DESC LIMIT 2";
                        $resu = mysqli_query($con, $sq);
                        if ($resu) {
                            foreach ($resu as $value) {
                        ?>

                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="productdetail.php?id=<?= $value['id'] ?>">
                                                <img class="product__items--img product__primary--img card_an" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                                <img class="product__items--img product__secondary--img" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <?php
                                            if ($_SESSION['login'] == "true") {
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " onclick="addtocard(<?= $value['id'] ?>)">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                <ul class="product__items--action__style2">
                                                    <li class="product__items--action__style2--list">
                                                        <a class="product__items--action__style2--btn" onclick="addwishlist(<?= $value['id'] ?>)">
                                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                <?php

                                            } else {
                                                ?>

                                                    <a class="product__add-to__cart--btn__style2 " onclick="login()">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </a>
                                                    <ul class="product__items--action__style2">
                                                        <li class="product__items--action__style2--list">
                                                            <a class="product__items--action__style2--btn" onclick="login()">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>
                                                        </li>
                                                    <?php

                                                }
                                                    ?>
                                                    </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                    <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                                </a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price'] + 200 ?></span>
                                            </div>
                                            <!-- <ul class="rating product__rating d-flex justify-content-center">
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

                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?><?php
                        $sqll = "SELECT * FROM `product` WHERE `categories`='File' ORDER BY `id` DESC LIMIT 2";
                        $resul = mysqli_query($con, $sqll);
                        if ($resul) {
                            foreach ($resul as $value) {
                        ?>

                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="productdetail.php?id=<?= $value['id'] ?>">
                                                <img class="product__items--img product__primary--img card_an" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                                <img class="product__items--img product__secondary--img" src="uploads/img/<?= $value['img'] ?>" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <?php
                                            if ($_SESSION['login'] == "true") {
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " onclick="addtocard(<?= $value['id'] ?>)">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                <ul class="product__items--action__style2">
                                                    <li class="product__items--action__style2--list">
                                                        <a class="product__items--action__style2--btn" onclick="addwishlist(<?= $value['id'] ?>)">
                                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                <?php

                                            } else {
                                                ?>

                                                    <a class="product__add-to__cart--btn__style2 " onclick="login()">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </a>
                                                    <ul class="product__items--action__style2">
                                                        <li class="product__items--action__style2--list">
                                                            <a class="product__items--action__style2--btn" onclick="login()">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>
                                                        </li>
                                                    <?php

                                                }
                                                    ?>
                                                    </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                    <p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                                </a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price'] + 200 ?></span>
                                            </div>
                                            <!-- <ul class="rating product__rating d-flex justify-content-center">
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

                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start grid product section -->
        <section class="product__section section--padding color-scheme-2 pt-0">
            <div class="container-fluid">
                <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mb--n30 align-items-center">
                    
                    <div class="col mb-30 pt-30">
                        <div class="banner__items position__relative">
                            <a class="banner__items--thumbnail width-100 " href="product.php?id=Hand Bags"><img class="banner__items--thumbnail__img width-100" src="uploads/img/1675368648PNG" alt="banner-img">
                                <div class="banner__items--content__style3">
                                    <span class="banner__items--content__style3--subtitle text-white">Women's HandBags Collection</span>
                                    <h2 class="banner__items--content__style3--title text-white h3"> Min.40-70% Off</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col mb-30">
                        <div class="product__grid--wrapper">
                            <div class="product__grid--heading mb-30">
                                <h2 class="product__grid--heading__maintitle position__relative">Featured</h2>
                            </div>
                            <div class="product__grid--inner">
                                <?php 
                                $handsql="SELECT * FROM `product` WHERE `categories`='Hand Bags' ORDER BY `id` ASC LIMIT 3";
                                $hansres=mysqli_query($con,$handsql);
                                if(mysqli_num_rows($hansres)>0){
                                    foreach($hansres as $value){
                                        ?>
                                        
                                <div class="product__items product__items--grid d-flex align-items-center">
                                    <div class="product__items--grid__thumbnail position__relative">
                                        <a class="product__items--link" href="productdetail.php?id=<?=$value['id']?>">
                                            <img class="product__items--img product__primary--img an_obj_fit" src="uploads/img/<?=$value['img']?>" alt="product-img">
                                            <img class="product__items--img product__secondary--img an_obj_fit" src="uploads/img/<?=$value['img']?>" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product__items--grid__content">
                                        <h3 class="product__items--content__title h4"><a href="productdetail.php?id=<?=$value['id']?>"><?=$value['name']?></a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price"><?=$value['price']?> Rs</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price"><?=$value['price']+200?> Rs</span>
                                        </div>
                                        <!-- <ul class="rating product__rating d-flex">
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

                                        </ul> -->
                                    </div>
                                </div>
                                        <?php
                                    }
                                }
                                ?>
                                <!-- <div class="product__items product__items--grid d-flex align-items-center">
                                    <div class="product__items--grid__thumbnail position__relative">
                                        <a class="product__items--link" href="product-details.html">
                                            <img class="product__items--img product__primary--img" src="assets/img/product/small-product3.png" alt="product-img">
                                            <img class="product__items--img product__secondary--img" src="assets/img/product/small-product4.png" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product__items--grid__content">
                                        <h3 class="product__items--content__title h4"><a href="product-details.html">Gorgeous Granite Clock</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">$140</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price">$115</span>
                                        </div>
                                        <ul class="rating product__rating d-flex">
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
                                    </div>
                                </div>
                                <div class="product__items product__items--grid d-flex align-items-center">
                                    <div class="product__items--grid__thumbnail position__relative">
                                        <a class="product__items--link" href="product-details.html">
                                            <img class="product__items--img product__primary--img" src="assets/img/product/small-product5.png" alt="product-img">
                                            <img class="product__items--img product__secondary--img" src="assets/img/product/small-product6.png" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product__items--grid__content">
                                        <h3 class="product__items--content__title h4"><a href="product-details.html">Durable Steel Knife</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">$160</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price">$118</span>
                                        </div>
                                        <ul class="rating product__rating d-flex">
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
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col mb-30">
                        <div class="banner__items position__relative">
                            <a class="banner__items--thumbnail md-width-100" href="product.php?id=Wallet"><img class="banner__items--thumbnail__img md-width-100 an_obj_fit" src="uploads/img/1675369137PNG" alt="banner-img">
                                <div class="banner__items--content__style3">
                                    <span class="banner__items--content__style3--subtitle text-white">Men's Wallet Collection</span>
                                    <h2 class="banner__items--content__style3--title text-white h3"> Min.40-70% Off</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-30">
                        <div class="product__grid--wrapper">
                            <div class="product__grid--heading mb-30">
                                <h2 class="product__grid--heading__maintitle position__relative">Featured</h2>
                            </div>
                            <div class="product__grid--inner">
                                <?php 
                                $walletsql="SELECT * FROM `product` WHERE `categories`='wallet' ORDER BY `id` ASC LIMIT 3";
                                $walletres=mysqli_query($con,$walletsql);
                                if(mysqli_num_rows($walletres)>0){
                                    foreach($walletres as $value){
                                        ?>
                                        <div class="product__items product__items--grid d-flex align-items-center">
                                            <div class="product__items--grid__thumbnail position__relative">
                                                <a class="product__items--link" href="productdetail.php?id=<?=$value['id']?>">
                                                    <img class="product__items--img product__primary--img an_obj_fit" src="uploads/img/<?=$value['img']?>" alt="product-img">
                                                    <img class="product__items--img product__secondary--img an_obj_fit" src="uploads/img/<?=$value['img']?>" alt="product-img">
                                                </a>
                                            </div>
                                            <div class="product__items--grid__content">
                                                <h3 class="product__items--content__title h4"><a href="productdetail.php?id=<?=$value['id']?>"><?=$value['name']?></a></h3>
                                                <div class="product__items--price">
                                                    <span class="current__price"><?=$value['price']?> Rs</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price"><?=$value['price']+200 ?> Rs</span>
                                                </div>
                                                <!-- <ul class="rating product__rating d-flex">
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
        
                                                </ul> -->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End grid product section -->


        <!-- Start shop cards section -->
        <section class="shop__card--section section--padding color-scheme-2">
            <div class="container-fluid">
                <div class="shop__card--section__inner">
                    <div class="row row-cols-md-2 row-cols-1 align-items-center">
                        <div class="col col-sm-order">
                            <div class="shop__card--content">
                                <h3 class="shop__card--content__subtitle">GIFT CARDS</h3>
                                <h2 class="shop__card--content__maintitle mb-12">Support your <br>
                                    neighborhood</h2>
                                <p class="shop__card--content__desc">We believe that local businesses are an integral <br> part of a neighborhood's character. Help keep <br> local by buying a gift card!</p>
                                <a class="shop__card--content__btn bg__secondary2 primary__btn" href="product.php?id=Greeting card">Shop gift cards</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop__card--banner position__relative d-flex">
                                <div class="shop__card--banner__thumbnail one">
                                    <a class="display-block" href="product.php?id=Greeting card"><img class="shop__card--banner__thumbnail--img display-block" src="assets/img/banner/greetingbanner3.jpg" alt="shop-card-banner"></a>
                                </div>
                                <div class="shop__card--banner__thumbnail two">
                                    <a class="display-block" href="product.php?id=Greeting card"><img class="shop__card--banner__thumbnail--img display-block" src="assets/img/banner/greetingbanner2.jpg" alt="shop-card-banner"></a>
                                </div>
                                <div class="shop__card--play banner__bideo--play">
                                    <a class="glightbox">
                                        <span class="visually-hidden">Video Play</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shop cards section -->


    </main>
    <?php
    include_once "slicing/footer.php";
    ?>

    <!-- Scroll top bar -->
    <button class="color-scheme-2" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <?php
    include_once "slicing/jslinks.php";
    ?>
    <script>
        // add to cart function
        function addtocard(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want it to add to your Cart",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: 'Yes, Add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Added',
                        'Your file has been Added.',
                        'success'
                    )
                    $.ajax({
                        url: "cartadd.php",
                        type: "POST",
                        data: {
                            "id": id
                        },
                        success: function(load) {
                            if (load == 1) {
                                location.reload();
                            }
                            if(load==2){
                                Swal.fire({
                title: 'Sorry',
                text: "This product is out of stock",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: ' OK '
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            })  
                            }
                        if(load==9){
                            Swal.fire({
                                title: 'Aready Exsits',
                                text: "This product is already in your cart",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#B79E8C',
                                cancelButtonColor: '#061738',
                                confirmButtonText: ' OK '
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })              
                        }    
                        }


                    })
                }
            })
        }

//  add wishlist function
        function addwishlist(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want it to add to your wishlist",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: 'Yes, Add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Added',
                        'Your file has been Added.',
                        'success'
                    )
                    $.ajax({
                        url: "addwishlist.php",
                        type: "POST",
                        data: {
                            "id": id
                        },
                        success: function(load) {
                            if (load == 1) {
                                location.reload();
                            }
                            if(load==2){
                                Swal.fire({
                title: 'Sorry',
                text: "Due to some disturbance failed to add product to your wishlist",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: ' OK '
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            })  
                            }
                        if(load==9){
                            Swal.fire({
                                title: 'Aready Exsits',
                                text: "This product is already in your Wishlist",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#B79E8C',
                                cancelButtonColor: '#061738',
                                confirmButtonText: ' OK '
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })              
                        }    
                        }


                    })
                }
            })
        }

       // slider swiper activation
var swiper = new Swiper(".hero__slider--activation", {
  slidesPerView: 1,
  loop: true,
  clickable: true,
  speed: 800,
  spaceBetween: 30,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
 // testimonial swiper activation
var swiper = new Swiper(".testimonial__activation--column1", {
  slidesPerView: 1,
  loop: true,
  clickable: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
    </script>

</body>

</html>