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
    <title>Ecom</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">
        <!-- navber start -->
        <?php include "include/navbar-cart.php"; ?>
        <!-- navber end -->
        <!--  -->
        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-3"><a href="products.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Continue shopping</a></h5>
                                <hr>
                                <div class="row">

                                    <div class="col-lg-7" id="cartContainer">


                                    </div>
                                    <div class="col-lg-5">

                                        <div class="card bg-danger text-white rounded-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0">Order</h5>
                                                    <?php
                                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>
                                                        <p><i class='fas fa-user-alt'></i> <?= $_SESSION['username'] ?></p>
                                                    <?php } else { ?>
                                                        <a href="login.php" type="submit" class="text-white"><i class="fa-solid fa-user"></i></a>
                                                    <?php }; ?>
                                                </div>

                                                <!--  -->
                                                <?php
                                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>
                                                    <div>
                                                        <select id="payment" class="form-control form-select" aria-label="">
                                                            <option value="-1" selected>Select Payment method</option>
                                                            <option value="bkash">bKash</option>
                                                            <option value="nagad">Nagad</option>
                                                            <option value="cod">Cash on delivery</option>
                                                        </select>
                                                    </div>
                                                    <form class="mt-4">
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="discount" class="form-control" siez="17" placeholder="Discount" />
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="trxid" class="form-control" siez="17" placeholder="Transaction ID" />
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <textarea type="text" id="comment" class="form-control" placeholder="Comment"></textarea>
                                                        </div>
                                                    </form>
                                                <?php } ?>
                                                <!--  -->

                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-2">Subtotal</h6>
                                                    <h6 class="mb-2" id="subtotal"></h6>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <h6 class="mb-2">taxes</h6>
                                                    <h6 class="mb-2" id="tax"></h6>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <h4 class="mb-2">Total</h4>
                                                    <h4 class="mb-2" id="total"></h4>
                                                </div>

                                                <?php
                                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>
                                                    <button id="Checkout-btn" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            <span id="CheckoutTotal"></span>
                                                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                        </div>
                                                    </button>
                                                <?php } else { ?>
                                                    <a href="login.php" id="Checkout-btn" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            <span><i class="fa-solid fa-user"></i> Login to order!</span>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                                <!--  -->

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
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
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/cart.js"></script>
    <script>
        // ready funtion start
        $(document).ready(function() {
            const cart = new Cart();
            let subtotal = 0;
            let total = 0;
            let tax = 0.05;
            let CheckoutTotal = 0;
            $("#cardLength").html(cart.totalItems());
            console.log(cart.items);
            let c = ``;
            cart.items.forEach(e => {
                c += `<div class="card mb-3 mb-lg-0">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="${e.image}" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5>${e.name}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex flex-row align-items-center">
                                                    <div style="width: 50px;">
                                                            <h5 class="fw-normal mb-0"><input type="number" class="form-control m-2" value="1"/></h5>
                                                        </div>
                                                        <div style="width: 160px;">
                                                            <h6 class="mb-0 mx-3">৳ ${e.price}</h6>
                                                        </div>
                                                        <a class="removeBtn" data-id='${e.id}' style="color: red; cursor: pointer;"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                subtotal += Number(e.price);
            });
            total = subtotal + subtotal * tax;
            document.getElementById("cartContainer").innerHTML = c;
            $("#subtotal").html(subtotal);
            $("#tax").html(tax);
            $("#total").html(total);
            $("#CheckoutTotal").html(total);

            // remove item to cheakoutpage
            function remove(i) {
                cart.removeItem(i);
                location.reload();
            }
            $("#cartContainer").on("click", ".removeBtn", function() {
                let id = $(this).data('id');
                // alert(id);
                remove(id);
            });

            // Checkout start
            //discount start
            $("#discount").blur(function() {
                let amount = Number($(this).val());
                $("#total").html(Number($("#total").html()) - amount);
                $("#CheckoutTotal").html(Number($("#total").html()));
            });
            //discount end
            $("#Checkout-btn").click(function() {
                let items = cart.items;
                let discount = $("#discount").val();
                let total = Number($("#total").html());
                let payment = $("#payment").val();
                let trxid = $("#trxid").val();
                let comment = $("#comment").val();
                if (payment == "-1") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Please select payment method!'
                    });
                    return;
                }
                if (payment == "bkash" || payment == "nagad") {
                    if (trxid.length == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Please provide transaction id if you select bkash or nogod!'
                        });
                        return;
                    }
                }
                //ajax post in jquery start
                $.post("checkout.php", {
                    action: "checkout",
                    t: total,
                    d: discount,
                    p: payment,
                    trx: trxid,
                    c: comment,
                    items: cart.items,
                }, function(d) {
                    d = JSON.parse(d)
                    //console.log(d)
                    if (d.success) {
                        alert("Your order has been received. Order Id : " + d.invoiceid);
                        cart.emptyCart();
                        location.reload();
                    };
                });
                //ajax post in jquery end
            });
            // Checkout end
        });
        // ready funtion end
    </script>

</html>