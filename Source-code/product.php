<?php
include_once "slicing/headerlinks.php";
$page = "";
?>

<body>
    <?php
    // Starting Navbar Section
    include_once "slicing/nav.php";
    // Ending Navbar section

    // Starting Side navbar section
    include_once "slicing/sidenav.php";
    // Ending side navbar section


    // Getting categories
    if (!isset($_GET['id'])) {
        $_GET['id'] = "";
    }
    $id = $_GET['id'];
    // Checking categories
    if ($id != null) {
    // Php for alll products 
        $sql = "SELECT * FROM `product` WHERE `categories` LIKE '%$id%'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $result = mysqli_fetch_assoc($res);
    ?>
            <!-- Product By Categories Section Start -->
            <div class="container-fluid">
                <div class="section__heading text-center mb-35">
                    <h2 class="section__heading--maintitle style2">Products Of <?= $result['categories'] ?></h2>

                </div>

                <div class="product__section--inner">
                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                        <?php
                        foreach ($res as $value) {
                        ?>
                            <div class="col mb-5 pb-5">
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
                                            <span class="old__price"><?= $value['price'] + 200 ?> Rs</span>
                                        </div>
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
            <!-- Product By categories section end -->
        <?php
        } else {
            echo "<div class='my-5 py-5 container'><div class='my-5 py-5'><div class='my-5 py-5'><h1 class='text-center my-5 py-5'>Currently We Don't Have Products Related To This Category</h1></div></div></div>";
        }

        ?>

        <?php

    } else {

        $sql = "SELECT * FROM `product`";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $result = mysqli_fetch_assoc($res);
        ?>
           <!-- All Product Section Start -->
            <div class="container-fluid">
                <div class="section__heading text-center mb-35">
                    <h2 class="section__heading--maintitle style2">All Products</h2>

                </div>

                <div class="product__section--inner">
                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                        <?php
                        foreach ($res as $value) {
                        ?>
                            <div class="col mb-5 pb-5">
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
                                            <span class="old__price"><?= $value['price'] + 200 ?> Rs</span>
                                        </div>
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
            <!-- All product section end -->
    <?php

        }
    }
    ?>

    </div>



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
                        if (load == 2) {
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
</script>

</html>