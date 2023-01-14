<?php
include_once "slicing/headerlinks.php";

?>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php
        include_once "slicing/dashheader.php";

        include_once "slicing/dashsidebar.php";
        ?>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2"><a href="../home.php"><h1>Home</h1></a></h1>
                    <ul>
                        <li><a href="index.php">Dashboard</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <!-- CARD ICON-->
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon mb-4">
                                    <div class="card-body text-center"><i class="i-Add-User"></i>
                                        <p class="text-muted mt-2 mb-2">Users</p>
                                        <?php
                                                       $sq="SELECT COUNT(id) FROM `signup` where email!='admin@gmail.com'";
                                                       $user=mysqli_query($con,$sq);
                                                       $usercount=mysqli_fetch_assoc($user);
                                        
                                        ?>
                                        <p class="text-primary text-24 line-height-1 m-0"><?=$usercount['COUNT(id)'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon mb-4">
                                    <div class="card-body text-center"><i class="i-Data-Upload"></i>
                                        <p class="text-muted mt-2 mb-2">Total Products</p>
                                        <?php 
                                        $q="SELECT COUNT(id) FROM `product`";
                                        $product=mysqli_query($con,$q);
                                        $prodcount=mysqli_fetch_assoc($product);
                                        ?>
                                        <p class="text-primary text-24 line-height-1 m-0"><?=$prodcount['COUNT(id)'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon mb-4">
                                    <div class="card-body text-center"><i class="i-Money-2"></i>
                                        <p class="text-muted mt-2 mb-2">Total sales</p>
                                        <p class="text-primary text-24 line-height-1 m-0">4021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon-big mb-4">
                                    <div class="card-body text-center"><i class="i-Money-2"></i>
                                        <p class="line-height-1 text-title text-18 mt-2 mb-0">4021</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon-big mb-4">
                                    <div class="card-body text-center"><i class="i-Gear"></i>
                                        <p class="line-height-1 text-title text-18 mt-2 mb-0">2309</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-icon-big mb-4">
                                    <div class="card-body text-center"><i class="i-Bell"></i>
                                    <?php 
                                    $l="SELECT COUNT(id) FROM `contact`";
                                    $msg=mysqli_query($con,$l);
                                    $msgcount=mysqli_fetch_assoc($msg);
                                    ?>
                                        <p class="line-height-1 text-title text-18 mt-2 mb-0"><?=$msgcount['COUNT(id)'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card o-hidden mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="user_table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <h1>Users List</h1>
                                                <a href="adduser.php" class="btn btn-primary">Add User</a>
                                                </div>
                                                <table class="table ">
                                                    <?php 
                                                    if($_SESSION['error']==4){
                                                    ?>
                                                    <marquee loop="1" class="text-success my-2">Action Successed .User Account Has Been Deleted</marquee>
                                                    <?php 
                                                    $_SESSION['error']="0";
                                                    } 
                                                    if($_SESSION['error']==5){
                                                    ?>
                                                    <marquee loop="1" class="text-danger my-2">Action Failed .Unable to delete user Account</marquee>
                                                    <?php 
                                                    $_SESSION['error']="0";
                                                    }
                                                    if($_SESSION['error']==6){
                                                    ?>
                                                    <marquee loop="1" class="text-success my-2">Action Successed .User Account Has Been Updated</marquee>
                                                    <?php 
                                                    $_SESSION['error']="0";
                                                    } 
                                                    if($_SESSION['error']==7){
                                                    ?>
                                                    <marquee loop="1" class="text-danger my-2">Action Failed .Unable to Update user Account</marquee>
                                                    <?php 
                                                    $_SESSION['error']="0";
                                                    }
                                                    ?>
                                                    <thead>
                                                        <tr role="row">
                                                            <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                            <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                            <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Email</th>
                                                            <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Number</th>
                                                            <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 84.781px;">Status</th>
                                                            <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                       $sql="SELECT * FROM `signup` where email!='admin@gmail.com'";
                                                       $res=mysqli_query($con,$sql);
                                                       foreach($res as $value){ 
                                                        ?>
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="sorting_1"><?=$value['id']?></th>
                                                            <td><?=$value['name']?></td>
                                                            <td><?=$value['email']?></td>
                                                            <td><?=$value['number']?></td>
                                                            <td><span class="badge <?=$value['status']==1?"badge-success":"badge-warning"?>"><?=$value['status']==1?"Active":"Not Active"?></span></td>
                                                            <td><a class="text-success mr-2" href="updateuser.php?id=<?=$value['id']?>"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" href="delete.php?id=<?=$value['id']?>"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
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

                <?php
                include_once "slicing/dashfooter.php";
                ?>
            </div>
        </div><!-- ============ Search UI Start ============= -->
        <div class="search-ui">
            <div class="search-header">
                <img src="../../dist-assets/images/logo.png" alt="" class="logo">
                <button class="search-close btn btn-icon bg-transparent float-right mt-2">
                    <i class="i-Close-Window text-22 text-muted"></i>
                </button>
            </div>
            <input type="text" placeholder="Type here" class="search-input" autofocus="">
            <div class="search-title">
                <span class="text-muted">Search results</span>
            </div>
            <div class="search-results list-horizontal">
                <div class="list-item col-md-12 p-0">
                    <div class="card o-hidden flex-row mb-4 d-flex">
                        <div class="list-thumb d-flex">
                            <!-- TUMBNAIL -->
                            <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">
                        </div>
                        <div class="flex-grow-1 pl-2 d-flex">
                            <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                                <!-- OTHER DATA -->
                                <a href="" class="w-40 w-sm-100">
                                    <div class="item-title">Headphone 1</div>
                                </a>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">$300
                                    <del class="text-secondary">$400</del>
                                </p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                    <span class="badge badge-danger">Sale</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-item col-md-12 p-0">
                    <div class="card o-hidden flex-row mb-4 d-flex">
                        <div class="list-thumb d-flex">
                            <!-- TUMBNAIL -->
                            <img src="../../dist-assets/images/products/headphone-2.jpg" alt="">
                        </div>
                        <div class="flex-grow-1 pl-2 d-flex">
                            <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                                <!-- OTHER DATA -->
                                <a href="" class="w-40 w-sm-100">
                                    <div class="item-title">Headphone 1</div>
                                </a>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">$300
                                    <del class="text-secondary">$400</del>
                                </p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                    <span class="badge badge-primary">New</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-item col-md-12 p-0">
                    <div class="card o-hidden flex-row mb-4 d-flex">
                        <div class="list-thumb d-flex">
                            <!-- TUMBNAIL -->
                            <img src="../../dist-assets/images/products/headphone-3.jpg" alt="">
                        </div>
                        <div class="flex-grow-1 pl-2 d-flex">
                            <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                                <!-- OTHER DATA -->
                                <a href="" class="w-40 w-sm-100">
                                    <div class="item-title">Headphone 1</div>
                                </a>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">$300
                                    <del class="text-secondary">$400</del>
                                </p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                    <span class="badge badge-primary">New</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-item col-md-12 p-0">
                    <div class="card o-hidden flex-row mb-4 d-flex">
                        <div class="list-thumb d-flex">
                            <!-- TUMBNAIL -->
                            <img src="../../dist-assets/images/products/headphone-4.jpg" alt="">
                        </div>
                        <div class="flex-grow-1 pl-2 d-flex">
                            <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                                <!-- OTHER DATA -->
                                <a href="" class="w-40 w-sm-100">
                                    <div class="item-title">Headphone 1</div>
                                </a>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100">$300
                                    <del class="text-secondary">$400</del>
                                </p>
                                <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                    <span class="badge badge-primary">New</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGINATION CONTROL -->
            <div class="col-md-12 mt-5 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-inline-flex">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ============ Search UI End ============= -->
        <?php
        include_once "slicing/dashjslinks.php";
        ?>

</body>

</html>