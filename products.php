<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
require "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">
        <!-- navber start -->
        <?php include "include/navber-products.php"; ?>
        <!-- navber end -->

        <!--  -->
        <section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
         All <span>products</span>
         </h2>
      </div>
      <div class="row justify-content-center ">
         <?php
         require "include/config.php";
         $selectQ = "select * from products where 1";
         $hotitems = $conn->query($selectQ);
         while ($row = $hotitems->fetch_assoc()) {
            echo  '<div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="img-box">
                  <img src="assets/Products/' . $row['image'] . '" class="pimage">
               </div>
               <div class="detail-box">
                  <h5><a href="javascript:void(0);" class="text-dark pname">' . $row['name'] . '</a></h5>
                  <h6>৳ <span class="pprice">' . $row['price'] . '</span></h6>
                  
               </div>
               <h6 class="text-center mt-3">
               <a href="javascript:void(0);" data-id="' . $row['id'] . '" class="addToCart" style="font-size:19px;color:red;"><i class="fas fa-cart-plus"></i> Cart</a>
                | 
                <a href="deteils.php?id=' . $row['id'] . '" class="ps-2" style="font-size:19px;color:blue;"> Deteils</a></h6>
            </div>
         </div>';
         };
         ?>
      </div>
      <div class="btn-box">
         <a href="products.php">
            View More
         </a>
      </div>
   </div>
</section>
        <!--  -->
    </div>
    <!-- hero-area end -->

    <!-- footer start -->
    <?php include "include/footer.php"; ?>
    <!-- footer end -->
    <!-- jQery js-->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- sweetalert custom-->
    <script src="assets/js/sweetalert2.all.min.js"></script>
   <script src="assets/js/review.js"></script>
   <script src="assets/js/cart.js"></script>
   <script src="assets/js/AddToCart.js"></script>

</html>