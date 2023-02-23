<?php
include_once "slicing/headerlinks.php";
if ($_SESSION['login'] != "true") {
    header("location:index.php");
    exit;
}
$page = "Order Completed";
?>
<style>
    .anmt100 {
        margin-top: 100px;
    }

    .anmb200 {
        margin-bottom: 200px;
    }
</style>

<body>
    <?php
    include_once "slicing/nav.php";
    include_once "slicing/sidenav.php";
    ?>
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <?php
        include_once "slicing/breadcrum.php";
        ?>
        <!-- End breadcrumb section -->

        <!-- Starting tracking id and thankyou section -->
        <div class="container mb-5">
            <div class="row mb-5">
                <div class="col-md-6 offset-lg-3 anmt100 anmb200">
                    <h2 class="text-center mb-5">Order Submitted successfully</h2>
                    <p class="text-center mb-5">your tracking id is <span class="an-primary"><?= $_SESSION['tracking_id'] ?></span> track your order by it.Thankyou for your purchase</p>
                    <div class="text-center">
                        <a href="index.php" class="form-control py-3 an_button fs-4">Continue</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ending tracking id and thankyou section -->

    </main>











    <?php
    include_once "slicing/footer.php";
    include_once "slicing/jslinks.php";
    ?>

</body>

</html>