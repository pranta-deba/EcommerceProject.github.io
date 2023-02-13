<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PomuShop > Home</title>
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
   <link href="assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
   <link href="assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet" />
   <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="assets/css/style.css" rel="stylesheet" />
   <link href="assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
   <!-- hero_area start -->
   <div class="hero_area">

      <!-- navber start -->
      <?php include "include/navber-home.php"; ?>
      <!-- navber end -->

      <!-- carousel start -->
      <?php include "include/carousel.php"; ?>
      <!-- carousel end -->

   </div>
   <!-- hero-area end -->

   <!-- categories section start -->
   <?php include "include/categories.php"; ?>
   <!-- end categories section end -->

   <!-- home content Why Shop With Us start -->
   <?php include "include/Why-Shop.php"; ?>
   <!-- home content Why Shop With Us end -->

   <!-- product section start -->
   <?php include "include/products-section.php"; ?>
   <!-- end product section end -->

   <!-- subscribe section -->
   <?php include "include/subcribe-section.php"; ?>
   <!-- end subscribe section -->

   <!-- owl-carousel start -->
   <?php include "include/owl-carousel.php"; ?>
   <!-- owl-carousel end -->

   <!-- footer start -->
   <?php include "include/footer.php"; ?>
   <!-- footer end -->



   <script src="assets/js/jquery-3.6.3.min.js"></script>
   <script src="assets/owlcarousel/owl.carousel.min.js"></script>
   <script src="assets/js/bootstrap.js"></script>
   <script src="assets/js/sweetalert2.all.min.js"></script>
   <script src="assets/js/review.js"></script>
   <script src="assets/js/cart.js"></script>
   <script src="assets/js/AddToCart.js"></script>

   <script>
      $(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 5,
        loop: true,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            800: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
                // loop:true
            }
        }
    });
});
   </script>
</body>

</html>