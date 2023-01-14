<?php
include_once "slicing/headerlinks.php";

?>

<body>
    <?php
    include_once "slicing/nav.php";
    include_once "slicing/sidenav.php";
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
                            <a class="banner__items--thumbnail " href="product.php?id='gift'"><img class="banner__items--thumbnail__img" src="assets/img/banner/banner7.png" alt="banner-img">
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
                                <a class="banner__items--thumbnail" href="product.php?id='art'"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner8.png" alt="banner-img">
                                    <div class="banner__items--content style2">
                                        <h3 class="banner__items--content__title style2">NEW <br>
                                            Arts</h3>
                                        <span class="banner__items--content__link style2">SHOP NOW</span>
                                    </div>
                                </a>
                            </div>
                            <div class="banner__items position__relative mb-28">
                                <a class="banner__items--thumbnail" href="product.php?id='wallet'"><img class="banner__items--thumbnail__img" src="assets/img/banner/banner9.png" alt="banner-img">
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
                                    <a class="banner__items--thumbnail" href="product.php?id='files'"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner10.png" alt="banner-img">
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
                                    <a class="banner__items--thumbnail" href="product.php?id='dolls'"><img class="banner__items--thumbnail__img banner__img--max__height" src="assets/img/banner/banner11.png" alt="banner-img">
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