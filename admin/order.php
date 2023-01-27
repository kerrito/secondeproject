<?php
include_once "slicing/headerlinks.php";

?>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php
        include_once "slicing/dashheader.php";

        include_once "slicing/dashsidebar.php";
        ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2"><a href="../index.php">
                            <h1>Home</h1>
                        </a></h1>
                    <ul>
                        <li><a href="product.php">Order</a></li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <div class="card o-hidden mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="user_table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <h1>Pending Orders</h1>
                                            </div>
                                            <?php 
                                                if($_SESSION['error']==20){
                                                    ?>
                                                    <marquee class="text-success mb-3" loop="1">Order has been deleted successfully</marquee>
                                                    <?php
                                                    $_SESSION['error']="";
                                                }

                                                ?>
                                            <table class="table ">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Email</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Number</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 104.2031px;">Product name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;"> Brand</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Categories</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 44.781px;">Payment Method</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `order` WHERE `state`='pending'";
                                                    $res = mysqli_query($con, $sql);
                                                    foreach ($res as $value) {
                                                        $id = $value['product_id'];
                                                        $l = "SELECT * FROM `product` WHERE `id`=$id";
                                                        $r = mysqli_query($con, $l);
                                                        if (mysqli_num_rows($r) > 0) {
                                                            $re = mysqli_fetch_assoc($r);
                                                        }
                                                    ?>
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="sorting_1"><?= $value['id'] ?></th>
                                                            <td><?= $value['name'] ?></td>
                                                            <td><?= $value['email'] ?></td>
                                                            <td><?= $value['number'] ?></td>
                                                            <td><?= $re['name'] ?></td>
                                                            <td><?= $re['brand'] ?></td>
                                                            <td><?= $re['categories'] ?></td>
                                                            <td><span class="badge <?= $value['payment'] == 1 ? "badge-warning" : "badge-danger" ?>"><?= $value['payment'] == 1 ? "Payment By Card" : "Payment On Delivery" ?></span></td>
                                                            <td><a class="text-success mr-2" href="updateorder.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" href="deleteorder.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <h1>Disptached Orders</h1>
                                            </div>
                                            <table class="table ">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Email</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Number</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 104.2031px;">Product name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;"> Brand</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Categories</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 44.781px;">Payment Method</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `order` WHERE `state`='Dispatch'";
                                                    $res = mysqli_query($con, $sql);
                                                    foreach ($res as $value) {
                                                        $id = $value['product_id'];
                                                        $l = "SELECT * FROM `product` WHERE `id`=$id";
                                                        $r = mysqli_query($con, $l);
                                                        if (mysqli_num_rows($r) > 0) {
                                                            $re = mysqli_fetch_assoc($r);
                                                        }
                                                    ?>
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="sorting_1"><?= $value['id'] ?></th>
                                                            <td><?= $value['name'] ?></td>
                                                            <td><?= $value['email'] ?></td>
                                                            <td><?= $value['number'] ?></td>
                                                            <td><?= $re['name'] ?></td>
                                                            <td><?= $re['brand'] ?></td>
                                                            <td><?= $re['categories'] ?></td>
                                                            <td><span class="badge <?= $value['payment'] == 1 ? "badge-warning" : "badge-danger" ?>"><?= $value['payment'] == 1 ? "Payment By Card" : "Payment On Delivery" ?></span></td>
                                                            <td><a class="text-success mr-2" href="updateorder.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" href="deleteorder.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <h1>Delivered Orders</h1>
                                            </div>
                                            <table class="table ">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Email</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Number</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 104.2031px;">Product name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;"> Brand</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Categories</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 44.781px;">Payment Method</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `order` WHERE `state`='Delivered'";
                                                    $res = mysqli_query($con, $sql);
                                                    foreach ($res as $value) {
                                                        $id = $value['product_id'];
                                                        $l = "SELECT * FROM `product` WHERE `id`=$id";
                                                        $r = mysqli_query($con, $l);
                                                        if (mysqli_num_rows($r) > 0) {
                                                            $re = mysqli_fetch_assoc($r);
                                                        }
                                                    ?>
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="sorting_1"><?= $value['id'] ?></th>
                                                            <td><?= $value['name'] ?></td>
                                                            <td><?= $value['email'] ?></td>
                                                            <td><?= $value['number'] ?></td>
                                                            <td><?= $re['name'] ?></td>
                                                            <td><?= $re['brand'] ?></td>
                                                            <td><?= $re['categories'] ?></td>
                                                            <td><span class="badge <?= $value['payment'] == 1 ? "badge-warning" : "badge-danger" ?>"><?= $value['payment'] == 1 ? "Payment By Card" : "Payment On Delivery" ?></span></td>
                                                            <td><a class="text-success mr-2" href="updateorder.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" onclick="deleteorder(<?= $value['id'] ?>)"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


























    <?php
    include_once "slicing/dashjslinks.php";
    ?>

</body>
<script>
    function deleteorder(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to Banned This User",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: 'Yes, Add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Added',
                        'User Has Been Banned',
                        'success'
                    )
                    $.ajax({
                        url: "deleteorder.php",
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