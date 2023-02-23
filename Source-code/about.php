<?php 
include_once "slicing/headerlinks.php";
$page="About Us";
?>

<body>

   <!-- Start header area -->
   
   <?php
//    starting navbar
    include_once "slicing/nav.php";
// ending navber


// starting sidenav
    include_once "slicing/sidenav.php";
  
// ending sidenav 
    ?>

    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
       <?php 
       include_once "slicing/breadcrum.php";
       ?>
        <!-- End breadcrumb section -->

        <!-- Start about section -->
        <section class="about__section section--padding mb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__thumb d-flex">
                            <div class="about__thumb--items">
                                <img class="about__thumb--img border-radius-5 display-block" src="assets/img/banner/greetingbanner2.jpg" alt="about-thumb">
                            </div>
                            <div class="about__thumb--items position__relative">
                                <img class="about__thumb--img border-radius-5 display-block" src="assets/img/banner/greetingbanner3.jpg" alt="about-thumb">
                                <div class="banner__bideo--play about__thumb--play">
                                    <a class="about__thumb--play__icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                                        <!-- <svg id="play" xmlns="http://www.w3.org/2000/svg" width="40.302" height="40.302" viewBox="0 0 46.302 46.302">
                                            <g id="Group_193" data-name="Group 193" transform="translate(0 0)">
                                            <path id="Path_116" data-name="Path 116" d="M39.521,6.781a23.151,23.151,0,0,0-32.74,32.74,23.151,23.151,0,0,0,32.74-32.74ZM23.151,44.457A21.306,21.306,0,1,1,44.457,23.151,21.33,21.33,0,0,1,23.151,44.457Z" fill="currentColor"/>
                                            <g id="Group_188" data-name="Group 188" transform="translate(15.588 11.19)">
                                                <g id="Group_187" data-name="Group 187">
                                                <path id="Path_117" data-name="Path 117" d="M190.3,133.213l-13.256-8.964a3,3,0,0,0-4.674,2.482v17.929a2.994,2.994,0,0,0,4.674,2.481l13.256-8.964a3,3,0,0,0,0-4.963Zm-1.033,3.435-13.256,8.964a1.151,1.151,0,0,1-1.8-.953V126.73a1.134,1.134,0,0,1,.611-1.017,1.134,1.134,0,0,1,1.185.063l13.256,8.964a1.151,1.151,0,0,1,0,1.907Z" transform="translate(-172.366 -123.734)" fill="currentColor"/>
                                                </g>
                                            </g>
                                            <g id="Group_190" data-name="Group 190" transform="translate(28.593 5.401)">
                                                <g id="Group_189" data-name="Group 189">
                                                <path id="Path_118" data-name="Path 118" d="M328.31,70.492a18.965,18.965,0,0,0-10.886-10.708.922.922,0,1,0-.653,1.725,17.117,17.117,0,0,1,9.825,9.664.922.922,0,1,0,1.714-.682Z" transform="translate(-316.174 -59.724)" fill="currentColor"/>
                                                </g>
                                            </g>
                                            <g id="Group_192" data-name="Group 192" transform="translate(22.228 4.243)">
                                                <g id="Group_191" data-name="Group 191">
                                                <path id="Path_119" data-name="Path 119" d="M249.922,47.187a19.08,19.08,0,0,0-3.2-.27.922.922,0,0,0,0,1.845,17.245,17.245,0,0,1,2.889.243.922.922,0,1,0,.31-1.818Z" transform="translate(-245.801 -46.917)" fill="currentColor"/>
                                                </g>
                                            </g>
                                            </g>
                                        </svg> -->
                                        <span class="visually-hidden">Video Play</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <span class="about__content--subtitle text__secondary mb-20"> Why Choose us</span>
                            <h2 class="about__content--maintitle mb-25">We do not buy from the open market & traders.</h2>
                            <p class="about__content--desc mb-20">Arts is a online shopping store where you can buy all the products of Arts, Dolls, Greeting cards, Wallets, Handbags, Files, etc products we make sure that your product can arrive safetly and try to provide our best services</p>
                            <p class="about__content--desc mb-25">We directly works with the dealers of companies so that we can provide you the orignal products of companies in their best condition. We make sure that the product we are sending is out of any fault</p>
                            <div class="about__author position__relative d-flex align-items-center">
                                <div class="about__author--left">
                                    <h4 class="about__author--name">Bruce Sutton</h4>
                                    <span class="about__author--rank">Arts Manager</span>
                                </div>
                                <img class="about__author--signature display-block" src="assets/img/icon/signature.png" alt="signature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->
        
    </main>

    </main>
    <?php
    include_once "slicing/footer.php";
    ?>

     <!-- Scroll top bar -->
     <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

    
     <?php 
include_once "slicing/jslinks.php";
?>

</body>
<script>
    // testimonial swiper activation
var swiper = new Swiper(".testimonial__swiper--activation", {
  slidesPerView: 3,
  loop: true,
  clickable: true,
  spaceBetween: 30,
  breakpoints: {
    1200: {
      slidesPerView: 3,
    },
    768: {
      spaceBetween: 30,
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    0: {
      slidesPerView: 1,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
</script>
</html>