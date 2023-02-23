<?php
include_once "slicing/headerlinks.php";
if ($_SESSION['login'] != "true") {
    header("location:index.php");
    exit;
}
$page = "Order Histroy";
?>

<body>
    <?php
    include_once "slicing/nav.php";
    include_once "slicing/sidenav.php";
    ?>
    <main class="main__content_wrapper">

        <!-- Starting breadcrum section  -->
        <?php
        include_once "slicing/breadcrum.php";
        ?>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                    <form action="#">
                        <h2 class="cart__title mb-40">Order Tracking</h2>
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Payment</th>
                                        <th class="cart__table--header__list text-center">Payment Method</th>
                                        <th class="cart__table--header__list text-right">Cancel Order</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                    <?php
                                    $email = $_SESSION['email'];
                                    $sql = "SELECT * FROM `order` WHERE `user_email`='$email' ORDER BY `id` DESC";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        foreach ($res as $resu) {
                                            $product_id = $resu['product_id'];
                                            $ql = "SELECT * FROM `product` WHERE `id`=$product_id";
                                            $result = mysqli_query($con, $ql);
                                            if (mysqli_num_rows($result) > 0) {
                                                $finalresult = mysqli_fetch_assoc($result);
                                                if ($resu['state'] != "deivered") {
                                    ?>
                                                    <tr class="cart__table--body__items">
                                                        <td class="cart__table--body__list">
                                                            <div class="cart__product d-flex align-items-center">
                                                                <div class="cart__thumbnail">
                                                                    <a href="productdetail.php?id=<?= $finalresult['id'] ?>"><img class="border-radius-5" style="height:150px !improtant;" src="uploads/img/<?= $finalresult['img'] ?>" alt="cart-product"></a>
                                                                </div>
                                                                <div class="cart__content">
                                                                    <h4 class="cart__content--title"><a href="productdetail.php?id=<?= $finalresult['id'] ?>"><?= $finalresult['name'] ?></a></h4>
                                                                    <span class="cart__content--variant">Process : <span class="<?= $resu['state'] == "Pending" ? "text-danger" : "text-warning" ?><?= $resu['state'] == "Recieved" ? "text-success" : "" ?>">
                                                                                <?php if ($resu['state'] == "Pending") {
                                                                                    echo "Pending";
                                                                                } elseif ($resu['state'] == "dispatch") {
                                                                                    echo "Dispatch";
                                                                                } elseif ($resu['state'] == "Delivered") {
                                                                                    echo "Delivered";
                                                                                } elseif ($resu['state'] == "Recieved") {
                                                                                    echo "Recieved";
                                                                                } elseif ($resu['state'] == "Return") {
                                                                                    echo "Requested for Return";
                                                                                } ?>
                                                                            </span>
                                                                        </span>
                                                                    <span class="cart__content--variant">Quantity : <?= $resu['quantity'] ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price"><?= $resu['price'] ?>.00 Rs</span>
                                                        </td>
                                                        <td class="cart__table--body__list text-center">
                                                            <span class="in__stock text__secondary"><?= $resu['payment'] == 0 ? "Payment On Delivery" : "Payment By Card"; ?></span>
                                                        </td>
                                                        <td class="cart__table--body__list text-right">
                                                            <?php
                                                            if ($resu['state'] == "Pending") {
                                                            ?>
                                                                <a class="wishlist__cart--btn primary__btn" onclick="deleteorder(<?= $resu['id'] ?>)">Cancel</a>
                                                            <?php
                                                            }
                                                            if ($resu['state'] == "dispatch") {
                                                            ?>
                                                                <a class="wishlist__cart--btn primary__btn" onclick="addtocard()">Cann't Cancel</a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                if ($resu['state'] == "deivered") {
                                                ?>
                                                    <tr class="cart__table--body__items">
                                                        <td class="cart__table--body__list">
                                                            <div class="cart__product d-flex align-items-center">
                                                                <a onclick="deletewishlist(<?= $resu['id'] ?>)"><button class="cart__remove--btn" aria-label="search button" type="button">
                                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                                            <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                                        </svg>
                                                                    </button>
                                                                </a>
                                                                <div class="cart__thumbnail">
                                                                    <a href="productdetail.php?id=<?= $finalresult['id'] ?>"><img class="border-radius-5" style="height:150px !improtant;" src="uploads/img/<?= $finalresult['img'] ?>" alt="cart-product"></a>
                                                                </div>
                                                                <div class="cart__content">
                                                                    <h4 class="cart__content--title"><a href="productdetail.php?id=<?= $finalresult['id'] ?>"><?= $finalresult['name'] ?></a></h4>
                                                                    <span class="cart__content--variant <?= $resu['state'] == "Pending" ? "text-danger" : "text-warning" ?>">
                                                                        <?php if ($resu['state'] == "Pending") {
                                                                            echo "Pending";
                                                                        } elseif ($resu['state'] == "dispatch") {
                                                                            echo "Dispatch";
                                                                        } ?>
                                                                    </span>
                                                                    <span class="cart__content--variant">Quantity : <?= $resu['quantity'] ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart__table--body__list">
                                                            <span class="cart__price"><?= $resu['price'] ?>.00 Rs</span>
                                                        </td>
                                                        <td class="cart__table--body__list text-center">
                                                            <span class="in__stock text__secondary"><?= $resu['payment'] == 0 ? "Payment On Delivery" : "Payment By Card"; ?></span>
                                                        </td>
                                                        <td class="cart__table--body__list text-right">
                                                            <!-- <a class="wishlist__cart--btn primary__btn" onclick="addtocard()">Add To Cart</a> -->
                                                        </td>
                                                    </tr>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="product.php">Continue shopping</a>
                                <a class="continue__shopping--clear" href="product.php">View All Products</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- cart section end -->


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

</body>
<script>
    function deleteorder(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Delete This order",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Yes, Add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Added',
                    'Order Has Been deleted',
                    'success'
                )
                $.ajax({
                    url: "admin/deleteorder.php",
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