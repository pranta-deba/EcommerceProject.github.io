<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
// check admin
require "../include/cheak-admin.php";
require "../../include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Category</title>
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
                     <h3>Category Table</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <table class="table table-striped my-4">
         <thead>
            <tr>
               <th scope="col">Id</th>
               <th scope="col">Name</th>
               <th scope="col">Description</th>
               <th scope="col">Images</th>
               <th scope="col">Created_At</th>
               <th scope="col">Edit</th>
               <th scope="col">Delete</th>
            </tr>
         </thead>
         <tbody>
            <!-- database to table -->
            <?php
            $s = "select * from categories where 1";
            $allcate = $conn->query($s);
            while ($row = $allcate->fetch_assoc()) {
               echo "<tr>
               <td scope='row'>" . $row['id'] . "</td>
               <td>" . $row['name'] . "</td>
               <td>" . $row['description'] . "</td>
               <td><img width='60px' src='../../assets/category/" . $row['image'] . "'/></td>
               <td>" . $row['created_at'] . "</td>
               <td><button class='btn btn-sm btn-primary'>Edit</button></td>
               <td><button class='btn btn-sm btn-danger'>Delete</button></td>
               </tr>";
            };
            ?>
            <!--  -->
         </tbody>
      </table>
      <div class="text-center m-4">
         <a class="btn btn-outline-danger" href="../addcategory.php">Add Category</a>
      </div>
   </div>
   <!-- hero-area end -->

   <!-- footer start -->
   <?php include "footer.php"; ?>
   <!-- footer end -->

   <!-- jQery js-->
   <script src="../assets/js/jquery-3.6.3.min.js"></script>
   <!-- bootstrap js -->
   <script src="../assets/js/bootstrap.js"></script>
</body>

</html>