<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
// check admin
require "cheak-admin.php";
require "../../include/config.php";
//update 
if (isset($_POST['updateproduct'])) {
    $id = $_POST['id'];
    $cid = $_POST['category_id'];
    $scid = $_POST['subcategory_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $q = $_POST['quantity'];
    $d = $_POST['discount'];
    $letest_item = $_POST['letest_item'];
    $update = "UPDATE `products` SET `category_id`='" . $cid . "',`subcategory_id`='" . $scid . "',`name`='" . $name . "',`description`='" . $description . "',`sku`='" . $sku . "',`price`='" . $price . "',`quantity`='" . $q . "',`discount`='" . $d . "',`letest_item`='" . $letest_item . "' WHERE id='" . $id . "'";
    $conn->query($update);
    if ($conn->affected_rows) {
        header("location: viewproduct.php");
    };
};
//select
$p = "select * from products where id='" . $_GET['id'] . "' limit 1";
$r = $conn->query($p);
$p = $r->fetch_assoc();
// var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <?php include "link.php"; ?>
</head>

<body>
    <!-- hero_area start -->
    <div class="hero_area">

        <!-- navber start -->
        <?php include "navbarNewview.php"; ?>
        <!-- navber end -->

        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Edit Product</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  -->
        <div>
            <section class="why_section layout_padding">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-10 offset-lg-2 m-auto">
                            <div class="full">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="row">
                                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                            <div class="col-lg-4 col-md-6">
                                                <label>Sku</label>
                                                <input type="text" class="form-control" name="sku" id="sku" required value="<?= $p['sku'] ?>">
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                            <label>Category</label>
                                                <select id="category_id" name="category_id" class="form-control form-select mb-3" aria-label="">
                                                    <option value="-1">Category Select...</option>
                                                    <?php
                                                    $s = "select id,name from categories where 1";
                                                    $r = $conn->query($s);
                                                    while ($row = $r->fetch_assoc()) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                            <label>Sub.Category</label>
                                                <select id="subcategory_id" name="subcategory_id" class="form-control form-select mb-3" aria-label="">
                                                    <option value="-1">Sub.Category Select...</option>
                                                    <!-- ajax value -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                            <label>Name</label>
                                                <input type="text" class="form-control" name="name" id="name" required value="<?= $p['name'] ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            <label>Description</label>
                                                <textarea class="form-control description" name="description" id="description" rows="2" required><?= $p['description'] ?></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            <label>Price</label>
                                                <input type="text" class="form-control" name="price" id="price" required value="<?= $p['price'] ?>">
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-lg-4 col-md-6">
                                            <label>Quantity</label>
                                                <input type="number" class="form-control" name="quantity" id="quantity" required value="<?= $p['quantity'] ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            <label>Discount</label>
                                                <input type="text" class="form-control" name="discount" id="discount" required value="<?= $p['discount'] ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                            <label>Letest Item</label>
                                                <select id="letest_item" name="letest_item" class="form-control form-select" aria-label="">
                                                    <option>Letest Item</option>
                                                    <option value="0" <?= $p['letest_item'] == "0" ? "selected" : "" ?>>No</option>
                                                    <option value="1" <?= $p['letest_item'] == "1" ? "selected" : "" ?>>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" name="updateproduct" value="Update">
                                        <p class="text-center mt-4">View Products <a href="viewproduct.php">Go</a></p>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--  -->

    </div>
    <!-- hero-area end -->

    <!-- footer start -->
    <?php include "footer.php"; ?>
    <!-- footer end -->

    <!-- jQery js-->
    <script src="../../assets/js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="../../assets/js/bootstrap.js"></script>
    <script>
        $("#category_id").change(function() {
            $("#subcategory_id").html("");
            //alert($(this).val())
            $.getJSON("ajax-show-subcat.php", {
                valuepass: $(this).val()
            }, function(d) {
                console.log(d);
                if (d.length) {
                    showsubcat(d);
                }
            })
        });

        function showsubcat(d) {
            let html = '<option value="-1">Sub.Category Select...</option>';
            d.forEach(e => {
                html += '<option value="' + e.id + '">' + e.name + '</option>';
            });
            $("#subcategory_id").html(html);
        };
    </script>
</body>

</html>