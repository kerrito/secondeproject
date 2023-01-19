<?php
include_once "slicing/headerlinks.php";
$page="productdeatil";
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
                            <h1 class="breadcrumb__content--title text-white mb-25">Product Details</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Product Details</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROm `product` WHERE `id`=$id";
                    $res = mysqli_query($con, $sql);
                    if ($res) {
                        $result = mysqli_fetch_assoc($res);
                    ?>

                        <div class="col">
                            <div class="product__details--media">
                                <div class="product__media--preview  swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="uploads/img/<?= $result['img'] ?>"><img class="product__media--preview__items--img" src="uploads/img/<?= $result['img'] ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="uploads/img/<?= $result['img'] ?>" data-gallery="product-media-preview">
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
                            </div>
                        </div>
                        <div class="col">
                            <div class="product__details--info">
                                <form action="#">
                                    <h2 class="product__details--info__title mb-15"><?= $result['name'] ?></h2>
                                    <div class="product__details--info__price mb-10">
                                        <span class="current__price"><?= $result['price'] ?> Rs</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price"><?= $result['price'] ?> Rs</span>
                                    </div>
                                    <p class="product__details--info__desc mb-15"><?= $result['desc'] ?></p>
                                    <div class="product__variant">

                                        <div class="product__details--info__meta">
                                            <p class="product__details--info__meta--list"><strong>Brand :</strong> <span><?= $result['brand'] ?></span> </p>
                                            <p class="product__details--info__meta--list"><strong>categories :</strong> <span><?= $result['categories'] ?></span> </p>
                                        </div>
                                        <div class="product__variant--list mb-15" >
                                            <a class="variant__wishlist--icon mb-15" onclick="addwishlist(<?= $result['id'] ?>)" title="Add to wishlist">
                                                <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                </svg>
                                                Add to Wishlist
                                            </a>
                                        </div>
                                        <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                            <button class="quickview__cart--btn primary__btn" type="submit">Add To Cart</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- End product details section -->

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
<script>
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
                            console.log("ok function success");
                            console.log(load);
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