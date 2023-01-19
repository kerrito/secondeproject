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
                        <li><a href="product.php">Products</a></li>
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
                                                <h1>Product List</h1>
                                                <a href="addproduct.php" class="btn btn-primary">Add product</a>
                                            </div>
                                            <table class="table ">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Image</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Brand</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Categories</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Description</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 40.781px;">Stock</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 44px;">Status</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `product` WHERE status!=0";
                                                    $res = mysqli_query($con, $sql);
                                                    foreach ($res as $value) {
                                                    ?>
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="sorting_1"><?= $value['id'] ?></th>
                                                            <td><?= $value['name'] ?></td>
                                                            <td><img src="../uploads/img/<?= $value['img'] ?>" alt="" class="w-50 rounded-circle"></td>
                                                            <td><?= $value['brand'] ?></td>
                                                            <td><?= $value['categories'] ?></td>
                                                            <td class="h-25 overflow-hidden"><?= $value['desc'] ?></td>
                                                            <td><?= $value['stock'] ?></td>
                                                            <td><span class="badge <?= $value['status'] == 1 ? "badge-success" : "badge-warning" ?>"><?= $value['status'] == 1 ? "Available" : "Not Available" ?></span></td>
                                                            <td><a class="text-success mr-2" href="updateproduct.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" href="deleteproduct.php?id=<?= $value['id'] ?>"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
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

</html>