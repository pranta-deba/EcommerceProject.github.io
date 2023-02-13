<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require "../include/config.php";
if (isset($_POST['update'])) {
    $newstat = $_POST['status'];
    $iiiid = $_POST['id'];
    $uq = "update orders set status='" . $newstat . "' where id='" . $iiiid . "' ";
    $conn->query($uq);
    $message = "Status updated";
    header("location: order.php");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "select * from orders where id='" . $id . "' limit 1";
    $r = $conn->query($q);
    $rr = $r->fetch_assoc();
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
    <title>OrderStatus</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <link href="../assets/css/newNavbar.css" rel="stylesheet" />
    <style>
        #tableContainer{
            margin-top: 30px;
        }
        form{
            padding: 40px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }
        label{
            font-size: 1.5em;
        }
        select{
            padding: 10px;
            border-radius: 10px;
            border: 2px solid black;
        }
        option{
            font-weight: bold;
        }
    </style>
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
                            <h3>Order Status</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid px-4 text-center">
            <div id="tableContainer">
                <form action="orderstatus.php?id=<?= $id ?>" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label> Order Status :</label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="pe" <?= $rr['status'] == "pe" ? "selected" : ""; ?>>Pending</option>
                        <option value="pro" <?= $rr['status'] == "pro" ? "selected" : ""; ?>>Procesing</option>
                        <option value="shi" <?= $rr['status'] == "shi" ? "selected" : ""; ?>>Shipped</option>
                        <option value="com" <?= $rr['status'] == "com" ? "selected" : ""; ?>>Complete</option>
                    </select>
                    <hr>
                    <input type="submit" name="update" value="Update Status">
                </form>
            </div>
        </div>
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