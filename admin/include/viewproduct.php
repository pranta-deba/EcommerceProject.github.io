<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
// check admin
require "cheak-admin.php";
require "../../include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product</title>
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
                     <h3>Products Table</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <table class="table table-striped my-4">
         <thead>
            <tr>
               <th scope="col">Id</th>
               <th scope="col">Sku</th>
               <th scope="col">Categoryid</th>
               <th scope="col">Subategoryid</th>
               <th scope="col">Name</th>
               <th scope="col">Description</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Images</th>
               <th scope="col">Discount</th>
               <th scope="col">letest Item</th>
               <th scope="col">Edit</th>
               <th scope="col">Delete</th>
            </tr>
         </thead>
         <tbody>
            <!-- database to table -->
            <?php
            $selec = "select * from products where 1";
            $allproducts = $conn->query($selec);
            while ($row = $allproducts->fetch_assoc()) {
               echo "<tr>
               <td>" . $row['id'] . "</td>
               <td>" . $row['sku'] . "</td>
               <td>" . $row['category_id'] . "</td>
               <td>" . $row['subcategory_id'] . "</td>
               <td>" . $row['name'] . "</td>
               <td>" . $row['description'] . "</td>
               <td>" . $row['price'] . "</td>
               <td>" . $row['quantity'] . "</td>
               <td><img width='60px' src='../../assets/products/" . $row['image'] . "'/></td>
               <td>" . $row['discount'] . "</td>
               <td>" . $row['letest_item'] . "</td>
               <td><a href='edit.php?id={$row['id']}' class='btn btn-sm btn-primary text-white'>Edit</a></td>
               <td><a onclick=\"return confirm('Are you sure want to delete this?');\" href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger text-white'>Delete</a></td>
               </tr>";
            };
            ?>
            <!--  -->
         </tbody>
      </table>
      <div class="text-center m-4">
         <a class="btn btn-outline-danger" href="../addproduct.php">Add Product</a>
      </div>
   </div>
   <!-- hero-area end -->
   
     <!-- footer start -->
     <?php include "footer.php"; ?>
   <!-- footer end -->

   <!-- jQery js-->
   <script src="../../assets/js/jquery-3.6.3.min.js"></script>
   <!-- bootstrap js -->
   <script src="../../assets/js/bootstrap.js"></script>
</body>

</html>