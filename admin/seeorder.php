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
                <?php 
                $id=$_GET['id'];
                $sql="SELECT * FROM `order` WHERE `id`=$id";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0){
                    $result=mysqli_fetch_assoc($res);
                    ?>
                    <div class="container my-5">
                        <h2 class="text-center">User details</h2>
                        <div class="row">
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Name</label>
                                <input type="text" class="form-control" value="<?=$result['name']?>" placeholder="Name" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Email</label>
                                <input type="text" class="form-control" value="<?=$result['email']?>" placeholder="Email" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Number</label>
                                <input type="text" class="form-control" value="<?=$result['number']?>" placeholder="Number" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Address</label>
                                <input type="text" class="form-control" value="<?=$result['address']?>" placeholder="Address" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">City</label>
                                <input type="text" class="form-control" value="<?=$result['city']?>" placeholder="City" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Country</label>
                                <input type="text" class="form-control" value="<?=$result['country']?>" placeholder="Country" readonly>
                            </div>
                        </div>
                    </div>
                    <?php
                    $idd=$result['product_id'];
                    $ql="SELECT * FROM `product` WHERE `id`=$idd";
                    $re=mysqli_query($con,$ql);
                    if(mysqli_num_rows($re)>0){
                        $resu=mysqli_fetch_assoc($re);
                        ?>
                        <div class="container my-5">
                            <h2 class="text-center">Product details</h2>
                            <div class="row">
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Product ID</label>
                                    <input type="text" class="form-control" value="<?=$resu['id']?>" placeholder="ID" readonly>
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Product name</label>
                                    <input type="text" class="form-control" value="<?=$resu['name']?>" placeholder="Product Name" readonly>
        
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Brand</label>
                                    <input type="text" class="form-control" value="<?=$resu['brand']?>" placeholder="Brand" readonly>
        
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Category</label>
                                    <input type="text" class="form-control" value="<?=$resu['categories']?>" placeholder="Category" readonly>
        
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Quantity</label>
                                    <input type="text" class="form-control" value="<?=$result['quantity']?>" placeholder="Quantity" readonly>
        
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Product price</label>
                                    <input type="text" class="form-control" value="<?=$resu['price']?>" placeholder="Amount" readonly>
        
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="container my-5">
                        <h2 class="text-center">Order details</h2>
                        <div class="row">
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Tracking ID</label>
                                <input type="text" value="<?=$result['tracking_id']?>" class="form-control" placeholder="ID" readonly>
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Status</label>
                                <input type="text" class="form-control" value="<?=$result['state']?>" placeholder="Status" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Payment method</label>
                                <input type="text" class="form-control" value="<?=$result['payment']==0?"Payment on delivery":"Payment by card" ?>" placeholder="payment method" readonly>
    
                            </div>
                            <div class="col-4 my-4">
                                <label for="" class="mb-3">Total amount</label>
                                <input type="text" class="form-control" value="<?=$result['price']?>" placeholder="Total amount" readonly>
    
                            </div>
                            <?php 
                            $time="";
                            if($result['reason']!=null && !empty($result['reason']) && $result['reason']!=""){
                                $start = $result['remainning_time'];
                                $end = strtotime("now");
                                $reminning = round(($end - $start) / 60);
                                if($reminning<60){
                                    $GLOBALS['time']=$reminning." mins ago";
                                }else if($reminning>60 && $reminning<(60*24)){
                                    $ti=round($reminning/60);
                                    $GLOBALS['time']=$ti." hours ago";
                                }else if($reminning>(60*24) && $reminning<(60*24*30)){
                                    $ti=round(($reminning/60)/24);
                                    $GLOBALS['time']=$ti." days ago";
                                }else if($reminning>(60*24*30) && $reminning<(60*24*30*12)){
                                    $ti=round((($reminning/60)/24)/30);
                                    $GLOBALS['time']=$ti." months ago";
                                }else if($reminning>(60*24*30*12)){
                                    $ti=round(((($reminning/60)/24)/30)/12);
                                    $GLOBALS['time']=$ti." years ago";

                                }
                                ?>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Returning reason</label>
                                    <input type="text" class="form-control" value="<?=$result['reason']?>" placeholder="reason" readonly>
        
                                </div>
                                <div class="col-4 my-4">
                                    <label for="" class="mb-3">Request time</label>
                                    <input type="text" class="form-control" value="<?=$GLOBALS['time']?>" placeholder="time" readonly>
        
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

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