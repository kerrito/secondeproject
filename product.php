<?php
include_once "slicing/headerlinks.php";
$page="";
?>

<body>
    <?php
    include_once "slicing/nav.php";
    include_once "slicing/sidenav.php";
    ?>
    
    <section class="product__section section--padding color-scheme-2 pt-0">
                <div class="container-fluid">
    <?php
    if(!isset($heading)){
        $heading="";
    }
    if (!isset($_GET['id2'])) {
        $_GET['id2'] = "";
    }
    $id = $_GET['id2'];
    if ($id != null) {
        $GLOBALS['heading'] ="filled";
        $sql = "SELECT * FROM `product` WHERE `categories` LIKE '%$id%'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $result = mysqli_fetch_assoc($res);

    ?>
                    <?php 
                    
    $d = $_GET['id'];
    if ($d != null) {
        $sl = "SELECT * FROM `product` WHERE `categories` LIKE '%$d%'";
        $rs = mysqli_query($con, $sl);
        if (mysqli_num_rows($res) > 0) {
            $relt = mysqli_fetch_assoc($rs);
                    ?>
                    <div class="section__heading text-center mb-35">
                        <h2 class="section__heading--maintitle style2">Product Of <?= $result['categories'] ?> And <?=$relt['categories']?></h2>
                    </div>
                    <?php 
        }
    }
                    ?>
                    <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                            <?php
                            foreach ($res as $value) {
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

                                                <a class="product__add-to__cart--btn__style2 " href="cartadd.php?id=<?= $value['id'] ?>">
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
                                            <?php

                                            } else {
                                                $_SESSION['msg'] = "You Need To Login First";
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " href="login.php">
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
                                            <?php

                                            }
                                            ?>
                                            <ul class="product__items--action__style2">
                                                <li class="product__items--action__style2--list">
                                                    <a class="product__items--action__style2--btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                            <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__style2--list">
                                                    <a class="product__items--action__style2--btn" data-open="modal1" href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                            <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html"><p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?> </p></a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price']+200 ?> Rs</span>
                                            </div>
                                            <ul class="rating product__rating d-flex justify-content-center">
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
                                </div>

                            <?php
                            }
                      
        }
    }

    if (!isset($_GET['id'])) {
        $_GET['id'] = "";
    }
    $id = $_GET['id'];
    if ($id != null) {
        $sql = "SELECT * FROM `product` WHERE `categories` LIKE '%$id%'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $result = mysqli_fetch_assoc($res);
        ?>
                        <?php
                        if ($GLOBALS['heading'] == null) {
                        ?>
                    <div class="section__heading text-center mb-35">
                            <h2 class="section__heading--maintitle style2">Product Of <?= $result['categories'] ?></h2>
                        
                    </div>
                    
                    <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                    <?php
                        }
                        ?>
                            <?php
                            foreach ($res as $value) {
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
                                                $_SESSION['msg'] = "You Need To Login First";
                                            ?>

                                                <a class="product__add-to__cart--btn__style2 " href="login.php">
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
                                                    <a class="product__items--action__style2--btn" href="login.php">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="23.51" height="21.443" viewBox="0 0 512 512">
                                                            <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            <?php

                                            }
                                            ?>
                                                <li class="product__items--action__style2--list">
                                                    <a class="product__items--action__style2--btn" data-open="modal1" href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                            <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <span class="product__items--content__subtitle"><?= $value['name'] ?></span>
                                            <h3 class="product__items--content__title h4"><a href="product-details.html"><p style="white-space: nowrap;width:200px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p></a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price"><?= $value['price'] ?> Rs</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price"><?= $value['price']+200 ?> Rs</span>
                                            </div>
                                            <ul class="rating product__rating d-flex justify-content-center">
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
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        } else {
            echo "No Product Found";
        }

        ?>

    <?php

    } else {

    ?>
        <!-- Start banner section -->
        <section class="banner__section banner__style2 section--padding color-scheme-2">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle style2">Products By Categories</h2>
            </div>
            <div class="container-fluid">
                <div class="row mb--n28">
                    <div class="col-lg-4 col-md-order mb-28">
                        <div class="banner__items position__relative">
                            <a class="banner__items--thumbnail " href="product.php?id=gift"><img class="banner__items--thumbnail__img" src="assets/img/banner/banner7.png" alt="banner-img">
                                <div class="banner__items--content style2">
                                    <h3 class="banner__items--content__title style2">NEW <br>
                                        Gifts Articals</h3>
                                    <span class="banner__items--content__link style2">SHOP NOW</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="banner__style2--top__sidebar d-flex">
                            <div class="banner__items position__relative mr-30 mb-28">
                                <a class="banner__items--thumbnail" href="product.php?id=art"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner8.png" alt="banner-img">
                                    <div class="banner__items--content style2">
                                        <h3 class="banner__items--content__title style2">NEW <br>
                                            Arts</h3>
                                        <span class="banner__items--content__link style2">SHOP NOW</span>
                                    </div>
                                </a>
                            </div>
                            <div class="banner__items position__relative mb-28">
                                <a class="banner__items--thumbnail" href="product.php?id=wallet&id2=Hand Bags"><img class="banner__items--thumbnail__img" src="assets/img/banner/banner9.png" alt="banner-img">
                                    <div class="banner__items--content style2">
                                        <h3 class="banner__items--content__title style2">New <br>
                                            Wallets & Hand Bags</h3>
                                        <span class="banner__items--content__link style2">SHOP NOW</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row row-cols-sm-2 row-cols-1">
                            <div class="col mb-28">
                                <div class="banner__items position__relative">
                                    <a class="banner__items--thumbnail" href="product.php?id=files&id2=Greeting Cards"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner10.png" alt="banner-img">
                                        <div class="banner__items--content style2">
                                            <h3 class="banner__items--content__title style2">New <br>
                                                Files & Greeting Cards</h3>
                                            <span class="banner__items--content__link style2">SHOP NOW</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col mb-28">
                                <div class="banner__items position__relative">
                                    <a class="banner__items--thumbnail" href="product.php?id=dolls"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner11.png" alt="banner-img">
                                        <div class="banner__items--content style2 right">
                                            <h3 class="banner__items--content__title style2">New<br>
                                                Dolls</h3>
                                            <span class="banner__items--content__link style2">SHOP NOW</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->
    <?php

    }
    ?>





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
<script>
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
                        }


                    })
                }
            })
        }


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
                        }


                    })
                }
            })
        }
    </script>
</html>