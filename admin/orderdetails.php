<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
if (isset($_GET['id'])) {
    require "../include/config.php";
    $invid = $_GET['id'];
    $o = "select orders.*,users.username as uname from orders,users where orders.user_id=users.id and orders.id='" . $invid . "' limit 1";
    $order = $conn->query($o);
    $od = "select orderdetails.*,products.name as pname from orderdetails , products where orderdetails.product_id=products.id and  orderdetails.order_id='" . $invid . "'";
    $orderdetails = $conn->query($od);
    $orderrow = $order->fetch_assoc();
    // var_dump($orderrow);
    // exit;
} else {
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Number: <?= $invid; ?></title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <link href="../assets/css/newNavbar.css" rel="stylesheet" />
    <link href="../assets/css/invoiceform.css" rel="stylesheet" />
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">

        <!-- invoice start -->
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
            <div class="card">
                <div class="card-header p-4">
                    <a class="pt-2 d-inline-block" data-abc="true">pomuShop.com</a>
                    <div class="float-right">
                        <h3 class="mb-0">Invoice : <?= $invid; ?></h3>
                        <?= $orderrow['created_at'] ?>

                        <p><span>Status: </span>
                            <?php if ($orderrow['status'] == "pe") { ?>
                                <span class="bg-danger text-black fw-bold p-1 rounded">Pending</span>
                        </p>
                    <?php } ?>
                    <?php if ($orderrow['status'] == "pro") { ?>
                        <span class="bg-primary text-black fw-bold p-1 rounded">Processing</span>
                        </p>
                    <?php } ?>
                    <?php if ($orderrow['status'] == "shi") { ?>
                        <span class="bg-info text-black fw-bold p-1 rounded">Shipped</span>
                        </p>
                    <?php } ?>
                    <?php if ($orderrow['status'] == "com") { ?>
                        <span class="bg-success text-black fw-bold p-1 rounded">Complete</span></p>
                    <?php } ?>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">From:</h5>
                            <h3 class="text-dark mb-1">Pranto Deb</h3>
                            <div>NangolKot, Comilla, 110034</div>
                            <div>Email: contact@pomushop.com</div>
                            <div>Phone: +880 1825 406 189</div>
                        </div>
                        <div class="col-sm-6 ">
                            <h5 class="mb-3">To:</h5>
                            <h3 class="text-dark mb-1"><?= $orderrow['uname'] ?></h3>
                            <!-- <div>478, Nai Sadak</div>
                            <div>Chandni chowk, New delhi, 110006</div>
                            <div>Email: info@tikon.com</div>
                            <div>Phone: +91 9895 398 009</div> -->
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="right">Price</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $orderdetails->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td class="center"><?= $row['product_id'] ?></td>
                                        <td class="left strong"><?= $row['pname'] ?></td>
                                        <td class="left"><?= $orderrow['comment']; ?></td>
                                        <td class="right"><?= $row['price'] ?></td>
                                        <td class="center">1</td>
                                        <td class="right"><?= $row['price'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Subtotal</strong>
                                        </td>
                                        <td class="right"><?= $orderrow['total'] - $orderrow['discount']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Discount (20%)</strong>
                                        </td>
                                        <td class="right"><?= $orderrow['discount']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">VAT (10%)</strong>
                                        </td>
                                        <td class="right">0</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark"><?= $orderrow['total']; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 text-center">
                        <p>Thank you for your purchase.</p>
                        <a onclick="window.print()" class="btn btn-light p-3 text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice end -->

    </div>
    <!-- hero-area end -->

    <!-- jQery js-->
    <script src="../assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>