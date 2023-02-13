<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
// check admin
require "include/cheak-admin.php";
require "../include/config.php";
$q = "select count(*) as total from products where 1";
$r = $conn->query($q);
$totalProducts = $r->fetch_assoc();
$q = "select count(*) as total from orders where 1";
$r = $conn->query($q);
$totalOrders = $r->fetch_assoc();
$q = "select count(*) as total from users where 1";
$r = $conn->query($q);
$totalUsers = $r->fetch_assoc();
$q = "select count(*) as total from categories where 1";
$r = $conn->query($q);
$totalCategories = $r->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <link href="../assets/css/newNavbar.css" rel="stylesheet" />
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">
        <!-- navber start -->
        <?php include "include/navbarNew.php"; ?>
        <!-- navber end -->
        
        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main class="container my-4">
            <div class="container container-fluid px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-12 py-2">
                        <div class="card" style="width: 12rem;">
                            <img src="../assets/images/order.png" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-text text-center">Total Order : <?= $totalOrders['total'] ?> </h6>
                                <hr>
                                <p class="card-text text-center"><a class="btn btn-outline-success" href="order.php">View Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 py-2">
                        <div class="card" style="width: 12rem;">
                            <img src="../assets/images/category.png" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-text text-center">Total Caterory : <?= $totalCategories['total'] ?> </h6>
                                <hr>
                                <p class="card-text text-center"><a class="btn btn-outline-primary" href="include/viewcategory.php">View Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 py-2">
                        <div class="card" style="width: 12rem;">
                            <img src="../assets/images/product.png" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-text text-center">Total Products : <?= $totalProducts['total'] ?> </h6>
                                <hr>
                                <p class="card-text text-center"><a class="btn btn-outline-danger" href="include/viewproduct.php">View Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 py-2">
                        <div class="card" style="width: 12rem;">
                            <img src="../assets/images/users.png" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-text text-center">Total Users : <?= $totalUsers['total'] ?> </h6>
                                <hr>
                                <p class="card-text text-center"><a class="btn btn-outline-info text-dark" href="include/viewuser.php">View Details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

    </div>
    <!-- hero-area end -->

    <!-- footer start -->
    <?php include "include/footer.php"; ?>
    <!-- footer end -->

    <!-- jQery js-->
    <script src="../assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>