<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
// check admin
require "include/cheak-admin.php";
require "../include/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>
   <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
   <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
   <link href="../assets/css/style.css" rel="stylesheet"/>
   <link href="../assets/css/responsive.css" rel="stylesheet"/>
    <link href="../assets/css/newNavbar.css" rel="stylesheet"/>
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
                     <h3>Add Products</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end title -->
      <div>
         <section class="why_section layout_padding">
            <div class="container">

               <div class="row">
                  <div class="col-lg-10 offset-lg-2 m-auto">
                     <div class="full">
                        <form class="formshadow" action="include/add-products.php" method="post" enctype="multipart/form-data">
                           <fieldset>
                              <div class="row">

                                 <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="sku" id="sku" placeholder="Sku" required>
                                 </div>

                                 <div class="col-lg-4 col-md-6">
                                    <select id="category_id" name="category_id" class="form-control form-select mb-3" aria-label="" required>
                                       <option value="-1">Category Select...</option>
                                       <?php
                                       $q = "select id,name from categories where 1";
                                       $qr = $conn->query($q);
                                       while ($row = $qr->fetch_assoc()) {
                                          echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                       }
                                       ?>
                                    </select>
                                 </div>

                                 <div class="col-lg-4 col-md-6">
                                    <select id="subcategory_id" name="subcategory_id" class="form-control form-select mb-3" aria-label="" required>
                                       <option value="-1">Sub.Category Select...</option>
                                       <!-- ajax value -->
                                    </select>
                                 </div>
                              </div>

                              <div class="row">
                                 <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
                                 </div>
                                 <div class="col-lg-4 col-md-6">
                                    <textarea class="form-control description" name="description" id="description" rows="2" placeholder="Description" required></textarea>
                                 </div>
                                 <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                                 </div>
                              </div>
                              <div class="row pb-3">
                                 <div class="col-lg-4 col-md-6">
                                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required>
                                 </div>
                                 <div class="col-lg-4 col-md-6"><input type="file" name="images" id="images" required /></div>
                                 <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="discount" id="discount" placeholder="Discount" required>
                                 </div>
                              </div>
                              <div class="row pb-3 justify-content-center">
                                 <div class="col-lg-4 col-md-6">
                                    <select id="letest_item" name="letest_item" class="form-control form-select" aria-label="" required>
                                       <option>Letest Item</option>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                 </div>
                              </div>
                              <input type="submit" value="Add Product" name="AddProduct" id="AddProduct" />
                              <p class="text-center mt-4">View Products <a href="include/viewproduct.php">Go</a></p>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
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
   <!-- subcategory ajax -->
   <script src="../assets/js/addsubcet-ajax.js"></script>
</body>

</html>