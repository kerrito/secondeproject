<?php
include_once "slicing/headerlinks.php";
$page = "Search Page";
$select = "";
if (isset($_GET['btn'])) {
    $GLOBALS['select'] = "search";
}
if(isset($_GET['btn1'])){
    $GLOBALS['select'] = "advancesearch";
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
        <!-- Starting breadcrum section  -->
        <?php
        include_once "slicing/breadcrum.php";
        ?>
        <!-- End breadcrumb section -->

    <!-- Starting search option section -->
    <div class="row justify-content-center mb-4 p-0 m-0" id="toggleclose">
        <div class="col-lg-3 col-md-6">
            <form action="" class="d-flex justify-content-center mt-5">
                <input type="text" class="form-control py-3 fs-4" name="name1">
                <button name="btn" class="an_button">Search</button>
            </form>
            <button class="form-control mt-4 py-2 fs-4 an_button" id="togglebtn" type="button">Advance Search</button>
        </div>
    </div>
    <!-- ending search option section-->

    <!-- Starting advance search option section -->
    <div class="row justify-content-center m-0 p-0 d-none mt-5" id="toggleopen">
        <div class="col-md-8">
            <section class="product__section section--padding color-scheme-2 pt-0">
                <div class="section__heading text-center mb-35">
                    <h2 class="section__heading--maintitle style2">Advance Search</h2>
                </div>
                <form action="">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3">
                            <p class="fs-3">Name</p>
                            <input type="text" class="form-control py-2 fs-4" name="name2">
                        </div>
                        <div class="col-lg-3">
                            <p class="fs-3">Brand</p>
                            <select name="brand" class="form-control py-2 fs-4">
                                <option value="">All</option>
                                <?php
                                $q = "SELECT DISTINCT(`brand`) FROM `product`";
                                $res = mysqli_query($con, $q);
                                if (mysqli_num_rows($res)>0) {
                                    foreach ($res as $value) {
                                ?>
                                        <option value="<?=$value['brand']?>"><?=$value['brand']?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-lg-3">
                            <p class="fs-3">Categorie</p>
                            <select name="categories" class="form-control py-2 fs-4">
                                <option value="">All</option>
                                <option value="Gift">Gift Articals</option>
                                <option value="Art">Art Articals</option>
                                <option value="Hand Bags">Hand Bags</option>
                                <option value="Wallet">Wallet</option>
                                <option value="Doll">Dolls</option>
                                <option value="Greeting Card">Greeting Cards</option>
                                <option value="File">Files</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-2 mx-0 px-0">
                        <div class="col-3">
                        <p class="fs-3">Quantity</p>
                            <input type="number" value="1" class="form-control py-2 fs-4" name="quantity">
                        </div>
                        <div class="col-3">
                        <p class="fs-3">Price</p>
                            <input type="number" class="form-control py-2 fs-4" name="price">
                        </div>

                        <div class="col-3">
                        <p class="fs-3">Search</p>
                            <button class="form-control py-2 fs-4 an_button" name="btn1">Search</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
    <!-- ending advance search option section -->

    <!-- Start product section -->
    <section class="product__section section--padding color-scheme-2 pt-0">
        <div class="container-fluid">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle style2">Search Result</h2>
            </div>
            <div class="product__section--inner">
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                    <?php
                    if ($GLOBALS['select'] == null) {
                        if (isset($_GET['name'])) {
                            $name =mysqli_real_escape_string($con,$_GET['name']);
                            $sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%'";
                        }
                    }
                    if ($GLOBALS['select'] == "search") {
                        if (isset($_GET['name1'])) {
                            $name =mysqli_real_escape_string($con,$_GET['name1']);
                            $sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%'";
                        }
                    }
                    if ($GLOBALS['select'] == "advancesearch") {
                            $name =mysqli_real_escape_string($con,$_GET['name2']);
                            $brand=mysqli_real_escape_string($con,$_GET['brand']);
                            $categories=mysqli_real_escape_string($con,$_GET['categories']);
                            $quantity= $_GET['quantity'];
                            if($_GET['price']==null){

                                $price=0;
                            } else{

                                $price=$_GET['price'];
                            }
                            $sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `brand` LIKE '%$brand%' AND `categories` LIKE '%$categories%' AND `stock`>=$quantity AND `price`>=$price";
                        }
                    $res = mysqli_query($con, $sql);
                    if ($res) {
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
                                        <h3 class="product__items--content__title h4"><a href="product-details.html">
                                                <p style="white-space: nowrap;width:100px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['desc'] ?></p>
                                            </a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price"><?= $value['price'] ?> Rs</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price"><?= $value['price'] + 200 ?></span>
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

                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Starting footer section -->
    <?php
    include_once "slicing/footer.php";
    ?>
    <!-- ending footer section -->

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
    $(document).ready(function() {
        $("#togglebtn").click(function() {
            $("#toggleopen").removeClass("d-none");
            $("#toggleclose").addClass("d-none");
        });
    });
</script>


</html>