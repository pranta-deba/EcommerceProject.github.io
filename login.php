<?php 
// session_start : user login cheak
if(session_status() === PHP_SESSION_NONE){
    session_start();
  };


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PomuShop > Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
</head>
</head>

<body class="sub_page">

    <div class="hero_area">
        <!-- navber start -->
        <?php include "include/navber-singup.php"; ?>
        <!-- navber end -->
    </div>

    <!-- start title -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Login Now</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end title -->
   

    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-2 m-auto">
                    <div class="full">
                        <form class="formshadow" action="log.php" method="post" enctype="multipart/form-data">
                        <p class="text-center text-success"><?php echo $_GET['m']??""; ?></p>
                            <fieldset>
                                <input type="email" placeholder="Enter your email address" name="email" id="email" required />
                                <input type="password" placeholder="Enter password" name="password" id="password" required />
                                <input type="submit" value="Login" name="login" id="login" />
                                <p class="text-center mt-4">don't have an account? <a href="register.php">register now</a></p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why section -->

    <!-- arrival section -->
    <!-- <section class="arrival_section">
        <div class="container">
            <div class="box">
                <div class="arrival_bg_box">
                    <img src="images/arrival-bg.png" alt="">
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto">
                        <div class="heading_container remove_line_bt">
                            <h2>
                                #NewArrivals
                            </h2>
                        </div>
                        <p style="margin-top: 20px;margin-bottom: 30px;">
                            Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                        </p>
                        <a href="">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end arrival section -->

    <!-- footer start -->
    <?php include "include/footer.php"; ?>
    <!-- footer end -->

    <!-- jQery js-->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- sweetalert custom-->
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/cart.js"></script>
   <script src="assets/js/AddToCart.js"></script>

    <script>
    </script>

</body>

</html>