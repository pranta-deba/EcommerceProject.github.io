<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
// check admin
require "include/cheak-admin.php";
require "../include/config.php";
$q = "select * from orders where 1 order by created_at desc";
$r = $conn->query($q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
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
                            <h3>Order Table</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center mt-2">
            <h5> <strong>Legend : </strong>
                <span class="text-danger">Pending ,</span>
                <span class="text-primary">Processing ,</span>
                <span class="text-info">Shipped ,</span>
                <span class="text-success">Complete ,</span>
            </h5>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order Time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delails</th>
                </tr>
            </thead>
            <tbody>
                <!-- database to table -->
                <?php
                $q = "select orders.*, users.username as username from orders,users where orders.user_id=users.id order by orders.created_at desc";
                $allp = $conn->query($q);
                $html = "";
                while ($row = $allp->fetch_assoc()) {
                    $html .= "<tr>";
                    $html .= "<td><h6>" . $row['id'] . "</h6></td>";
                    $html .= "<td>" . $row['username'] . "</td>";
                    $html .= "<td>" . $row['total'] . "</td>";
                    $html .= "<td>" . $row['discount'] . "</td>";
                    $html .= "<td>" . $row['comment'] . "</td>";
                    $html .= "<td>" . $row['payment'] . "</td>";
                    $html .= "<td>" . $row['trxid'] . "</td>";
                    $boxcolor = null;
                    if ($row['status'] == "pe") {
                        $boxcolor = "bg-danger";
                    }
                    if ($row['status'] == "pr") {
                        $boxcolor = "bg-primary";
                    }
                    if ($row['status'] == "sh") {
                        $boxcolor = "bg-info";
                    }
                    if ($row['status'] == "co") {
                        $boxcolor = "bg-success";
                    }
                    $boxcolor = null;
                    if ($row['status'] == "pe") {
                        $boxcolor = "text-danger";
                    }
                    if ($row['status'] == "pro") {
                        $boxcolor = "text-primary";
                    }
                    if ($row['status'] == "shi") {
                        $boxcolor = "text-info";
                    }
                    if ($row['status'] == "com") {
                        $boxcolor = "text-success";
                    }
                    $html .= "<td><h5 class='" . $boxcolor . "'>" . $row['status'] . "</h5></td>";
                    $html .="<td>".$row['created_at']."</td>";
                    $html .="<td><a class='text-white btn btn-sm btn-info' target='_blank' href='orderstatus.php?id=".$row['id']."'>Edit</a></td>";
                    $html .="<td><a class='text-white btn btn-sm btn-info' target='_blank' href='orderdetails.php?id=".$row['id']."'>Delails</a></td>";
                    $html .= "</tr>";
                }
                echo $html;
                ?>
                <!--  -->
            </tbody>
        </table>


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