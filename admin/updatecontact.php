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
if(isset($_GET['btn'])){
    $idd=$_GET['id1'];
    $page=$_GET['page'];
    if($page==1){
        $sq="UPDATE `contact` SET `status`=1 WHERE `id`=$idd";
        if(mysqli_query($con,$sq)){
            $_SESSION['error']=11;
            header("location:contact.php");
            exit;
        }
    }
    if($page==2){
    $sq="UPDATE `feedback` SET `status`=1 WHERE `id`=$idd";
    if(mysqli_query($con,$sq)){
        $_SESSION['error']=11;
        header("location:feedmsg.php");
        exit;
    }
    }
    
}
?>
<style>
    .ancolor{
        color: white;
    }
</style>
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
                    $page=$_GET['page'];
                    if($page==1){
                        $sql="SELECT * FROM `contact` WHERE `id`=$id";
                    }
                    if($page==2){
                    $sql="SELECT * FROM `feedback` WHERE `id`=$id";
                    }
                    $res=mysqli_query($con,$sql);
                    if(mysqli_num_rows($res)>0){
                        $result=mysqli_fetch_assoc($res);
                        ?>
                        <div class="col-md-6 offset-md-3 mt-5">
                            <h3 class="text-center">Sender Information</h3>
                            <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column mt-3">
                                <p class="mr-md-4"><strong>Name : </strong><?=$result['name']?></p>
                                <p class="mt-2 mr-md-4"><strong>Number : </strong><?=$result['number']?></p>
                            </div>
                            <div class="d-flex flex-column mt-3">
                            <p><strong>Email : </strong><?=$result['email']?></p>
                            <p class="mt-2"><strong>Status : </strong><?=$result['status']==0?"Not Read":"Read"?></p>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-3 mt-md-5">
                            <h3 class="mt-2">Message</h3>
                            <p class="mt-5"><?php 
                            if($page==1){
                                echo $result['msg'];
                            }else if($page==2){
                                echo $result['feedback'];
                            }
                            ?></p>
                            <div class="mt-4">
                                <form>
                                <input type="number" class="d-none" name="id1" value="<?=$result['id']?>">
                                <input type="number" class="d-none" name="page" value="<?=$page?>">
                            <button type="submit" class="form-control bg-primary ancolor" name="btn">I have read it</button>
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