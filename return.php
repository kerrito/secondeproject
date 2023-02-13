<?php
include_once "slicing/headerlinks.php";
if($_SESSION['login']!="true"){
    header("location:index.php");
    exit;
}
$page="Return";
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

        <!-- starting return form section -->
        <form action="">
            <div class="container my-5 py-5">
                <div class="row my-5 py-5">
                    <h2 class="text-center mb-5">Return Reason</h2>
                    <div class="col-lg-6 offset-lg-3">
                    <p class="text-center"><strong>We don't take return item if its doesn't met any one of conditions written below. If you have change of mind it's not our responsibility</strong></p>
                        <div class="d-flex flex-row">
                        <input type="checkbox" id="val1"><span class="ms-2"> Faulty item</span>
                        </div>
                        <div class="mt-3 d-flex flex-row">
                        <input type="checkbox" id="val2"><span class="ms-2"> Condition Different From AD</span>
                        </div>
                        <div class="mt-3 d-flex flex-row">
                        <input type="checkbox" id="val3"><span class="ms-2"> Wrong product</span>
                        </div>
                        <div class="mt-3">
                        <input type="button" class="form-control text-center py-3 an_button fs-4" value="Return" onclick="returnning(<?=$_GET['id']?>)">
                        </div>
                </div>
            </div>
            </div>
        </form>
        <!-- ending return form section -->
        
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
    function returnning(id){
        var val1=document.getElementById("val1").value
        var val2=document.getElementById("val2").value
        var val3=document.getElementById("val3").value
        if(val1==1 || val2==1 || val3==1){
            if(val1==1){
                Swal.fire({
            title: 'Are you sure?',
            text: "You want to return this order!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Yes, I recieved it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Confirm',
                    'Your return request has been submitted',
                    'success'
                )
                $.ajax({
                    url: "update-order.php",
                    type: "POST",
                    data: {
                        "id": id,"val": "Faulty","page": 2
                    },
                    success: function(load) {
                        if (load == 1) {
                            location.href="index.php";
                        }
                    }
                })
            }
        })
            }
            if(val2==1){
                Swal.fire({
            title: 'Are you sure?',
            text: "You want to return this order!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Yes, I recieved it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Confirm',
                    'Your return request has been submitted',
                    'success'
                )
                $.ajax({
                    url: "update-order.php",
                    type: "POST",
                    data: {
                        "id": id,"val": "Different from AD","page": 2
                    },
                    success: function(load) {
                        if (load == 1) {
                            location.href="index.php";
                        }
                    }
                })
            }
        })
            }
            if(val3==1){Swal.fire({
            title: 'Are you sure?',
            text: "You want to return this order!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'Yes, I recieved it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Confirm',
                    'Your return request has been submitted',
                    'success'
                )
                $.ajax({
                    url: "update-order.php",
                    type: "POST",
                    data: {
                        "id": id,"val":"Wrong item","page": 2
                    },
                    success: function(load) {
                        if (load == 1) {
                            location.href="index.php";
                        }
                    }
                })
            }
        })}
        
    }else{
        Swal.fire({
            title: 'You Need Select one of options?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B79E8C',
            cancelButtonColor: '#061738',
            confirmButtonText: 'I Understand it'
        })
    }
}


$(document).ready(function() {
        $("#val1").click(function() {
            $("#val2").prop('checked', false);
            $("#val3").prop('checked', false);
            document.getElementById("val1").value=1;
            document.getElementById("val2").value=0;
            document.getElementById("val3").value=0;
        });
        $("#val2").click(function() {
            $("#val1").prop('checked', false);
            $("#val3").prop('checked', false);
            document.getElementById("val1").value=0;
            document.getElementById("val2").value=1;
            document.getElementById("val3").value=0;
        });
        $("#val3").click(function() {
            $("#val1").prop('checked', false);
            $("#val2").prop('checked', false);  
            document.getElementById("val1").value=0;
            document.getElementById("val2").value=0;
            document.getElementById("val3").value=1;
        });
    })
    
</script>

</html>