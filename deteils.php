<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
 };
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require "include/config.php";
    $q = "select * from products where id='" . $id . "' limit 1";
    $r = $conn->query($q);
    if (!$r->num_rows) {
        exit;
    }
    $row = $r->fetch_assoc();
    // var_dump($row);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/delaits.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63da3c781eec0c00124e5705&product=sticky-share-buttons&source=platform" async="async"></script>
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">
        <!-- navber start -->
        <?php include "include/navber-home.php"; ?>
        <!-- navber end -->

        <!-- start title -->
        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3><?= $row['name'] ?> Deteils</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end title -->

        <!-- content -->
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="assets/Products/<?= $row['image'] ?>" width="250" /> </div>
                                    <div class="thumbnail text-center"> <img src="assets/Products/<?= $row['image'] ?>" class="pimage" width="70"> <img src="assets/Products/<?= $row['image'] ?>" width="70"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center Back"> <i class="fa fa-long-arrow-left"></i> <a href="products.php" class="ml-1">Back</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?= $row['category_id'] ?></span>
                                        <h5 class="pname text-uppercase"><?= $row['name'] ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> ৳-<span class="pprice act-price"><?= $row['price'] ?></span>
                                            <div class="ml-2"><span>20% OFF</span> </div>
                                        </div>
                                    </div>
                                    <p class="about"><?= $row['description'] ?></p>
                                    <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Quantity</h6> <?= $row['quantity'] ?>
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <a href="javascript:void(0)" data-id="<?= $row['id'] ?>" id="addToCart" class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</a>
                                        <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content -->
    </div>
    <!-- hero-area end -->
    <!-- footer start -->
    <?php include "include/footer.php"; ?>
    <!-- footer end -->

    <!--  -->
    <div class="sharethis-sticky-share-buttons"></div>
    <!--  -->

    <!-- jQery js-->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/cart.js"></script>
    <script>
        $(document).ready(function() {

            const cart = new Cart();
            $("#cardLength").html(cart.totalItems());

            $("#addToCart").click(function() {
                $t = $(this);
                let id = $t.data('id');
                let name = $t.parent().parent().find(".pname").text();
                let price = $t.parent().parent().find(".pprice").text();
                let image = $t.parent().parent().parent().parent().find(".pimage").attr("src");

                cart.addItem({
                    id: id,
                    name: name,
                    price: price,
                    image: image
                });

                Swal.fire(
                    name,
                    "item " + name + " added",
                    'success'
                );

                $("#cardLength").html(cart.totalItems());
            });
        });
    </script>


</body>

</html>