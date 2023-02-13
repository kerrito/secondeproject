<?php
include_once "slicing/headerlinks.php";
if($_SESSION['login']!="true"){
    header("location:../index.php");
    exit;
}
$email=$_SESSION['email'];
$chkid="SELECT * FROM `signup` WHERE `email`='$email'";
$chkres=mysqli_query($con,$chkid);
if(mysqli_num_rows($chkres)>0){
    $chkresult=mysqli_fetch_assoc($chkres);
    $userrol=$chkresult['user_rol'];
    if($userrol==2){

    }else if( $userrol==3){
        header("location:order.php");
        exit;
    }else{
        header("location:../index.php");
        exit;
    }
}
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
                        <li><a href="product.php">Message</a></li>
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
                                                <h1>Contact List</h1>
                                            </div>
                                            <?php 
                                                if($_SESSION['error']==20){
                                                    ?>
                                                    <marquee class="text-success mb-3" loop="1">Message has been deleted successfully</marquee>
                                                    <?php
                                                    $_SESSION['error']="";
                                                }
 
                                                if($_SESSION['error']==11){
                                                    ?>
                                                    <marquee class="text-success mb-3" loop="1">Message has been Updated successfully</marquee>
                                                    <?php
                                                    $_SESSION['error']="";
                                                }

                                                ?>
                                            <table class="table " id="table_id">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 18.8125px;">#</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 82.375px;">Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 84.781px;">Email</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Number</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.406px;">Message</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Avatar: activate to sort column ascending" style="width: 64.2031px;">Status</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="user_table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64.9219px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `contact`";
                                                    $res = mysqli_query($con, $sql);
                                                    foreach ($res as $value) {
                                                    ?>
                                                        <tr role="row" class="odd">              
                                                            <th scope="row" class="sorting_1"><?= $value['id'] ?></th>
                                                            <td><?= $value['name'] ?></td>
                                                            <td><?= $value['email'] ?></td>
                                                            <td><?= $value['number'] ?></td>
                                                            <td><p style="white-space: nowrap;width:300px !important;text-overflow: ellipsis;overflow: hidden;"><?= $value['msg'] ?></p></td>
                                                            <td><span class="badge <?= $value['status'] == 1 ? "badge-success" : "badge-warning" ?>"><?= $value['status'] == 1 ? "Read" : "Not Read" ?></span></td>
                                                            <td><a class="text-success mr-2" href="updatecontact.php?id=<?= $value['id'] ?>&page=1"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" onclick="deleteuser(<?= $value['id'] ?>)"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
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
    </div>


    <?php
    include_once "slicing/dashjslinks.php";
    ?>
</body>
<script>
    function deleteuser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this contact",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B79E8C',
                cancelButtonColor: '#061738',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Added',
                        'User Has Been Banned',
                        'success'
                    )
                    $.ajax({
                        url: "contactdelete.php",
                        type: "POST",
                        data: {
                            "id": id,"page":1
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