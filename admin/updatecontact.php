<?php
include_once "slicing/headerlinks.php";
if(isset($_GET['btn'])){
    $idd=$_GET['id1'];
    $sq="UPDATE `contact` SET `status`=1 WHERE `id`=$idd";
    if(mysqli_query($con,$sq)){
        $_SESSION['error']=11;
        header("location:contact.php");
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
                        <li><a href="contact.php">Read Message</a></li>
                    </ul>
                </div>
                <div class="row">
                    <?php 
                    $id=$_GET['id'];
                    $sql="SELECT * FROM `contact` WHERE `id`=$id";
                    $res=mysqli_query($con,$sql);
                    if(mysqli_num_rows($res)>0){
                        $result=mysqli_fetch_assoc($res);
                        ?>
                        <div class="col-md-4 mt-5">
                            <h3>Sender Information</h3>
                            <p class="mt-5"><strong>Name : </strong><?=$result['name']?></p>
                            <p><strong>Email : </strong><?=$result['email']?></p>
                            <p><strong>Number : </strong><?=$result['number']?></p>
                            <p><strong>Status : </strong><?=$result['status']==0?"Not Read":"Read"?></p>
                        </div>
                        <div class="col-md-6 mt-md-5">
                            <h3 class="mt-2">Message</h3>
                            <p class="mt-5"><?=$result['msg']?></p>
                            <div class="mt-4">
                                <form>
                                <input type="number" class="d-none" name="id1" value="<?=$result['id']?>">
                            <button type="submit" class="form-control bg-primary text-light" name="btn">I have read it</button>
                            </form>
                        </div>
                        
                        <?php
                    }
                    ?>
                </div>
            </div>
            </div>
        </div>























        <?php
        include_once "slicing/dashjslinks.php";
        ?>

</body>

</html>